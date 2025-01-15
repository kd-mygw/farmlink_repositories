@extends('layouts.app')

@section('content')
<div class="field-registration-container">
    <h1 class="field-registration-title">種苗を登録</h1>

    <form action="{{ route('materials.seeds.store') }}" method="POST" class="field-registration-form">
        @csrf
        <div class="form-group">
            <label for="item_id">品目</label>
            <select name="item_id" id="item_id" class="form-select">
                @foreach ($items as $item)
                    <option value="{{ $item->id }}">{{ $item->crop_name }}({{ $item->variety_name}})</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="purchase_date">購入日/棚卸日</label>
            <input type="date" name="purchase_date" id="purchase_date" class="form-input">
        </div>
        <div class="form-group">
            <label for="content_volume">内容量</label>
            <input type="number" name="content_volume" id="content_volume" class="form-input">
        </div>
        <div class="form-group">
            <label for="quantity">数量</label>
            <input type="number" name="quantity" id="quantity" class="form-input">
        </div>
        <div class="form-group">
            <label for="expiry_date">有効期限</label>
            <input type="date" name="expiry_date" id="expiry_date" class="form-input">
        </div>
        <div class="form-group">
            <label for="lot_number">ロット番号</label>
            <input type="text" name="lot_number" id="lot_number" class="form-input">
        </div>
        <div class="form-actions">
            <button type="submit" class="btn-submit">
                登録
            </button>
        </div>
    </form>
</div>
@endsection
