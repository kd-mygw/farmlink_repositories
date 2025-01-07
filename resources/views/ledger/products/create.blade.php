@extends('layouts.app')

@section('content')
<div class="field-registration-container">
    <h1 class="field-registration-title">商品登録</h1>

    <form action="{{ route('ledger.products.store') }}" method="POST" class="field-registration-form">
        @csrf
        <div class="form-group">
            <label for="item_id">品目</label>
            <select name="item_id" id="item_id" class="form-select">
                <option value="" disabled selected>品目を選択してください</option>
                @foreach ($items as $item)
                    <option value="{{ $item->id }}">{{ $item->crop_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="packaging">包装容器</label>
            <input type="text" name="packaging" id="packaging" placeholder="例: 箱" class="form-input">
        </div>

        <div class="form-group">
            <label for="quantity">入数</label>
            <input type="number" name="quantity" id="quantity" placeholder="例: 10" class="form-input">
        </div>

        <div class="form-group">
            <label for="unit_weight">出荷単位重量</label>
            <div class="flex">
                <input type="number" name="unit_weight" id="unit_weight" placeholder="例: 5" class="form-input">
                <select name="unit" id="unit" class="form-select">
                    <option value="kg">kg</option>
                    <option value="g">g</option>
                    <option value="L">L</option>
                    <option value="mL">mL</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="price">単価</label>
            <input type="number" name="price" id="price" placeholder="例: 1000" class="form-input">
        </div>

        <div class="flex items-center justify-between">
            <button type="submit" class="btn btn-success">
                登録
            </button>
        </div>
    </form>
</div>
@endsection
