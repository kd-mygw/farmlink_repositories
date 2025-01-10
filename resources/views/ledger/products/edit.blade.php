@extends('layouts.app')

@section('content')
<div class="field-registration-container">
    <h1 class="field-registration-title">商品編集</h1>

    <form action="{{ route('ledger.products.update', $product->id) }}" method="POST" class="field-registration-form">
        @csrf
        @method('PATCH')

        <div class="form-group">
            <label for="item_id">品目</label>
            <select name="item_id" id="item_id" class="form-select" required>
                <option value="" disabled>品目を選択してください</option>
                @foreach ($items as $item)
                    <option value="{{ $item->id }}" {{ $item->id == $product->item_id ? 'selected' : '' }}>
                        {{ $item->crop_name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- 商品名 --}}
        <div class="form-group">
            <label for="product_name">商品名</label>
            <input type="text" name="product_name" id="product_name" value="{{ $product->product_name }}" class="form-input" required>
        </div>
        
        <div class="form-group">
            <label for="packaging">包装容器</label>
            <input type="text" name="packaging" id="packaging" value="{{ $product->packaging }}" class="form-input" required>
        </div>

        <div class="form-group">
            <label for="quantity">入数</label>
            <input type="number" name="quantity" id="quantity" value="{{ $product->quantity }}" class="form-input" required>
        </div>

        <div class="form-group">
            <label for="unit_weight">出荷単位重量</label>
            <div class="flex">
                <input type="number" name="unit_weight" id="unit_weight" value="{{ $product->unit_weight }}" class="form-input" required>
                <select name="unit" id="unit" class="form-select" required>
                    <option value="kg" {{ $product->unit == 'kg' ? 'selected' : '' }}>kg</option>
                    <option value="g" {{ $product->unit == 'g' ? 'selected' : '' }}>g</option>
                    <option value="L" {{ $product->unit == 'L' ? 'selected' : '' }}>L</option>
                    <option value="mL" {{ $product->unit == 'mL' ? 'selected' : '' }}>mL</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="price">単価</label>
            <input type="number" step="1" name="price" id="price" value="{{ $product->price }}" class="form-input" required>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn-submit">
                更新
            </button>
            <a href="{{ route('ledger.products.index') }}" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
                キャンセル
            </a>
        </div>
    </form>
</div>
@endsection
