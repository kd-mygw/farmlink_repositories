@extends('layouts.public')

@section('content')
<div class="container">
    <!-- Header -->
    {{-- <header>
        <div class="logo">FARM LINK</div>
    </header> --}}

    <!-- Hero Section -->
    <section class="hero">
        @if ($crop->image)
            <img src="{{ asset('storage/' . $crop->image) }}" alt="{{ $crop->product_name }}" alt="Crop Image" class="">
        @endif
        <div class="hero-content">
            <h1>{{ $crop->product_name }} -{{ $crop->name }}-</h1>
            @if (str_contains($crop->cultivation_method, '有機栽培'))
                <span class="badge">有機栽培</span>
            @endif
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
                    <p>{{ Auth::user()->farm_address }}</p>
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

        <!-- Farmer Information -->
        <section class="section">
            @if (!empty($crop->description))
            <h2 class="section-title">農家の一言</h2>
            <div class="card">
                <div class="farmer-profile">
                    <div class="farmer-avatar">
                        <img src="{{ asset('storage/' . Auth::user()->icon) }}" alt="User Icon" >
                    </div>
                    <div class="farmer-info">
                        <h3>{{ $crop->farmer_name }}</h3>
                        <p>{{ $crop->farmer_title }}</p>
                    </div>
                </div>
                <p class="farmer-philosophy">
                    {!! nl2br(e($crop->description)) !!}
                </p>
            </div>
            @endif
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
    </main>
</div>
@endsection