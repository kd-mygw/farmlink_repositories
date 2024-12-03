@extends('layouts.app')

@section('content')
<div class="container">
    <h1>農作物の編集</h1>
    <form action="{{ route('crops.update', $crop->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="product_name">商品名</label>
            <input type="text" class="form-control" id="product_name" name="product_name" value="{{ $crop->product_name }}" required>
        </div>
        <div class="form-group">
            <label for="name">品種名</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $crop->name }}" required>
        </div>
        <div class="form-group">
            <label for="cultivation_method">農法・栽培方法</label>
            <input type="text" class="form-control" id="cultivation_method" name="cultivation_method" value="{{ $crop->cultivation_method }}" required>
        </div>
        <div class="form-group">
            <label for="fertilizer_info">使用している肥料</label>
            <input type="text" class="form-control" id="fertilizer_info" name="fertilizer_info" value="{{ $crop->fertilizer_info }}">
        </div>
        <div class="form-group">
            <label for="pesticide_info">農薬</label>
            <input type="text" class="form-control" id="pesticide_info" name="pesticide_info" value="{{ $crop->pesticide_info }}">
        </div>
        <div class="form-group">
            <label for="description">アピールポイント(魅力)</label>
            <input type="text" class="form-control" id="description" name="description" value="{{ $crop->description }}" required>
        </div>
        <div class="form-group">
            <label for="cooking_tips">おすすめの調理法</label>
            <input type="text" class="form-control" id="cooking_tips" name="cooking_tips" value="{{ $crop->cooking_tips }}" required>
        </div>
        <div class="form-group">
            <label for="image">商品画像</label>
            <input type="file" class="form-control" id="image" name="image" value="{{ $crop->image }}">
        </div>
        <div class="form-group">
            <label for="video">商品紹介動画</label>
            <input type="file" class="form-control" id="video" name="video" value="{{ $crop->video }}">
        </div>
        <button type="submit" class="btn btn-primary">更新</button>
    </form>
</div>
@endsection