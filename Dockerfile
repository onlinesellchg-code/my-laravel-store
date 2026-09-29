FROM php:8.3-apache

RUN apt-get update && apt-get install -y --no-install-recommends \
    git \
    unzip \
    libzip-dev \
    libsqlite3-dev \
    sqlite3 \
    && docker-php-ext-install pdo_sqlite zip \
    && a2enmod rewrite \
    && rm -rf /var/lib/apt/lists/*

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY . .

RUN mkdir -p database \
    storage/framework/cache/data \
    storage/framework/sessions \
    storage/framework/views \
    storage/logs \
    bootstrap/cache \
    && touch database/database.sqlite \
    && composer install --no-dev --prefer-dist --optimize-autoloader --no-interaction --no-scripts \
    && cp .env.example .env \
    && php artisan key:generate --force \
    && php artisan package:discover --ansi \
    && chown -R www-data:www-data storage bootstrap/cache database \
    && chmod -R 775 storage bootstrap/cache

RUN cat > /usr/local/bin/start-apache.sh <<'EOF'
#!/bin/sh

PORT="${PORT:-10000}"

sed "s/__PORT__/${PORT}/g" \
    /etc/apache2/ports.conf.template \
    > /etc/apache2/ports.conf

sed "s/__PORT__/${PORT}/g" \
    /etc/apache2/sites-available/000-default.conf.template \
    > /etc/apache2/sites-available/000-default.conf

exec apache2-foreground
EOF

RUN chmod +x /usr/local/bin/start-apache.sh

RUN cat > /etc/apache2/ports.conf.template <<'EOF'
Listen __PORT__
EOF

RUN cat > /etc/apache2/sites-available/000-default.conf.template <<'EOF'
<VirtualHost *:__PORT__>

    ServerName localhost

    DocumentRoot /var/www/html/public

    <Directory /var/www/html/public>
        AllowOverride All
        Require all granted
        Options FollowSymLinks
        DirectoryIndex index.php
    </Directory>

    ErrorLog ${APACHE_LOG_DIR}/error.log
    CustomLog ${APACHE_LOG_DIR}/access.log combined

</VirtualHost>
EOF

EXPOSE 10000

CMD ["/usr/local/bin/start-apache.sh"]
