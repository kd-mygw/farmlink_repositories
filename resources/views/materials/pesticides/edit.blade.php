@extends('layouts.app')

@section('content')
<div class="field-registration-container">
    <h1 class="field-registration-title">農薬編集</h1>

    <form action="{{ route('materials.pesticides.update', $pesticide->id) }}" method="POST" class="field-registration-form">
        @csrf
        @method('PATCH')

        <div class="form-group">
            <label for="name">農薬名</label>
            <input type="text" name="name" id="name" class="form-input" value="{{ $pesticide->name }}">
        </div>

        <div class="form-group">
            <label for="active_ingredient">有効成分</label>
            <input type="text" name="active_ingredient" id="active_ingredient" class="form-input" value="{{ $pesticide->active_ingredient }}">
        </div>

        <div class="form-group">
            <label for="purchase_date">購入日</label>
            <input type="date" name="purchase_date" id="purchase_date" class="form-input" value="{{ $pesticide->purchase_date }}">
        </div>

        <div class="form-group">
            <label for="quantity">数量</label>
            <input type="number" name="quantity" id="quantity" class="form-input" value="{{ $pesticide->quantity }}">
        </div>

        <div class="form-group">
            <label for="application_rate">使用量</label>
            <input type="number" step="0.01" name="application_rate" id="application_rate" class="form-input" value="{{ $pesticide->application_rate }}">
        </div>

        <div class="form-group">
            <label for="lot_number">ロット番号</label>
            <input type="text" name="lot_number" id="lot_number" class="form-input" value="{{ $pesticide->lot_number }}">
        </div>

        <div class="form-actions">
            <button type="submit" class="btn-submit">更新</button>
            <a href="{{ route('materials.pesticides.index') }}" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
                キャンセル
            </a>
        </div>
    </form>
</div>
@endsection
