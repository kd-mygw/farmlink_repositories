@extends('layouts.public')

@section('content')
<div class="container default-container">
    <!-- Header -->
    {{-- <header>
        <div class="logo">FARM LINK</div>
    </header> --}}

    <!-- Hero Section -->
    <section class="hero">
        <div class="slider-container">
            <div class="slider">
                @if ($crop->images)
                    @foreach (json_decode($crop->images, true) as $image)
                        <div class="slide">
                            <img src="{{ asset('storage/' . $image) }}" alt="Image">
                        </div>
                    @endforeach
                @endif
            </div>
            <!-- ナビゲーションボタン -->
            <button class="prev">&lt;</button>
            <button class="next">&gt;</button>
        </div>
        <div class="hero-content">
            <h1>{{ $crop->product_name }} -{{ $crop->name }}-</h1>
            @if (str_contains($crop->cultivation_method, '有機栽培'))
                <span class="badge">有機栽培</span>
            @elseif (str_contains($crop->cultivation_method, '特別栽培'))
                <span class="badge">特別栽培</span>
            @elseif (str_contains($crop->cultivation_method, '慣行栽培'))
                <span class="badge">慣行栽培</span>
            @elseif (str_contains($crop->cultivation_method, '自然栽培'))
                <span class="badge">自然栽培</span>
            @endif
        </div>
    </section>
            <!-- Farmer Information -->
    <section class="section">
        <h2 class="section-title">農家の一言</h2>
        <div class="card">
            <div class="farmer-profile">
                <div class="farmer-avatar">
                    <img src="{{ asset('storage/' . $icon) }}" alt="User Icon" >
                </div>
                <div class="farmer-info">
                    <h3>{{ $name }}</h3>
                </div>
            </div>
            <p class="farmer-philosophy">
                {!! nl2br(e($crop->description)) !!}
            </p>
        </div>
    </section>


    <!-- Main Content -->
    <main>
        <!-- Product Information -->
        <section class="section">
            <br>
            <h2 class="section-title">商品情報</h2>
            <div class="card-grid">
                <div class="card">
                    <div class="card-icon">📍</div>
                    <h3>生産地</h3>
                    <p>{{ $farm_name}}</p>
                    <p>{{ $farm_address }}</p>
                </div>
                <div class="card">
                    <div class="card-icon">🌱</div>
                    <h3>栽培方法</h3>
                    <p>{{ $crop->cultivation_method }}</p>
                </div>
                <div class="card">
                    <div class="card-icon">💧</div>
                    <h3>農薬情報</h3>
                    <p>{{ $crop->pesticide_info }}</p>
                </div>
                <div class="card">
                    <div class="card-icon">🍃</div>
                    <h3>肥料情報</h3>
                    <p>{{ $crop->fertilizer_info }}</p>
                </div>
            </div>
        </section>


        <!-- Recommended Recipes -->
        <section class="section">
            @if (!empty($crop->cooking_tips))
            <h2 class="section-title">おいしい食べ方</h2>
            <div class="card">
                @if ($crop->recipe_image)
                    <img src="{{ asset('storage/' . $crop->recipe_image) }}" alt="おすすめレシピ" class="recipe-image">
                @endif
                <p class="recipe-description">
                    {!! nl2br(e($crop->cooking_tips)) !!}
                </p>
            </div>
            @endif
        </section>
        <!-- Video Section -->
        <section class="section">
            @if (!empty($crop->video))
                <h2 class="section-title">紹介動画</h2>
                <div class="card">
                    <video controls class="w-full rounded-lg shadow">
                        <source src="{{ asset('storage/' . $crop->video) }}" type="video/mp4">
                        お使いのブラウザは動画タグに対応していません。
                    </video>
                </div>
            @endif
        </section>        
    </main>
</div>
<div class="g-map">
  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3240.8405960914815!2d139.76588025282885!3d35.6809268055874!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60188bfbd89f700b%3A0x277c49ba34ed38!2z5p2x5Lqs6aeF!5e0!3m2!1sja!2sjp!4v1681002171900!5m2!1sja!2sjp" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>
@endsection

<script>
   document.addEventListener("DOMContentLoaded", function () {
        const slider = document.querySelector(".slider");
        const slides = document.querySelectorAll(".slide");
        const prevButton = document.querySelector(".prev");
        const nextButton = document.querySelector(".next");

        let currentIndex = 0;

        // スライダーを更新
        function updateSlider() {
            const offset = -currentIndex * 100; // 表示位置を計算
            slider.style.transform = `translateX(${offset}%)`;
        }

        // 前のスライド
        prevButton.addEventListener("click", () => {
            currentIndex = (currentIndex - 1 + slides.length) % slides.length;
            updateSlider();
        });

        // 次のスライド
        nextButton.addEventListener("click", () => {
            currentIndex = (currentIndex + 1) % slides.length;
            updateSlider();
        });

        // 自動スライド (任意で設定)
        setInterval(() => {
            currentIndex = (currentIndex + 1) % slides.length;
            updateSlider();
        }, 5000); // 5秒ごとにスライド
    });
 </script>
 
 <style>
            /* Reset and base styles */
    * {
          margin: 0;
          padding: 0;
          box-sizing: border-box;
      }
      body {
          font-family: 'Helvetica Neue', Arial, sans-serif;
          line-height: 1.6;
          color: #333;
          background-color: #f8f9fa;
      }
      .default-container {
          max-width: 480px;
          margin: 0 auto;
          box-shadow: 0 0 10px rgba(0,0,0,0.1);
          background:url('/images/木目背景.jpg');
      }

      /* Header styles */
      header {
          background-color: #ffffff;
          padding: 1rem;
          position: sticky;
          top: 0;
          z-index: 1000;
          box-shadow: 0 2px 4px rgba(0,0,0,0.1);
      }
      .logo {
          font-size: 1.5rem;
          font-weight: bold;
          color: #2c7a2c;
      }

      /* Hero section styles */
