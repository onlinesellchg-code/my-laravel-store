<!doctype html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>فروشگاه من</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Tahoma, Arial, sans-serif;
            background: #f5f7fb;
            color: #111827;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        .container {
            width: min(1120px, 92%);
            margin: auto;
        }

        .nav {
            background: #fff;
            border-bottom: 1px solid #e5e7eb;
        }

        .nav-inner {
            min-height: 70px;
            display: flex;
            align-items: center;
            gap: 25px;
        }

        .brand {
            margin-left: auto;
            color: #2563eb;
            font-size: 22px;
            font-weight: 900;
        }

        .nav-links {
            display: flex;
            gap: 20px;
        }

        .nav-links a:hover {
            color: #2563eb;
        }

        .cart {
            border: 1px solid #e5e7eb;
            padding: 8px 15px;
            border-radius: 10px;
        }

        main {
            padding-top: 30px;
            padding-bottom: 40px;
        }

        .hero {
            margin-bottom: 40px;
            padding: 45px;
            border-radius: 25px;
            background: linear-gradient(135deg, #dbeafe, #eff6ff);
        }

        .hero h1 {
            font-size: 42px;
            margin: 0 0 15px;
        }

        .hero p {
            color: #64748b;
            font-size: 18px;
        }

        .hero-actions {
            display: flex;
            gap: 10px;
        }

        .btn {
            display: inline-block;
            background: #2563eb;
            color: white;
            padding: 11px 20px;
            border-radius: 11px;
            font-weight: bold;
        }

        .btn-light {
            background: white;
            color: #2563eb;
            border: 1px solid #bfdbfe;
        }

        .section {
            margin: 40px 0;
        }

        .section-head {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 18px;
        }

        .categories {
            display: grid;
            grid-template-columns: repeat(6, 1fr);
            gap: 12px;
        }

        .category {
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            padding: 20px 10px;
            text-align: center;
        }

        .category .icon {
            display: block;
            font-size: 35px;
            margin-bottom: 8px;
        }

        .products {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 18px;
        }

        .product {
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 17px;
            overflow: hidden;
        }

        .product-img {
            height: 180px;
            background: #f1f5f9;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 65px;
        }

        .product-body {
            padding: 16px;
        }

        .product-title {
            font-weight: bold;
            min-height: 55px;
        }

        .price {
            font-size: 18px;
            font-weight: 900;
        }

        .meta,
        .old {
            color: #64748b;
            font-size: 13px;
        }

        .old {
            text-decoration: line-through;
        }

        .footer {
            background: #0f172a;
            color: #cbd5e1;
            padding: 30px 0;
        }

        @media (max-width: 800px) {
            .nav-links {
                display: none;
            }

            .hero h1 {
                font-size: 30px;
            }

            .categories {
                grid-template-columns: repeat(3, 1fr);
            }

            .products {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 480px) {
            .categories,
            .products {
                grid-template-columns: 1fr;
            }

            .hero {
                padding: 25px;
            }
        }
    </style>
</head>

<body>

<header class="nav">
    <div class="container nav-inner">

        <a class="brand" href="{{ route('home') }}">
            فروشگاه من
        </a>

        <nav class="nav-links">
            <a href="{{ route('home') }}">خانه</a>
            <a href="{{ route('shop') }}">فروشگاه</a>
            <a href="#categories">دسته‌بندی‌ها</a>
        </nav>

        <a class="cart" href="{{ route('cart') }}">
            🛒 سبد خرید
        </a>

    </div>
</header>

<main class="container">
    @yield('content')
</main>

<footer class="footer">
    <div class="container">
        <strong>فروشگاه من</strong>
        <p>فروشگاه اینترنتی با Laravel</p>
    </div>
</footer>

</body>
</html>
