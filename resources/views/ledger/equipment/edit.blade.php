@extends('layouts.app')

@section('title','機械設備編集')
@section('content')
<div class="field-registration-container">
    <h1 class="field-registration-title">機械設備編集</h1>

    <form action="{{ route('ledger.equipment.update', $equipment->id) }}" method="POST" class="field-registration-form">
        @csrf
        @method('PATCH')

        <div class="form-group">
            <label for="equipment_name">機械設備名</label>
            <input type="text" name="equipment_name" id="equipment_name" value="{{ $equipment->name }}" class="form-input" required>
        </div>

        <div class="form-group">
            <label for="model_number">型番形式</label>
            <input type="text" name="model_number" id="model_number" value="{{ $equipment->model }}" class="form-input" required>
        </div>

        <div class="form-group">
            <label for="manufacturer">メーカー</label>
            <input type="text" name="manufacturer" id="manufacturer" value="{{ $equipment->manufacturer }}" class="form-input">
        </div>
        
        <div class="form-group">
          <label for="fuel_type">燃料種別</label>
          <input type="text" name="fuel_type" id="fuel_type" value="{{ $equipment->fuel_type }}" class="form-input">
        </div>

        <div class="form-group">
          <label for="acquisition_date">取得日</label>
          <input type="date" name="acquisition_date" id="acquisition_date" value="{{ $equipment->acquisition_date }}" class="form-input">
        </div>

        <div class="form-group">
          <label for="unit_price">取得金額</label>
          <input type="number" step="1" name="unit_price" id="unit_price" value="{{ $equipment->unit_price }}" class="form-input">
        </div>



        <div class="form-actions">
            <button type="submit" class="btn-submit">
                更新
            </button>
            <a href="{{ route('ledger.equipment.index') }}" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
                キャンセル
            </a>
        </div>
    </form>
</div>
@endsection
