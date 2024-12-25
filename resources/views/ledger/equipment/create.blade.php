@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-6">機械設備の登録</h1>

    <form action="{{ route('ledger.equipment.store') }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf
        <div class="mb-4">
            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">機械設備名</label>
            <input type="text" name="name" id="name" placeholder="例: トラクター" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="mb-4">
            <label for="model" class="block text-gray-700 text-sm font-bold mb-2">型番形式</label>
            <input type="text" name="model" id="model" placeholder="例: TX-500" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="mb-4">
            <label for="manufacturer" class="block text-gray-700 text-sm font-bold mb-2">メーカー</label>
            <input type="text" name="manufacturer" id="manufacturer" placeholder="例: 株式会社ヤマト" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="mb-4">
            <label for="fuel_type" class="block text-gray-700 text-sm font-bold mb-2">燃料の種類</label>
            <input type="text" name="fuel_type" id="fuel_type" placeholder="例: 軽油" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="mb-4">
            <label for="acquisition_date" class="block text-gray-700 text-sm font-bold mb-2">取得日</label>
            <input type="date" name="acquisition_date" id="acquisition_date" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="mb-4">
            <label for="unit_price" class="block text-gray-700 text-sm font-bold mb-2">取引単価</label>
            <input type="number" step="0.01" name="unit_price" id="unit_price" placeholder="例: 500000.00" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="flex items-center justify-between">
            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                登録
            </button>
        </div>
    </form>
</div>
@endsection
