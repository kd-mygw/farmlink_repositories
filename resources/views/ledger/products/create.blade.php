@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-6">商品登録</h1>

    <form action="{{ route('ledger.products.store') }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf
        <div class="mb-4">
            <label for="item_id" class="block text-gray-700 text-sm font-bold mb-2">品目</label>
            <select name="item_id" id="item_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                <option value="" disabled selected>品目を選択してください</option>
                @foreach ($items as $item)
                    <option value="{{ $item->id }}">{{ $item->crop_name }}</option>
                @endforeach
            </select>
        </div>

        {{-- 商品名 --}}
        <div class="mb-4">
            <label for="product_name" class="block text-gray-700 text-sm font-bold mb-2">商品名</label>
            <input type="text" name="product_name" id="product_name" placeholder="例: トマト" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        </div>

        <div class="mb-4">
            <label for="packaging" class="block text-gray-700 text-sm font-bold mb-2">包装容器</label>
            <input type="text" name="packaging" id="packaging" placeholder="例: 箱" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        </div>

        <div class="mb-4">
            <label for="quantity" class="block text-gray-700 text-sm font-bold mb-2">入数</label>
            <input type="number" name="quantity" id="quantity" placeholder="例: 10" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        </div>

        <div class="mb-4">
            <label for="unit_weight" class="block text-gray-700 text-sm font-bold mb-2">出荷単位重量</label>
            <div class="flex">
                <input type="number" name="unit_weight" id="unit_weight" placeholder="例: 5" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                <select name="unit" id="unit" class="ml-2 shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    <option value="kg">kg</option>
                    <option value="g">g</option>
                    <option value="L">L</option>
                    <option value="mL">mL</option>
                </select>
            </div>
        </div>

        <div class="mb-4">
            <label for="price" class="block text-gray-700 text-sm font-bold mb-2">単価</label>
            <input type="number" name="price" id="price" placeholder="例: 1000" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        </div>

        <div class="flex items-center justify-between">
            <button type="submit" class="btn btn-success">
                登録
            </button>
        </div>
    </form>
</div>
@endsection
