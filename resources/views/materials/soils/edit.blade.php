@extends('layouts.app')

@section('content')
<div class="field-registration-container">
    <h1 class="field-registration-title">床土編集</h1>

    <form action="{{ route('materials.soils.update', $soil->id) }}" method="POST" class="field-registration-form">
        @csrf
        @method('PATCH')

        <div class="form-group">
            <label for="name">品名</label>
            <input type="text" name="name" id="name" class="form-input" value="{{ $soil->name }}">
        </div>

        <div class="form-group">
            <label for="purchased_date">購入日または棚卸日</label>
            <input type="date" name="purchased_date" id="purchased_date" class="form-input" value="{{ $soil->purchased_date }}">
        </div>

        <div class="form-group">
            <label for="content_volume">内容量</label>
            <input type="number" name="content_volume" id="content_volume" class="form-input" value="{{ $soil->content_volume }}">
        </div>

        <div class="form-group">
            <label for="quantity">数量</label>
            <input type="number" name="quantity" id="quantity" class="form-input" value="{{ $soil->quantity }}">
        </div>

        <div class="form-group">
            <label for="purchase_price">購入金額</label>
            <input type="number" step="0.01" name="purchase_price" id="purchase_price" class="form-input" value="{{ $soil->purchase_price }}">
        </div>

        <div class="form-group">
            <label for="supplier">購入先</label>
            <input type="text" name="supplier" id="supplier" class="form-input" value="{{ $soil->supplier }}">
        </div>

        <div class="form-actions">
            <button type="submit" class="btn-submit">更新</button>
            <a href="{{ route('materials.soils.index') }}" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
                キャンセル
            </a>
        </div>
    </form>
</div>
@endsection
