@extends('layouts.app')

@section('content')
<div class="crop-body">
    <div class="crop-container">
        <h1 class="crop-header">新規農作物の登録</h1>
        <form action="{{ route('crops.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @section('styles')
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

            <!-- 商品名 -->
            <div class="crop-form-group">
                <h2 class="crop-section-header">商品名</h2> <!-- 見出しを追加 -->
                <label for="product_name" class="crop-form-label">商品名</label>
                <input type="text" class="crop-form-control" id="product_name" name="product_name" required>
            </div>

            <!-- 品種名 -->
            <div class="crop-form-group">
                <h2 class="crop-section-header">品種名</h2> <!-- 見出しを追加 -->
                <label for="name" class="crop-form-label">品種名</label>
                <input type="text" class="crop-form-control" id="name" name="name" required>
            </div>

            <!-- 栽培方法 -->
            <div class="crop-form-group">
                <h2 class="crop-section-header">栽培方法</h2> <!-- 見出しを追加 -->
                <label for="cultivation_method" class="crop-form-label">栽培方法</label>
                <select class="crop-form-control" id="cultivation_method" name="cultivation_method" required>
                    <option value="">栽培方法を選択してください</option>
                    <option value="有機栽培">有機栽培</option>
                    <option value="特別栽培">特別栽培</option>
                    <option value="慣行栽培">慣行栽培</option>
                    <option value="自然栽培">自然栽培</option>
                </select>


            </div>

            <!-- 肥料情報 -->
            <div class="crop-form-group">
                <h2 class="crop-section-header">使用した肥料情報</h2> <!-- 見出しを追加 -->
                <textarea class="crop-textarea" name="fertilizer_info" id="fertilizer_info"></textarea>
            </div>

            <!-- 農薬情報 -->
            <div class="crop-form-group">
                <h2 class="crop-section-header">使用した農薬情報</h2> <!-- 見出しを追加 -->
                <textarea class="crop-textarea" name="pesticide_info" id="pesticide_info"></textarea>
            </div>

            <!-- アピールポイント -->
            <div class="crop-form-group">
                <h2 class="crop-section-header">アピールポイント（魅力）</h2> <!-- 見出しを追加 -->
                <textarea class="crop-textarea" name="description" id="description"></textarea>
            </div>

            <!-- おすすめの調理法 -->
            <div class="crop-form-group">
                <h2 class="crop-section-header">おすすめの調理法</h2> <!-- 見出しを追加 -->
                <textarea class="crop-textarea" name="cooking_tips" id="cooking_tips"></textarea>
            </div>

            <!-- 画像アップロード -->
            <div class="crop-form-group">
                <h2 class="crop-section-header">画像をアップロード</h2> <!-- 見出しを追加 -->
                <input type="file" class="crop-form-control" id="image" name="image">
            </div>

            <!-- 動画アップロード -->
            <div class="crop-form-group">
                <h2 class="crop-section-header">動画のアップロード</h2> <!-- 見出しを追加 -->
                <input type="file" class="crop-form-control" id="video" name="video">
            </div>

            <button type="submit" class="crop-btn-primary">登録</button>
        </form>
    </div>
</div>
@endsection
