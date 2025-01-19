@extends('layouts.public')

@section('content')
<div class="page-container">
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="hero-slider-container">
            @if ($crop->images)
                @foreach (json_decode($crop->images, true) as $image)
                    <div class="hero-slide">
                        <img src="{{ asset('storage/' . $image) }}" alt="Product Image">
                    </div>
                @endforeach
            @endif
            <button class="hero-slide-prev">&lt;</button>
            <button class="hero-slide-next">&gt;</button>
        </div>
        <div class="hero-description">
            <h1>{{ $crop->product_name }} <span>- {{ $crop->name }}</span></h1>
            <span class="badge-cultivation 
                {{ str_contains($crop->cultivation_method, '有機栽培') ? 'organic' : 
                   (str_contains($crop->cultivation_method, '特別栽培') ? 'special' : 
                   (str_contains($crop->cultivation_method, '慣行栽培') ? 'conventional' : 
                   (str_contains($crop->cultivation_method, '自然栽培') ? 'natural' : ''))) }}">
                {{ $crop->cultivation_method }}
            </span>
        </div>
    </section>

    <!-- Farmer Information -->
    <section class="farmer-section">
        <h2>農家の一言</h2>
        <div class="farmer-section-profile">
            <img src="{{ asset('storage/' . $icon) }}" alt="{{ $name }}">
            <h3>{{ $name }}</h3>
        </div>
        <p>{!! nl2br(e($crop->description)) !!}</p>
    </section>

    <!-- Product Information -->
    <section class="product-section">
        <h2>商品情報</h2>
        <div class="product-cards">
            <div class="product-card">
                <div class="product-card-icon">📍</div>
                <h3>生産地</h3>
                <p>{{ $farm_name }}</p>
                <p>{{ $farm_address }}</p>
            </div>
            <div class="product-card">
                <div class="product-card-icon">🌱</div>
                <h3>栽培方法</h3>
                <p>{{ $crop->cultivation_method }}</p>
            </div>
            <div class="product-card">
                <div class="product-card-icon">💧</div>
                <h3>農薬情報</h3>
                <p>{{ $crop->pesticide_info }}</p>
            </div>
            <div class="product-card">
                <div class="product-card-icon">🍃</div>
                <h3>肥料情報</h3>
                <p>{{ $crop->fertilizer_info }}</p>
            </div>
        </div>
    </section>

    <!-- Recommended Recipes -->
    @if (!empty($crop->cooking_tips))
    <section class="recipe-section">
        <h2>おいしい食べ方</h2>
        <div class="recipe-section-content">
            @if ($crop->recipe_image)
                <img src="{{ asset('storage/' . $crop->recipe_image) }}" alt="おすすめレシピ">
            @endif
            <p>{!! nl2br(e($crop->cooking_tips)) !!}</p>
        </div>
    </section>
    @endif

    <!-- Video Section -->
    @if (!empty($crop->video))
    <section class="video-section">
        <h2>紹介動画</h2>
        <div class="video-section-container">
            <video controls>
                <source src="{{ asset('storage/' . $crop->video) }}" type="video/mp4">
                お使いのブラウザは動画タグに対応していません。
            </video>
        </div>
    </section>
    @endif

    <!-- Google Map -->
    <section class="map-section">
        <h2>農場の場所</h2>
        <div class="map-section-container">
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3240.8405960914815!2d139.76588025282885!3d35.6809268055874!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60188bfbd89f700b%3A0x277c49ba34ed38!2z5p2x5Lqs6aeF!5e0!3m2!1sja!2sjp!4v1681002171900!5m2!1sja!2sjp"
                width="600" height="450" style="border:0;" allowfullscreen=""
                loading="lazy" referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
    </section>
</div>
@endsection

@section('scripts')
<script>
document.addEventListener("DOMContentLoaded", function () {
    const slider = document.querySelector(".hero-slider-container");
    const slides = document.querySelectorAll(".hero-slide");
    const prevButton = document.querySelector(".hero-slide-prev");
    const nextButton = document.querySelector(".hero-slide-next");

    let currentIndex = 0;

    function updateSlider() {
        slides.forEach((slide, index) => {
            slide.style.opacity = index === currentIndex ? "1" : "0";
        });
    }

    prevButton.addEventListener("click", () => {
        currentIndex = (currentIndex - 1 + slides.length) % slides.length;
        updateSlider();
    });

    nextButton.addEventListener("click", () => {
        currentIndex = (currentIndex + 1) % slides.length;
        updateSlider();
    });

    setInterval(() => {
        currentIndex = (currentIndex + 1) % slides.length;
        updateSlider();
    }, 5000);

    updateSlider();
});
</script>
@endsection

<style>
/* 
 * Google Fonts の読み込み例 (<head> に入れてください):
 * <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
 */

