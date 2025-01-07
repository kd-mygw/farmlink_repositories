@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-6">農薬登録</h1>

    <form action="{{ route('materials.pesticides.store') }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf
        <div class="mb-4">
            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">農薬名</label>
            <input type="text" name="name" id="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" required>
        </div>

        <div class="mb-4">
            <label for="active_ingredient" class="block text-gray-700 text-sm font-bold mb-2">有効成分</label>
            <input type="text" name="active_ingredient" id="active_ingredient" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700">
        </div>

        <div class="mb-4">
            <label for="purchase_date" class="block text-gray-700 text-sm font-bold mb-2">購入日</label>
            <input type="date" name="purchase_date" id="purchase_date" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700">
        </div>

        <div class="mb-4">
            <label for="quantity" class="block text-gray-700 text-sm font-bold mb-2">数量</label>
            <input type="number" name="quantity" id="quantity" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" required>
        </div>

        <div class="mb-4">
            <label for="application_rate" class="block text-gray-700 text-sm font-bold mb-2">使用量</label>
            <input type="number" step="0.01" name="application_rate" id="application_rate" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700">
        </div>

        <div class="mb-4">
            <label for="lot_number" class="block text-gray-700 text-sm font-bold mb-2">ロット番号</label>
            <input type="text" name="lot_number" id="lot_number" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700">
        </div>

        <button type="submit" class="bg-green-500 text-black px-4 py-2 rounded">登録</button>
    </form>
</div>
@endsection
