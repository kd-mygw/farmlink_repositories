<!-- resources/views/ledger/fields.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-6">圃場の登録</h1>

    <form action="{{ route('ledger.fields.store') }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf
        <div class="mb-4">
            <label for="type" class="block text-gray-700 text-sm font-bold mb-2">種別</label>
            <select name="type" id="type" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                <option value="露地">露地</option>
                <option value="施設">施設</option>
            </select>
        </div>

        <div class="mb-4">
            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">名称</label>
            <input type="text" name="name" id="name" placeholder="例: 圃場A" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="mb-4">
            <label for="area" class="block text-gray-700 text-sm font-bold mb-2">面積</label>
            <input type="number" step="0.01" name="area" id="area" placeholder="例: 100.5" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="mb-4">
            <label for="area_unit" class="block text-gray-700 text-sm font-bold mb-2">単位</label>
            <select name="area_unit" id="area_unit" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                <option value="a">a</option>
                <option value="反">反</option>
                <option value="m²">m²</option>
            </select>
        </div>

        <div class="mb-4">
            <label for="ownership" class="block text-gray-700 text-sm font-bold mb-2">所有/借地</label>
            <select name="ownership" id="ownership" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                <option value="所有">所有</option>
                <option value="借地">借地</option>
            </select>
        </div>

        <div class="flex items-center justify-between">
            <button type="submit" class="bg-green-500 hover:bg-green-700 text-black font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                登録
            </button>
        </div>
    </form>
</div>
@endsection
