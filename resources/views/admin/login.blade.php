<!doctype html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ورود مدیریت | فروشگاه من</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: Tahoma, Arial, sans-serif;
            background: linear-gradient(135deg, #eff6ff, #dbeafe);
            color: #0f172a;
        }

        .login-card {
            width: min(430px, 92%);
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 24px;
            padding: 34px;
            box-shadow: 0 20px 60px rgba(15, 23, 42, .10);
        }

        .logo {
            width: 64px;
            height: 64px;
            margin: 0 auto 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 18px;
            background: #2563eb;
            color: white;
            font-size: 30px;
        }

        h1 {
            text-align: center;
            margin: 0 0 8px;
            font-size: 26px;
        }

        .subtitle {
            text-align: center;
            color: #64748b;
            margin-bottom: 28px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input {
            width: 100%;
            height: 48px;
            border: 1px solid #cbd5e1;
            border-radius: 12px;
            padding: 0 14px;
            font-family: inherit;
            margin-bottom: 18px;
            outline: none;
        }

        input:focus {
            border-color: #2563eb;
        }

        button {
            width: 100%;
            height: 50px;
            border: 0;
            border-radius: 12px;
            background: #2563eb;
            color: white;
            font-family: inherit;
            font-weight: bold;
            font-size: 15px;
            cursor: pointer;
        }

        button:hover {
            background: #1d4ed8;
        }

        .error {
            background: #fef2f2;
            color: #b91c1c;
            border: 1px solid #fecaca;
            padding: 12px;
            border-radius: 12px;
            margin-bottom: 18px;
        }

        .back {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #2563eb;
            text-decoration: none;
        }
    </style>
</head>

<body>

<div class="login-card">

    <div class="logo">🔐</div>

    <h1>ورود به مدیریت</h1>

    <div class="subtitle">
        پنل مدیریت فروشگاه من
    </div>

    @if($errors->has('login'))
        <div class="error">
            {{ $errors->first('login') }}
        </div>
    @endif

    <form method="POST" action="{{ route('admin.login.submit') }}">
        @csrf

        <label for="username">نام کاربری</label>
        <input
            id="username"
            type="text"
            name="username"
            value="{{ old('username') }}"
            autocomplete="username"
            required
        >

        <label for="password">رمز عبور</label>
        <input
            id="password"
            type="password"
            name="password"
            autocomplete="current-password"
            required
        >

        <button type="submit">
            ورود به پنل مدیریت
        </button>
    </form>

    <a class="back" href="{{ route('home') }}">
        ← بازگشت به فروشگاه
    </a>

</div>

</body>
</html>
