@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-6">作付を作成</h1>

    <form action="{{ route('cropping.store') }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf
        <div class="mb-4">
            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">作付名</label>
            <input type="text" name="name" id="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700">
        </div>

        <!-- 品目選択ボタン -->
        <div class="mb-4">
            <label for="item" class="block text-gray-700 text-sm font-bold mb-2">品目名</label>
            <select name="item_id" id="item" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700">
                @foreach ($items as $item)
                    <option value="{{ $item->id }}">{{ $item->crop_name }}({{ $item->variety_name}})</option>
                @endforeach
            </select>
        </div>
                
        <div class="mb-4">
            <label for="field" class="block text-gray-700 text-sm font-bold mb-2">作付圃場</label>
            <select name="field_id" id="field" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700">
                @foreach ($fields as $field)
                    <option value="{{ $field->id }}">{{ $field->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="planting_date" class="block text-gray-700 text-sm font-bold mb-2">播種または定植日</label>
            <input type="date" name="planting_date" id="planting_date" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700">
        </div>

        <!-- 栽培方法の選択 -->
        <div class="mb-4">
            <label for="cultivation_method" class="block text-gray-700 text-sm font-bold mb-2">栽培方法</label>
            <select name="cultivation_method" id="cultivation_method" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" required>
                <option value="有機栽培">有機栽培</option>
                <option value="特別栽培">特別栽培</option>
                <option value="慣行栽培">慣行栽培</option>
                <option value="自然栽培">自然栽培</option>
            </select>
        </div>

        <div class="mb-4">
            <label for="expected_yield" class="block text-gray-700 text-sm font-bold mb-2">収穫見込量</label>
            <input type="number" name="expected_yield" id="expected_yield" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700">
            <select name="yield_unit" id="yield_unit" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700">
                <option value="kg">kg</option>
                <option value="t">t</option>
            </select>
        </div>

        <div class="mb-4">
            <label for="color" class="block text-gray-700 text-sm font-bold mb-2">カラー</label>
            <input type="color" name="color" id="color" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700">
        </div>

        <div class="flex items-center justify-between">
            <button type="submit" class="bg-green-500 hover:bg-green-700 text-black font-bold py-2 px-4 rounded">
                登録
            </button>
        </div>
    </form>
</div>
@endsection
