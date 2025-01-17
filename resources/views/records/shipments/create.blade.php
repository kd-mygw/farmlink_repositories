@extends('layouts.app')

@section('content')
<div class="field-registration-container">
    <h1 class="field-registration-title">出荷登録</h1>

    {{-- バリデーションエラーなどの表示例 --}}
    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-200 text-red-800 rounded">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>・{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('record.shipment.store') }}" method="POST" class="field-registration-form">
        @csrf

        {{-- 日付 --}}
        <div class="form-group">
            <label for="date">日付</label>
            <input type="date" name="date" id="date"
                   class="form-input"
                   value="{{ old('date') }}"
                   required>
        </div>

        {{-- 取引先 (client_id) --}}
        <div class="form-group">
            <label for="client_id">取引先</label>
            <select name="client_id" id="client_id"
                    class="form-select"
                    required>
                <option value="" disabled selected>選択してください</option>
                @foreach ($clients as $client)
                    <option value="{{ $client->id }}"
                        {{ old('client_id') == $client->id ? 'selected' : '' }}>
                        {{ $client->official_name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- 出荷品名 (cropping_id or product_id) --}}
        <div class="form-group">
            <label class="block text-gray-700 text-sm font-bold mb-2">出荷品名</label>
            
            <div class="form-group">
                <select name="cropping_id" id="cropping_id"
                        class="form-select">
                    <option value="" selected>作付名を選択してください</option>
                    @foreach ($croppings as $cropping)
                        <option value="{{ $cropping->id }}"
                            {{ old('cropping_id') == $cropping->id ? 'selected' : '' }}>
                            {{ $cropping->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <label class="block text-gray-700 text-sm font-bold mb-2">商品名</label>
            <div class="form-group">
                <select name="product_id" id="product_id"
                        class="form-select">
                    <option value="" selected>商品を選択してください</option>
                    @foreach ($crops as $crop)
                        <option value="{{ $crop->id }}"
                            {{ old('product_id') == $crop->id ? 'selected' : '' }}>
                            {{ $crop->product_name }}
                        </option>
                    @endforeach
                </select>
            </div>
            
        </div>

        {{-- 単価 (unit_price) --}}
        <div class="form-group">
            <label for="unit_price">単価</label>
            <input type="number" step="0.01" name="unit_price" id="unit_price"
                   class="form-input"
                   value="{{ old('unit_price', 0) }}"
                   required>
        </div>

        {{-- 数量 (quantity) --}}
        <div class="form-group">
            <label for="quantity">数量</label>
            <input type="number" step="0.01" name="quantity" id="quantity"
                   class="form-input"
                   value="{{ old('quantity', 0) }}"
                   required>
        </div>

        {{-- メモ (memo) --}}
        <div class="form-group">
            <label for="memo">メモ</label>
            <textarea name="memo" id="memo" rows="4"
                      class="form-input">{{ old('memo') }}</textarea>
        </div>

        {{-- 登録ボタン --}}
        <div class="form-actions">
            <button type="submit"
                    class="btn-success">
                登録
            </button>
        </div>
    </form>
</div>
@endsection
