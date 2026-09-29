<!doctype html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title ?? 'فروشگاه من' }}</title>

    <style>
        :root {
            --primary: #2563eb;
            --primary-dark: #1d4ed8;
            --bg: #f5f7fb;
            --card: #ffffff;
            --text: #111827;
            --muted: #64748b;
            --border: #e2e8f0;
            --soft-blue: #eff6ff;
            --success: #16a34a;
            --danger: #ef4444;
            --shadow: 0 10px 30px rgba(15, 23, 42, 0.07);
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family:
                Tahoma,
                Arial,
                "Segoe UI",
                sans-serif;
            background: var(--bg);
            color: var(--text);
            line-height: 1.8;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        button,
        input {
            font-family: inherit;
        }

        .container {
            width: min(1180px, 92%);
            margin: auto;
        }

        /* =========================
           NAVBAR
        ========================= */

        .nav {
            position: sticky;
            top: 0;
            z-index: 1000;
            background: rgba(255, 255, 255, 0.96);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid var(--border);
        }

        .nav-inner {
            min-height: 72px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 30px;
        }

        .brand {
            font-size: 25px;
            font-weight: 900;
            color: var(--primary);
            white-space: nowrap;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 8px;
            flex: 1;
        }

        .nav-links a {
            padding: 10px 15px;
            border-radius: 12px;
            color: #334155;
            font-weight: 600;
            transition: 0.2s ease;
        }

        .nav-links a:hover {
            background: var(--soft-blue);
            color: var(--primary);
        }

        .cart {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 10px 18px;
            border: 1px solid var(--border);
            border-radius: 13px;
            background: white;
            font-weight: 700;
            color: #1e293b;
            transition: 0.2s ease;
            white-space: nowrap;
        }

        .cart:hover {
            border-color: var(--primary);
            color: var(--primary);
            transform: translateY(-1px);
        }

        /* =========================
           MAIN
        ========================= */

        main.container {
            padding-top: 34px;
            padding-bottom: 50px;
        }

        /* =========================
           HERO
        ========================= */

        .hero {
            min-height: 390px;
            background:
                radial-gradient(circle at 15% 30%, rgba(255,255,255,0.9), transparent 25%),
                linear-gradient(135deg, #eff6ff, #dbeafe);
            border: 1px solid #dbeafe;
            border-radius: 30px;
            padding: 55px;
            display: grid;
            grid-template-columns: 1.15fr 0.85fr;
            align-items: center;
            gap: 30px;
            overflow: hidden;
            position: relative;
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 14px;
            background: white;
            border: 1px solid #dbeafe;
            border-radius: 999px;
            color: var(--primary);
            font-weight: 700;
            margin-bottom: 16px;
        }

        .hero h1 {
            font-size: clamp(34px, 5vw, 58px);
            line-height: 1.25;
            margin-bottom: 18px;
            font-weight: 900;
            letter-spacing: -1px;
        }

        .hero p {
            max-width: 650px;
            color: var(--muted);
            font-size: 18px;
            margin-bottom: 24px;
        }

        .hero-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-bottom: 18px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 50px;
            padding: 0 24px;
            border-radius: 14px;
            background: var(--primary);
            color: white;
            font-weight: 800;
            transition: 0.2s ease;
            border: 0;
        }

        .btn:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
        }

        .btn-light {
            background: white;
            color: var(--primary);
            border: 1px solid #bfdbfe;
        }

        .btn-light:hover {
            background: #eff6ff;
            color: var(--primary-dark);
        }

        .hero-features {
            display: flex;
            flex-wrap: wrap;
            gap: 18px;
            color: #475569;
            font-size: 14px;
            font-weight: 700;
        }

        .hero-visual {
            min-height: 280px;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        .hero-icon {
            width: 190px;
            height: 190px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 95px;
            background: rgba(255, 255, 255, 0.85);
            border-radius: 42px;
            box-shadow: 0 25px 60px rgba(37, 99, 235, 0.15);
            position: relative;
            z-index: 3;
            animation: float 4s ease-in-out infinite;
        }

        .hero-circle {
            position: absolute;
            border-radius: 50%;
            background:
