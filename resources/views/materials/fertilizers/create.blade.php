@extends('layouts.app')

@section('content')
<div class="field-registration-container">
    <h1 class="field-registration-title">肥料登録</h1>

    <form action="{{ route('materials.fertilizers.store') }}" method="POST" class="field-registration-form">
        @csrf
        <div class="form-group">
            <label for="name">肥料名</label>
            <input type="text" name="name" id="name" class="form-input">
        </div>

        <div class="form-group">
            <label for="nutrient">含有養分</label>
            <input type="text" name="nutrient" id="nutrient" class="form-input">
        </div>

        <div class="form-group">
            <label for="purchase_date">購入日</label>
            <input type="date" name="purchase_date" id="purchase_date" class="form-input">
        </div>

        <div class="form-group">
            <label for="quantity">数量</label>
            <input type="number" name="quantity" id="quantity" class="form-input">
        </div>

        <div class="form-group">
            <label for="application_rate">使用量</label>
            <input type="number" step="0.01" name="application_rate" id="application_rate" class="form-input">
        </div>

        <div class="form-group">
            <label for="lot_number">ロット番号</label>
            <input type="text" name="lot_number" id="lot_number" class="form-input">
        </div>

        <div class="form-actions">
            <button type="submit" class="btn-submit">登録</button>
        </div>
    </form>
</div>
@endsection
