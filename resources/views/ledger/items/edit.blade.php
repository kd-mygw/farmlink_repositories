@extends('layouts.app')

@section('title','品目編集')
@section('content')
<div class="field-registration-container">
    <h1 class="field-registration-title">品目編集</h1>

    <form action="{{ route('ledger.items.update', $item->id) }}" method="POST" class="field-registration-form">
        @csrf
        @method('PATCH')

        <div class="form-group">
            <label for="name">作物名</label>
            <input type="text" name="crop_name" id="crop_name" value="{{ $item->crop_name }}" class="form-input" required>
        </div>

        <div class="form-group">
            <label for="category">品種名</label>
            <input type="text" name="variety_name" id="variety_name" value="{{ $item->variety_name }}" class="form-input" required>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn-submit">
                更新
            </button>
            <a href="{{ route('ledger.items.index') }}" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
                キャンセル
            </a>
        </div>
    </form>
</div>
@endsection
