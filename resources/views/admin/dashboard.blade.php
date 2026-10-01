<!doctype html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>مدیریت فروشگاه</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Tahoma, Arial, sans-serif;
            background: #f8fafc;
            color: #0f172a;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        .topbar {
            background: #0f172a;
            color: white;
            height: 72px;
        }

        .topbar-inner {
            width: min(1200px, 92%);
            height: 100%;
            margin: auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .brand {
            font-size: 21px;
            font-weight: 900;
        }

        .logout {
            border: 1px solid #475569;
            background: transparent;
            color: white;
            padding: 9px 16px;
            border-radius: 10px;
            cursor: pointer;
            font-family: inherit;
        }

        .container {
            width: min(1200px, 92%);
            margin: 30px auto;
        }

        .welcome {
            margin-bottom: 24px;
        }

        .welcome h1 {
            margin: 0 0 6px;
            font-size: 30px;
        }

        .welcome p {
            margin: 0;
            color: #64748b;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 18px;
            margin-bottom: 28px;
        }

        .stat {
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 18px;
            padding: 22px;
        }

        .stat-icon {
            font-size: 27px;
        }

        .stat-number {
            font-size: 30px;
            font-weight: 900;
            margin-top: 8px;
        }

        .stat-title {
            color: #64748b;
            font-size: 13px;
        }

        .cards {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 22px;
        }

        .card {
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 20px;
            padding: 22px;
        }

        .card h2 {
            margin-top: 0;
            margin-bottom: 16px;
            font-size: 20px;
        }

        .item {
            padding: 13px 0;
            border-bottom: 1px solid #f1f5f9;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
        }

        .item:last-child {
            border-bottom: 0;
        }

        .product-name {
            font-weight: bold;
        }

        .product-price {
            color: #2563eb;
            font-weight: 900;
            white-space: nowrap;
        }

        .category-name {
            font-weight: bold;
        }

        .category-icon {
            font-size: 24px;
            margin-left: 8px;
        }

        .footer-note {
            margin-top: 28px;
            color: #64748b;
            font-size: 13px;
        }

        @media (max-width: 800px) {
            .stats,
            .cards {
                grid-template-columns: 1fr;
            }

            .welcome h1 {
                font-size: 25px;
            }
        }
    </style>
</head>

<body>

<header class="topbar">
    <div class="topbar-inner">

        <div class="brand">
            🛍️ مدیریت فروشگاه
        </div>

        <form method="POST" action="{{ route('admin.logout') }}">
            @csrf
            <button class="logout" type="submit">
                خروج
            </button>
        </form>

    </div>
</header>

<main class="container">

    <section class="welcome">
        <h1>داشبورد مدیریت</h1>
        <p>
            وضعیت فعلی فروشگاه را از اینجا مشاهده می‌کنید.
        </p>
    </section>

    <section class="stats">

        <div class="stat">
            <div class="stat-icon">📦</div>
            <div class="stat-number">
                {{ count($products) }}
            </div>
            <div class="stat-title">
                محصولات
            </div>
        </div>

        <div class="stat">
            <div class="stat-icon">🗂️</div>
            <div class="stat-number">
                {{ count($categories) }}
            </div>
            <div class="stat-title">
                دسته‌بندی‌ها
            </div>
        </div>

        <div class="stat">
            <div class="stat-icon">🛒</div>
            <div class="stat-number">
                0
            </div>
            <div class="stat-title">
                سفارش‌ها
            </div>
        </div>

    </section>

    <section class="cards">

        <div class="card">

            <h2>📦 محصولات</h2>

            @foreach($products as $product)

                <div class="item">

                    <div>
                        <div class="product-name">
                            {{ $product['emoji'] }}
                            {{ $product['name'] }}
                        </div>

                        <small style="color:#64748b">
                            {{ $product['category'] }}
                        </small>
                    </div>

                    <div class="product-price">
                        {{ number_format($product['price']) }}
                        تومان
                    </div>

                </div>

            @endforeach

        </div>

        <div class="card">

            <h2>🗂️ دسته‌بندی‌ها</h2>

            @foreach($categories as $category)

                <div class="item">

                    <div class="category-name">
                        <span class="category-icon">
                            {{ $category['icon'] }}
                        </span>

                        {{ $category['name'] }}
                    </div>

                    <div style="color:#64748b">
                        {{ $category['slug'] }}
                    </div>

                </div>

            @endforeach

        </div>

    </section>

    <div class="footer-note">
        پنل مدیریت نسخه اولیه فروشگاه Laravel
    </div>

</main>

</body>
</html>