/* --- ベーススタイル --- */
body {
    margin: 0;
    padding: 0;
    font-family: 'Poppins', 'Arial', sans-serif;
    line-height: 1.6;
    color: #444;
    background-color: #f9fafc;
}

.page-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
}

/* --- Hero Section (スライダー部分) --- */
.hero-section {
    position: relative;
    margin-bottom: 40px;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.07);
}

.hero-slider-container {
    position: relative;
    height: 450px;
}

.hero-slide {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    opacity: 0;
    transition: opacity 0.7s ease-in-out;
}

.hero-slide img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.hero-slide-prev,
.hero-slide-next {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background-color: rgba(255, 255, 255, 0.6);
    border: none;
    border-radius: 50%;
    width: 45px;
    height: 45px;
    font-size: 20px;
    cursor: pointer;
    transition: background-color 0.3s;
    outline: none;
    font-weight: bold;
}

.hero-slide-prev:hover,
.hero-slide-next:hover {
    background-color: rgba(255, 255, 255, 0.9);
}

.hero-slide-prev {
    left: 10px;
}

.hero-slide-next {
    right: 10px;
}

/* ヒーローにグラデーションオーバーレイ */
.hero-section::after {
    content: "";
    position: absolute;
    inset: 0;
    background: linear-gradient(to top, rgba(0, 0, 0, 0.7), transparent 60%);
    pointer-events: none;
}

.hero-description {
    position: absolute;
    bottom: 20px;
    left: 0;
    right: 0;
    padding: 0 20px;
    color: #fff;
    text-align: center;
    z-index: 2; 
    text-shadow: 0 2px 4px rgba(0,0,0,0.5);
}

.hero-description h1 {
    margin: 0 0 10px;
    font-size: 2.5rem;
    font-weight: 600;
}

.hero-description h1 span {
    font-weight: 400;
    opacity: 0.9;
}

/* 栽培方法のバッジ */
.badge-cultivation {
    display: inline-block;
    padding: 6px 12px;
    border-radius: 20px;
    font-size: 0.9em;
    font-weight: 600;
}

.badge-cultivation.organic { background-color: #3D9970; }
.badge-cultivation.special { background-color: #0074D9; }
.badge-cultivation.conventional { background-color: #FF851B; }
.badge-cultivation.natural { background-color: #B10DC9; }

/* --- Farmer Information (農家情報) --- */
.farmer-section {
    background-color: #fff;
    border-radius: 10px;
    padding: 20px;
    margin-bottom: 40px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.06);
}

.farmer-section-profile {
    display: flex;
    align-items: center;
    margin-bottom: 20px;
}

.farmer-section-profile img {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    object-fit: cover;
    margin-right: 20px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

/* --- Product Information --- */
.product-section {
    margin-bottom: 40px;
}

.product-cards {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 20px;
}

.product-card {
    background-color: #fff;
    border-radius: 10px;
    padding: 20px;
    box-shadow: 0 3px 6px rgba(0, 0, 0, 0.05);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.product-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.08);
}

.product-card-icon {
    font-size: 2rem;
    margin-bottom: 10px;
}

/* --- Recommended Recipes (おいしい食べ方) --- */
.recipe-section {
    background-color: #fff;
    border-radius: 10px;
    padding: 20px;
    margin-bottom: 40px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.06);
}

.recipe-section-content {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
}

.recipe-section-content img {
    max-width: 100%;
    height: auto;
    border-radius: 10px;
    flex: 1 1 300px;
    box-shadow: 0 3px 6px rgba(0,0,0,0.1);
}

.recipe-section-content p {
    flex: 1 1 300px;
    font-size: 1rem;
    line-height: 1.7;
}

/* --- Video Section --- */
.video-section {
    margin-bottom: 40px;
}

.video-section-container {
    position: relative;
    padding-bottom: 56.25%; /* 16:9 Aspect Ratio */
    height: 0;
    overflow: hidden;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.06);
}

.video-section-container video {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    border-radius: 10px;
    object-fit: cover;
}

/* --- Map Section --- */
.map-section {
    margin-bottom: 40px;
}

.map-section-container {
    position: relative;
    padding-bottom: 56.25%;
    height: 0;
    overflow: hidden;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.06);
}

.map-section-container iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    border: 0;
    border-radius: 10px;
}

/* --- General Styles --- */
h2 {
    font-size: 1.8rem;
    margin-bottom: 20px;
    color: #2c3e50;
    font-weight: 600;
}

h3 {
    font-size: 1.3rem;
    margin-bottom: 10px;
    color: #34495e;
    font-weight: 600;
}

p {
    margin-bottom: 15px;
    font-size: 0.95rem;
}

/* --- Responsive (768px以下) --- */
@media (max-width: 768px) {
    .hero-description h1 {
        font-size: 1.8rem;
    }
    .hero-slider-container {
        height: 300px;
    }

    .product-cards {
        grid-template-columns: 1fr;
    }

    .recipe-section-content {
        flex-direction: column;
    }
}
</style>
