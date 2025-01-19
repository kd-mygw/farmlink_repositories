@extends('layouts.app')

@section('title','床土登録')
@section('content')
<div class="field-registration-container">
    <h1 class="field-registration-title">床土登録</h1>

    <form action="{{ route('materials.soils.store') }}" method="POST" class="field-registration-form">
        @csrf
        <div class="form-group">
            <label for="name">品名</label>
            <input type="text" name="name" id="name" class="form-input">
        </div>

        <div class="form-group">
            <label for="purchased_date">購入日または棚卸日</label>
            <input type="date" name="purchased_date" id="purchased_date" class="form-input">
        </div>

        <div class="form-group">
            <label for="content_volume">内容量</label>
            <input type="number" step="0.01" name="content_volume" id="content_volume" class="form-input">
        </div>

        <div class="form-group">
            <label for="unit">単位</label>
            <select name="unit" id="unit" class="form-select">
                <option value="kg">kg</option>
                <option value="g">g</option>
            </select>
        </div>

        <div class="form-group">
            <label for="quantity">数量</label>
            <input type="number" name="quantity" id="quantity" class="form-input">
        </div>

        <div class="form-group">
            <label for="purchase_price">購入金額</label>
            <input type="number" step="0.01" name="purchase_price" id="purchase_price" class="form-input">
        </div>

        <div class="form-group">
            <label for="supplier">購入先</label>
            <input type="text" name="supplier" id="supplier" class="form-input">
        </div>

        <div class="form-actions">
            <button type="submit" class="btn-submit">登録</button>
        </div>
    </form>
    {{-- @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}
</div>
@endsection
