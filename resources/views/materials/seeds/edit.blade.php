@extends('layouts.app')

@section('title','種苗編集')
@section('content')
<div class="field-registration-container">
    <h1 class="field-registration-title">種苗編集</h1>

    <form action="{{ route('materials.seeds.update', $seed->id) }}" method="POST" class="field-registration-form">
        @csrf
        @method('PATCH')

        <div class="form-group">
            <label for="item_id">品目</label>
            <select name="item_id" id="item_id" class="form-select">
                <option value="" disabled>品目を選択してください</option>
                @foreach ($items as $item)
                    <option value="{{ $item->id }}" {{ $item->id == $seed->item_id ? 'selected' : '' }}>
                        {{ $item->crop_name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="purchase_date">購入日/棚卸日</label>
            <input type="date" name="purchase_date" id="purchase_date" class="form-input" value="{{ $seed->purchase_date }}" required>
        </div>
        <div class="form-group">
            <label for="content_volume">内容量</label>
            <input type="number" name="content_volume" id="content_volume" class="form-input" value="{{ $seed->content_volume }}">
        </div>
        <div class="form-group">
            <label for="quantity">数量</label>
            <input type="number" name="quantity" id="quantity" class="form-input" value="{{ $seed->quantity }}">
        </div>
        <div class="form-group">
            <label for="expiry_date">有効期限</label>
            <input type="date" name="expiry_date" id="expiry_date" class="form-input" value="{{ $seed->expiry_date }}">
        </div>
        <div class="form-group">
            <label for="lot_number">ロット番号</label>
            <input type="text" name="lot_number" id="lot_number" class="form-input" value="{{ $seed->lot_number }}">
        </div>

        <div class="form-actions">
            <button type="submit" class="btn-submit">更新</button>
            <a href="{{ route('materials.seeds.index') }}" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
                キャンセル
            </a>
        </div>
    </form>
</div>
@endsection
