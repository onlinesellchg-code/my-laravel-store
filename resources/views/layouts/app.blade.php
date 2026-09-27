<!doctype html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'فروشگاه من' }}</title>
    <style>
        :root{--primary:#2563eb;--dark:#0f172a;--muted:#64748b;--bg:#f8fafc;--card:#fff;--border:#e2e8f0}
        *{box-sizing:border-box}body{margin:0;font-family:Tahoma,Arial,sans-serif;background:var(--bg);color:var(--dark);line-height:1.8}
        a{text-decoration:none;color:inherit}.container{width:min(1120px,92%);margin:auto}.nav{background:#fff;border-bottom:1px solid var(--border);position:sticky;top:0;z-index:10}.nav-inner{height:72px;display:flex;align-items:center;gap:28px}.brand{font-size:22px;font-weight:900;color:var(--primary);margin-left:auto}.nav-links{display:flex;gap:22px}.nav-links a:hover{color:var(--primary)}.cart{border:1px solid var(--border);padding:7px 14px;border-radius:10px}
        .hero{margin:34px 0;padding:52px 7%;border-radius:24px;background:linear-gradient(135deg,#dbeafe,#eff6ff);display:grid;grid-template-columns:1.5fr 1fr;align-items:center;gap:20px}.hero h1{font-size:42px;line-height:1.35;margin:0 0 15px}.hero p{color:var(--muted);font-size:18px}.btn{display:inline-block;background:var(--primary);color:#fff;padding:10px 20px;border-radius:11px;font-weight:bold}.section{margin:38px 0}.section-head{display:flex;justify-content:space-between;align-items:center;margin-bottom:18px}.section-head h2{margin:0}.categories{display:grid;grid-template-columns:repeat(6,1fr);gap:12px}.category{background:#fff;border:1px solid var(--border);border-radius:16px;padding:18px 10px;text-align:center;transition:.2s}.category:hover{transform:translateY(-3px);border-color:#bfdbfe}.category .icon{font-size:30px;display:block}.products{display:grid;grid-template-columns:repeat(4,1fr);gap:18px}.product{background:var(--card);border:1px solid var(--border);border-radius:17px;overflow:hidden}.product-img{height:180px;background:#f1f5f9;display:flex;align-items:center;justify-content:center;font-size:65px}.product-body{padding:16px}.product-title{font-weight:700;min-height:58px}.price{font-size:18px;font-weight:900}.old{font-size:13px;color:#94a3b8;text-decoration:line-through;margin-right:8px}.meta{color:var(--muted);font-size:13px}.grid-2{display:grid;grid-template-columns:1fr 1fr;gap:25px}.box{background:#fff;border:1px solid var(--border);border-radius:20px;padding:28px}.footer{margin-top:70px;background:#0f172a;color:#cbd5e1;padding:35px 0}.footer p{margin:0}.empty{text-align:center;padding:70px;background:#fff;border:1px dashed var(--border);border-radius:20px}
        @media(max-width:800px){.hero{grid-template-columns:1fr}.hero h1{font-size:30px}.categories{grid-template-columns:repeat(3,1fr)}.products{grid-template-columns:repeat(2,1fr)}.nav-links{display:none}.grid-2{grid-template-columns:1fr}}
        @media(max-width:480px){.products{grid-template-columns:1fr}.categories{grid-template-columns:repeat(2,1fr)}.hero{padding:30px 22px}}
    </style>
</head>
<body>
<header class="nav"><div class="container nav-inner">
    <a class="brand" href="{{ route('home') }}">فروشگاه من</a>
    <nav class="nav-links"><a href="{{ route('home') }}">خانه</a><a href="{{ route('shop') }}">فروشگاه</a><a href="#categories">دسته‌بندی‌ها</a></nav>
    <a class="cart" href="{{ route('cart') }}">🛒 سبد خرید</a>
</div></header>
<main class="container">@yield('content')</main>
<footer class="footer"><div class="container"><strong>فروشگاه من</strong><p>نسخه اولیه فروشگاه اینترنتی با Laravel</p></div></footer>
</body></html>