/* スライダーコンテナ */
.slider-container {
    position: relative;
    width: 100%;
    max-width: 600px; /* 必要に応じて調整 */
    margin: 0 auto;
    overflow: hidden;
    height: auto;
}

/* スライダー */
.slider {
    display: flex;
    transition: transform 0.5s ease-in-out;
}

/* 各スライド */
.slide {
    flex: 0 0 100%; /* 表示領域いっぱいに表示 */
    text-align: center;
}

.slide img {
    width: 100%;
    height: auto;
    object-fit: cover; /* 画像が領域内に収まる */
    border-radius: 8px; /* 任意で角を丸くする */
}

/* ナビゲーションボタン */
.prev, .next {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background-color: rgba(0, 0, 0, 0.5);
    color: #fff;
    border: none;
    padding: 10px;
    cursor: pointer;
    z-index: 10;
}

.prev {
    left: 10px;
}

.next {
    right: 10px;
}

/* Hero全体の調整 */
.hero {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: flex-start;
    gap: 10px;
    text-align: center;
    padding: 1rem;
    overflow: hidden;
}
    
      .hero::after {
          content: '';
          position: absolute;
          top: 0;
          left: 0;
          right: 0;
          bottom: 0;
          /* background: linear-gradient(to top, rgba(0,0,0,0.6), transparent); */
      }
      .hero-content {
          position: relative;
          z-index: 2;
          text-align: center;
          padding: 10px 20px;
          background-color: rgba(0, 0, 0, 0.1); /* 半透明の黒背景でテキストを見やすく */
      }
      .hero h1 {
          font-size: 1.3rem;
          margin-bottom: 0.5rem;
          background-color: #999999;
      }
      .badge {
          display: inline-block;
          padding: 0.25rem 0.5rem;
          background-color: #4caf50;
          color: #fff;
          border-radius: 4px;
          font-size: 0.875rem;
      }

      /* Main content styles */
      main {
          padding: 1rem;
          /* background:url('/images/木目背景.jpg'); */
      }
      .section {
          margin-bottom: 2rem;
      }
      .section-title {
          font-size: 1.25rem;
          color: #2c7a2c;
          margin-bottom: 1rem;
          padding-bottom: 0.5rem;
          border-bottom: 2px solid #e0e0e0;
      }
    .card {
        font-family: 'G_PencilKaisho', Arial, sans-serif;
        padding: 1rem;
        margin-bottom: 1rem;
        box-shadow: 3px 3px 15px rgba(0, 0, 0, 0.2), -3px -3px 10px rgba(255, 255, 255, 0.6); 
        position: relative;
        background-image: url('/images/paper-texture.jpg'); /* 紙のような質感を追加 */
        background-size: cover;
    }
    
    /* ピンのスタイル (張り紙を固定しているように見せる) */
    .card::before {
        content: '';
        position: absolute;
        top: -10px;
        left: 50%;
        transform: translateX(-50%);
        width: 20px;
        height: 20px;
        background-color: #e0e0e0;
        border-radius: 50%;
        box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.2);
        z-index: 2;
    }
    .card::after {
        content: '';
        position: absolute;
        width: 40px;
        height: 10px;
        background-color: #f4d03f; /* 黄色いテープ */
        top: -5px;
        left: 50%;
        transform: translateX(-50%) rotate(-10deg); /* 少し傾けて自然な感じに */
        z-index: 1;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    }
      .card-grid {
          display: grid;
          grid-template-columns: repeat(2, 1fr);
          gap: 1rem;
      }
      .card-icon {
          font-size: 1.5rem;
          margin-bottom: 0.5rem;
          color: #2c7a2c;
      }
      .card h3 {
        font-family: 'G_PencilKaisho','Permanent Marker', cursive; /* Google Fontsからインポート */
        font-size: 1.25rem;
        margin-bottom: 0.5rem;
        color: #2c7a2c;
      }
      .card p {
          font-size: 0.875rem;
          color: #666;
      }

      /* Farmer profile styles */
      .farmer-profile {
          display: flex;
          align-items: center;
          margin-bottom: 1rem;
      }
      .farmer-avatar {
          width: 64px;
          height: 64px;
          border-radius: 50%;
          background-color: #4caf50;
          display: flex;
          align-items: center;
          justify-content: center;
          margin-right: 1rem;
      }
      .farmer-avatar img {
          width: 100%;
          height: 100%;
          border-radius: 50%;
          object-fit: cover;
      }
      .farmer-info h3 {
          font-size: 1.125rem;
          margin-bottom: 0.25rem;
      }
      .farmer-info p {
          font-size: 0.875rem;
          color: #666;
      }
      .farmer-philosophy {
          font-size: 0.875rem;
          line-height: 1.6;
      }

    /* レシピ画像の張り紙風スタイル */
    .recipe-image {
    border: 2px dashed #ccc; /* 破線を追加 */
    padding: 5px;
    background-color: #fdfdfd; /* 紙の色 */
    border-radius: 8px;
    box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.1);
    }
      .recipe-description {
          font-size: 0.875rem;
          line-height: 1.6;
      }

      .header_area {
        padding: 0;
        display: grid;
        place-items: center;
        object-fit: cover;
      }

      @font-face {
        font-family: 'G_PencilKaisho';
        src: url('/fonts/g_pencilkaisho_free.ttf') format('truetype');
        font-weight: normal;
        font-style: normal;
    }
    
 </style>