<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FARMLINK</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body class="font-sans antialiased">
    <div class="container">
        <header class="header">
            <div class="header-left">
                <h1>FARMLINK</h1>
                <a href="/top" class="top-link">TOP</a>
            </div>
            <nav class="header-right">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="login-link">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="login-link">ログイン</a>
                    @endauth
                @endif
            </nav>
        </header>

        <main class="main-content">
            <h2>FARMLINKへようこそ</h2>
            <p class="description">生産者と消費者を繋ぐプラットフォーム</p>
            <div class="features">
                <div class="feature">
                    <span class="icon">👑</span>
                    <h3>魅力を伝える</h3>
                    <p>魅力・こだわりを消費者に伝える</p>
                </div>
                <div class="feature">
                    <span class="icon">🛡️</span>
                    <h3>安全性の保証</h3>
                    <p>安心して食べられる農作物を届ける</p>
                </div>
                <div class="feature">
                    <span class="icon">🤝</span>
                    <h3>生産者と消費者の絆</h3>
                    <p>顔の見える関係づくりで、食の大切さを共有</p>
                </div>
            </div>
            <a href="{{ route('register') }}" class="start-button">はじめる</a>
        </main>
    </div>
</body>
</html>
