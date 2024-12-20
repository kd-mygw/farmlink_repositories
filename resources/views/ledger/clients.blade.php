@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-6">取引先の登録</h1>

    <form action="{{ route('clients.store') }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf
        <div class="mb-4">
            <label for="official_name" class="block text-gray-700 text-sm font-bold mb-2">正式名称</label>
            <input type="text" name="official_name" id="official_name" placeholder="例: 株式会社サンプル" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="mb-4">
            <label for="kana" class="block text-gray-700 text-sm font-bold mb-2">よみがな</label>
            <input type="text" name="kana" id="kana" placeholder="例: かぶしきがいしゃさんぷる" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="mb-4">
            <label for="app_registered_name" class="block text-gray-700 text-sm font-bold mb-2">アプリ内登録名</label>
            <input type="text" name="app_registered_name" id="app_registered_name" placeholder="例: サンプル取引先" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="flex items-center justify-between">
            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                登録
            </button>
        </div>
    </form>
</div>
@endsection
