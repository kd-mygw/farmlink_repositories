@extends('layouts.public')

@section('content')
<div class="flp-page-container">
    <!-- Hero Section -->
    <section class="flp-hero-section">
        <div class="flp-hero-slider">
            @if ($crop->images)
                @foreach (json_decode($crop->images, true) as $image)
                    <div class="flp-hero-slide">
                        <img src="{{ asset('storage/' . $image) }}" alt="Product Image">
                    </div>
                @endforeach
            @endif
            <button class="flp-hero-slide-prev">&lt;</button>
            <button class="flp-hero-slide-next">&gt;</button>
        </div>
        <div class="flp-hero-description">
            <h1 class="flp-hero-title">{{ $crop->product_name }} <span>- {{ $crop->name }}</span></h1>
            <span class="flp-cultivation-badge 
                {{ str_contains($crop->cultivation_method, '有機栽培') ? 'flp-badge-organic' :
    (str_contains($crop->cultivation_method, '特別栽培') ? 'flp-badge-special' :
        (str_contains($crop->cultivation_method, '慣行栽培') ? 'flp-badge-conventional' :
            (str_contains($crop->cultivation_method, '自然栽培') ? 'flp-badge-natural' : ''))) }}">
                {{ $crop->cultivation_method }}
            </span>
        </div>
    </section>

    <!-- Farmer Information -->
    <section class="flp-farmer-section">
        <h2 class="flp-section-title">農家の一言</h2>
        <div class="flp-farmer-profile">
            <img src="{{ asset('storage/' . $icon) }}" alt="{{ $name }}" class="flp-farmer-image">
            <h3 class="flp-farmer-name">{{ $name }}</h3>
        </div>
        <p class="flp-farmer-description">{!! nl2br(e($crop->description)) !!}</p>
    </section>

    <!-- Product Information -->
    <section class="flp-product-section">
        <h2 class="flp-section-title">商品情報</h2>
        <div class="flp-product-grid">
            <div class="flp-product-card">
                <div class="flp-product-icon">📍</div>
                <h3 class="flp-product-title">生産地</h3>
                <p>{{ $farm_name }}</p>
                <p>{{ $farm_address }}</p>
            </div>
            <div class="flp-product-card">
                <div class="flp-product-icon">🌱</div>
                <h3 class="flp-product-title">栽培方法</h3>
                <p>{{ $crop->cultivation_method }}</p>
            </div>
            <div class="flp-product-card">
                <div class="flp-product-icon">💧</div>
                <h3 class="flp-product-title">農薬情報</h3>
                <p>{{ $crop->pesticide_info }}</p>
            </div>
            <div class="flp-product-card">
                <div class="flp-product-icon">🍃</div>
                <h3 class="flp-product-title">肥料情報</h3>
                <p>{{ $crop->fertilizer_info }}</p>
            </div>
        </div>
    </section>

    <!-- Recommended Recipes -->
    @if (!empty($crop->cooking_tips))
        <section class="flp-recipe-section">
            <h2 class="flp-section-title">おいしい食べ方</h2>
            <div class="flp-recipe-content">
                @if ($crop->recipe_image)
                    <img src="{{ asset('storage/' . $crop->recipe_image) }}" alt="おすすめレシピ" class="flp-recipe-image">
                @endif
                <p class="flp-recipe-text">{!! nl2br(e($crop->cooking_tips)) !!}</p>
            </div>
        </section>
    @endif

    <!-- Video Section -->
    @if (!empty($crop->video))
        <section class="flp-video-section">
            <h2 class="flp-section-title">紹介動画</h2>
            <div class="flp-video-container">
                <video controls class="flp-video-player">
                    <source src="{{ asset('storage/' . $crop->video) }}" type="video/mp4">
                    お使いのブラウザは動画タグに対応していません。
                </video>
            </div>
        </section>
    @endif

    <!-- Google Map -->
    <section class="flp-map-section">
        <h2 class="flp-section-title">農場の場所</h2>
        <div class="flp-map-container">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3240.8405960914815!2d139.76588025282885!3d35.6809268055874!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60188bfbd89f700b%3A0x277c49ba34ed38!2z5p2x5Lqs6aeF!5e0!3m2!1sja!2sjp!4v1681002171900!5m2!1sja!2sjp"
                class="flp-map-iframe">
            </iframe>
        </div>
    </section>
</div>
@endsection

<style>
    /* Global Styles */
    body {
        font-family: 'Roboto', sans-serif;
        line-height: 1.6;
        color: #333;
        background-color: #f3f4f6;
    }

    .flp-page-container {
        max-width: 1100px;
        margin: auto;
        padding: 20px;
    }

    /* Unique styles for sections, buttons, and cards */
    .flp-hero-section {
        background-color: #eef3f8;
        border-radius: 12px;
        overflow: hidden;
        position: relative;
    }

    .flp-cultivation-badge {
        font-weight: bold;
        padding: 6px 12px;
        border-radius: 16px;
    }

    /* Individual colors for badges */
    .flp-badge-organic {
        background-color: #44a67c;
    }

    .flp-badge-special {
        background-color: #327ab7;
    }

    .flp-badge-conventional {
        background-color: #f39c12;
    }

    .flp-badge-natural {
        background-color: #8e44ad;
    }

    /* Flex and grid-based layouts for responsive display */
    .flp-product-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 20px;
    }
</style>