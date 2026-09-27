# My Laravel Store

فروشگاه اینترنتی چنددسته‌ای فارسی با Laravel 13.

## وضعیت فعلی
- صفحه اصلی فارسی و راست‌چین
- دسته‌بندی‌ها
- محصولات نمونه
- صفحه فروشگاه
- صفحه دسته‌بندی
- صفحه محصول
- صفحه سبد خرید اولیه
- Dockerfile برای Deploy روی سرویس‌هایی مثل Render

## توسعه بعدی
1. اتصال دیتابیس PostgreSQL
2. مدل‌های Product و Category
3. پنل مدیریت
4. احراز هویت
5. سبد خرید واقعی
6. سفارش‌ها و پرداخت
7. آپلود تصاویر
8. جستجو و فیلتر

## اجرای پروژه
پس از نصب Composer:

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan serve
```

سپس `http://localhost:8000` را باز کنید.
