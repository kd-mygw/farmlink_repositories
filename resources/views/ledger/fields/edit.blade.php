@extends('layouts.app')

@section('content')
<div class="field-registration-container">
    <h1 class="field-registration-title">圃場編集</h1>
    <form action="{{ route('ledger.fields.update', $field->id) }}" method="POST" class="field-registration-form">
        @csrf
        @method('PATCH')

        <div class="form-group">
            <label for="type">種別</label>
            <select name="type" id="type" class="form-select">
                <option value="露地" {{ $field->type == '露地' ? 'selected' : '' }}>露地</option>
                <option value="施設" {{ $field->type == '施設' ? 'selected' : '' }}>施設</option>
            </select>
        </div>
        <div class="form-group">
            <label for="name">圃場名</label>
            <input type="text" name="name" id="name" class="form-input" value="{{ $field->name }}" required>
        </div>
        <div class="form-group">
            <label for="area">面積</label>
            <input type="text" name="area" id="area" class="form-input" value="{{ $field->area }}" required>
        </div>
        <div class="form-group">
            <label for="area_unit">単位</label>
            <select name="area_unit" id="area_unit" class="form-select">
                <option value="a" {{ $field->area_unit == 'a' ? 'selected' : '' }}>a</option>
                <option value="反" {{ $field->area_unit == '反' ? 'selected' : '' }}>反</option>
                <option value="m²" {{ $field->area_unit == 'm²' ? 'selected' : '' }}>m²</option>
            </select>
        </div>
        <div class="form-group">
            <label for="ownership">所有形態</label>
            <select name="ownership" id="ownership" class="form-select">
                <option value="所有" {{ $field->ownership == '所有' ? 'selected' : '' }}>所有</option>
                <option value="借地" {{ $field->ownership == '借地' ? 'selected' : '' }}>借地</option>
            </select>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn-submit">更新</button>
            <a href="{{ route('ledger.fields.index') }}" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
                キャンセル
            </a>
        </div>
    </form>
</div>
@endsection
