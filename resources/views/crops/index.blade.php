@extends('layouts.app')

@section('content')
<div class="ledger-container">
    <div class="title-container">
        <h1 class="ledger-title">商品一覧</h1>
    </div>

    <!-- 検索バー -->
    <div class="search-bar">
        <form action="{{ route('crops.index') }}" method="GET">
            <input type="text" id="search-input" name="search" placeholder="検索キーワードを入力" value="{{ request('search') }}">
        </form>
    </div>

    <!-- 成功メッセージ -->
    @if (session('success'))
        <div class="crop-management-success-message">
            {{ session('success') }}
        </div>
    @endif

    <!-- 商品登録ボタン -->
    <div class="register-button-container">
        <a href="{{ route('crops.create') }}" class="btn btn-register">商品を登録する</a>
    </div>

    <!-- 商品カード一覧 -->
    <div class="product-card-container">
        @foreach ($crops as $crop)
            <div class="product-card">
                <div class="product-image slider-container">
                    <div class="slider">
                        @if ($crop->images)
                            @foreach (json_decode($crop->images, true) as $image)
                                <div class="slide">
                                    <img src="{{ asset('storage/' . $image) }}" alt="{{ $crop->product_name }}">
                                </div>
                            @endforeach
                        @else
                            <div class="slide">
                                <img src="{{ asset('images/default-placeholder.png') }}" alt="{{ $crop->product_name }}">
                            </div>
                        @endif
                    </div>
                    <button class="prev">&lt;</button>
                    <button class="next">&gt;</button>
                </div>
                <div class="product-details">
                    <h2 class="product-name">{{ $crop->product_name }}</h2>
                    <p class="product-category">{{ $crop->cultivation_method }}</p>
                    <p class="product-variety">品種: {{ $crop->name }}</p>
                    <div class="product-actions">
                        <a href="{{ route('crops.edit', $crop->id) }}" class="btn btn-edit">編集</a>
                        <form action="{{ route('crops.destroy', $crop->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-delete" onclick="return confirm('本当に削除しますか？')">削除</button>
                        </form>
                        @if ($crop->qr_code_path)
                            <a href="{{ asset('storage/' . $crop->qr_code_path) }}" target="_blank" class="btn btn-view">QRコードを表示</a>
                        @else
                            <form action="{{ route('qr.store', ['crop' => $crop->id]) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-generate">QRコードを生成</button>
                            </form>
                        @endif
                        <a href="{{ route('crops.templates.edit', $crop->id) }}" class="btn btn-template">テンプレート選択</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- ページネーション -->
    <div class="pagination-links">
        {{ $crops->links() }}
    </div>
</div>
@endsection

<style>
.ledger-container {
    padding: 20px;
    background-color: #f9f9f9;
}

.title-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.register-button-container {
    margin-top: 20px;
    text-align: center;
}

.btn-register {
    display: inline-block;
    background-color: #4CAF50;
    color: white;
    padding: 10px 20px;
    font-size: 1rem;
    font-weight: bold;
    border-radius: 8px;
    text-decoration: none;
    transition: background-color 0.3s ease;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.btn-register:hover {
    background-color: #388E3C;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
}

.product-card-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 15px;
    margin-top: 20px;
}

.product-card {
    background: #fff;
    border-radius: 8px;
    box-shadow: 0 1px 4px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    display: flex;
    flex-direction: column;
    height: 320px;
}

.product-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
}

.slider-container {
    position: relative;
    overflow: hidden;
    width: 100%;
    height: 150px;
    flex-shrink: 0;
}

.slider {
    display: flex;
    transition: transform 0.5s ease;
}

.slide {
    flex: 0 0 100%;
    text-align: center;
}

.slide img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.prev, .next {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background-color: rgba(0, 0, 0, 0.5);
    color: #fff;
    border: none;
    padding: 5px;
    cursor: pointer;
    z-index: 10;
    border-radius: 50%;
}

.prev {
    left: 5px;
}

.next {
    right: 5px;
}

.product-details {
    padding: 10px;
    flex-grow: 1;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.product-name {
    font-size: 1rem;
    font-weight: bold;
    margin-bottom: 5px;
}

.product-category {
    font-size: 0.85rem;
    color: #777;
    margin-bottom: 10px;
}

.product-variety {
    font-size: 0.85rem;
    margin-bottom: 10px;
}

.product-actions {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
}

.product-actions .btn {
    flex: 1;
    text-align: center;
    padding: 8px 10px;
    border-radius: 4px;
    font-size: 0.85rem;
    font-weight: bold;
    text-decoration: none;
    transition: all 0.3s ease;
    cursor: pointer;
}

.btn-edit {
    background-color: #4CAF50;
    color: white;
    border: none;
}

.btn-edit:hover {
    background-color: #388E3C;
}

.btn-delete {
    background-color: #F44336;
    color: white;
    border: none;
}

.btn-delete:hover {
    background-color: #D32F2F;
}

.btn-view {
    background-color: #2196F3;
    color: white;
    border: none;
}

.btn-view:hover {
    background-color: #1976D2;
}

.btn-generate {
    background-color: #FF9800;
    color: white;
    border: none;
}

.btn-generate:hover {
    background-color: #F57C00;
}

.btn-template {
    background-color: #9C27B0;
    color: white;
    border: none;
}

.btn-template:hover {
    background-color: #7B1FA2;
}
</style>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const sliders = document.querySelectorAll(".slider-container");

    sliders.forEach((container) => {
        const slider = container.querySelector(".slider");
        const slides = container.querySelectorAll(".slide");
        const prevButton = container.querySelector(".prev");
        const nextButton = container.querySelector(".next");

        let currentIndex = 0;

        function updateSlider() {
            const offset = -currentIndex * 100;
            slider.style.transform = `translateX(${offset}%)`;
        }

        prevButton.addEventListener("click", () => {
            currentIndex = (currentIndex - 1 + slides.length) % slides.length;
            updateSlider();
        });

        nextButton.addEventListener("click", () => {
            currentIndex = (currentIndex + 1) % slides.length;
            updateSlider();
        });
    });
});
</script>
