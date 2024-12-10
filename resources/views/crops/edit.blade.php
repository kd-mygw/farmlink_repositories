@extends('layouts.app')

@section('content')
<div class="crop-body">
    <div class="crop-container">
        <h1 class="crop-header">農作物の編集</h1>
        <form action="{{ route('crops.update', $crop->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="crop-form-group">
                <label for="product_name" class="crop-form-label">商品名</label>
                <input type="text" class="crop-form-control" id="product_name" name="product_name" value="{{ $crop->product_name }}" required>
            </div>
            <div class="crop-form-group">
                <label for="name" class="crop-form-label">品種名</label>
                <input type="text" class="crop-form-control" id="name" name="name" value="{{ $crop->name }}" required>
            </div>
            <div class="crop-form-group">
                <label for="cultivation_method" class="crop-form-label">農法・栽培方法</label>
                <input type="text" class="crop-form-control" id="cultivation_method" name="cultivation_method" value="{{ $crop->cultivation_method }}" required>
            </div>
            <div class="crop-form-group">
                <label for="fertilizer_info" class="crop-form-label">使用している肥料</label>
                <textarea class="crop-textarea" id="fertilizer_info" name="fertilizer_info">{{ $crop->fertilizer_info }}</textarea>
            </div>
            <div class="crop-form-group">
                <label for="pesticide_info" class="crop-form-label">農薬</label>
                <textarea class="crop-textarea" id="pesticide_info" name="pesticide_info">{{ $crop->pesticide_info }}</textarea>
            </div>
            <div class="crop-form-group">
                <label for="description" class="crop-form-label">アピールポイント(魅力)</label>
                <textarea class="crop-textarea" id="description" name="description" required>{{ $crop->description }}</textarea>
            </div>
            <div class="crop-form-group">
                <label for="cooking_tips" class="crop-form-label">おすすめの調理法</label>
                <textarea class="crop-textarea" id="cooking_tips" name="cooking_tips" required>{{ $crop->cooking_tips }}</textarea>
            </div>
            <div class="crop-form-group">
                <label for="image" class="crop-image-upload-label">商品画像</label>
                <input type="file" class="crop-form-control" id="image" name="image">
                @if ($crop->image)
                    <img src="{{ asset('storage/' . $crop->image) }}" alt="商品画像" style="max-width: 300px; height: auto;">
                @endif
            </div>
            <div class="crop-form-group">
                <label for="video" class="crop-image-upload-label">商品紹介動画</label>
                <input type="file" class="crop-form-control" id="video" name="video">
                @if ($crop->video)
                    <video controls style="max-width: 300px; height: auto;">
                        <source src="{{ asset('storage/' . $crop->video) }}" type="video/mp4">
                        お使いのブラウザでは動画を再生できません。
                    </video>
                @endif
            </div>
            <button type="submit" class="crop-btn-primary">更新</button>
        </form>
    </div>
</div>
@endsection