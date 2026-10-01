FROM php:8.3-apache

RUN apt-get update && apt-get install -y --no-install-recommends \
    git \
    unzip \
    libzip-dev \
    libpq-dev \
    && docker-php-ext-install pdo_pgsql zip \
    && a2enmod rewrite headers \
    && rm -rf /var/lib/apt/lists/*

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY . .

RUN mkdir -p \
    storage/framework/cache/data \
    storage/framework/sessions \
    storage/framework/views \
    storage/logs \
    bootstrap/cache \
    public/uploads

# Create the runtime .env here so deployment does not depend on GitHub uploading hidden files.
RUN printf '%s\\n' \
    'APP_NAME="فروشگاه من"' \
    'APP_ENV=production' \
    'APP_KEY=' \
    'APP_DEBUG=false' \
    'APP_URL=https://my-laravel-store.onrender.com' \
    'LOG_CHANNEL=stderr' \
    'LOG_LEVEL=error' \
    'DB_CONNECTION=pgsql' \
    'SESSION_DRIVER=file' \
    'CACHE_STORE=file' \
    'QUEUE_CONNECTION=sync' \
    > .env \
    && composer install --no-dev --prefer-dist --optimize-autoloader --no-interaction --no-scripts \
    && php artisan key:generate --force \
    && chown -R www-data:www-data storage bootstrap/cache public/uploads \
    && chmod -R 775 storage bootstrap/cache public/uploads

RUN sed -i 's/Listen 80/Listen 10000/' /etc/apache2/ports.conf

RUN cat > /etc/apache2/sites-available/000-default.conf <<'APACHE'
<VirtualHost *:10000>
    ServerName localhost
    DocumentRoot /var/www/html/public

    <Directory /var/www/html/public>
        AllowOverride None
        Require all granted
        Options FollowSymLinks
        DirectoryIndex index.php

        RewriteEngine On
        RewriteCond %{REQUEST_FILENAME} !-d
        RewriteCond %{REQUEST_FILENAME} !-f
        RewriteRule ^ index.php [L]
    </Directory>

    ErrorLog ${APACHE_LOG_DIR}/error.log
    CustomLog ${APACHE_LOG_DIR}/access.log combined
</VirtualHost>
APACHE

RUN cat > /usr/local/bin/start-laravel.sh <<'SH'
#!/bin/sh
set -e

php artisan optimize:clear
php artisan package:discover --ansi
php artisan migrate --force
php artisan db:seed --force
php artisan config:cache

exec apache2-foreground
SH

RUN chmod +x /usr/local/bin/start-laravel.sh

EXPOSE 10000
CMD ["/usr/local/bin/start-laravel.sh"]
