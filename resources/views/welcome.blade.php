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
<body>
    <div class="container">
        <header class="header">
            <div class="header-inner">
                <a class="header-logo" href="{{route('welcome')}}">FARMLINK</a>
                <nav class="header-site-menu">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('data') }}" class="login-link">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="login-link">ログイン</a>
                        @endauth
                    @endif
                </nav>
    
            </div>
        </header>
        <main class="main">
            <div class="first-view">
                <div class="first-view-text">
                    <h1>FARMLINK</h1>
                    <p>生産者と消費者を繋ぐ</p>
                </div>
            </div>
            <div class="lead">
                <p>
                    FARMLINKは、生産者と消費者を繋ぐ架け橋です。<br>
                    あなたの野菜と声をたくさんの人に届けましょう。
                </p>
                <div class="link-button-area">
                    <a class="link-button-text" href="{{route('register')}}">はじめる</a>
                </div>
            </div>
            <div class="recommended">
                <h2>豊富な機能</h2>
                <ul class="item-list">
                    <li>
                        <img src="{{asset('../images/QRコードアイコン.png')}}" alt="">
                        <dl>
                            <dt>農作物ページ公開</dt>
                            <dd>オリジナルのQRコードを作成し、ページを公開することができます。</dd>
                        </dl>
                    </li>
                    <li>
                        <img src="{{asset('../images/キャベツイラスト.png')}}" alt="">
                        <dl>
                            <dt>資材管理</dt>
                            <dd>農作物の生産に必要な資材を管理できます。</dd>
                        </dl>
                    </li>
                    <li>
                        <img src="{{asset('../images/キャベツイラスト.png')}}" alt="">
                        <dl>
                            <dt>資材管理</dt>
                            <dd>農作物の生産に必要な資材を管理できます。</dd>
                        </dl>
                    </li>
                    <li>
                        <img src="{{asset('../images/キャベツイラスト.png')}}" alt="">
                        <dl>
                            <dt>資材管理</dt>
                            <dd>農作物の生産に必要な資材を管理できます。</dd>
                        </dl>
                    </li>
                    <li>
                        <img src="{{asset('../images/キャベツイラスト.png')}}" alt="">
                        <dl>
                            <dt>資材管理</dt>
                            <dd>農作物の生産に必要な資材を管理できます。</dd>
                        </dl>
                    </li>
                </ul>
            </div>
        </main>
        <footer class="footer">
            <p class="footer-tel">TEL 090-9454-2291</p>
            <p class="copyrigth">© 2025 べにくじゃく</p>
        </footer>
    </div>
</body>
</html>
