@extends('layouts.app')

@section('content')
<div class='container'>
    <h1>新規農作物登録</h1>
    <form action="{{ route('crops.store') }}" method=POST>
        @csrf
        <div class='form-group'>
            <label for="product_name">商品名</label>
            <input type="text" id="product_name" name="product_name" required>
        </div>
        <div class='form-group'>
            <label for="name">品種名</label>
            <input type="text" id="name" name="name">
        </div>
        <div class='form-group'>
            <label for="cultivation_method">農法・栽培方法</label>
            <input type="text" id="cultivation_method" name="cultivation_method" required>
        </div>
        <div class='form-group'>
            <label for="fertilizer_info">使用している肥料</label>
            <input type="text" id="fertilizer_info" name="fertilizer_info">
        </div>
        <div class='form-group'>
            <label for="pesticide_info">農薬</label>
            <input type="text" id="pesticide_info" name="pesticide_info">
        </div>
        <div class='form-group'>
            <label for="description">アピールポイント(魅力)</label>
            <input type="text" id="description" name="description" required>
        </div>
        <div class='form-group'>
            <label for="cooking_tips">おすすめの調理法</label>
            <input type="text" id="cooking_tips" name="cooking_tips" required>
        </div>
        <div class='form-group'>
            <label for="image">商品画像挿入</label>
            <input type="file" class="form-control-file" id="image" name="image">
        </div>
        <div class='form-group'>
            <label for="video">商品紹介動画挿入</label>
            <input type="file" class="form-control-file" id="video" name="video">
        </div>
        <input type="submit" value="保存">
    </form>
</div>