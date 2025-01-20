@extends('layouts.app')

@section('title','圃場への農薬使用 登録')
@section('content')
<div class="container mx-auto px-4">

    <h1 class="text-2xl font-bold mb-6">圃場への農薬使用 登録</h1>

    {{-- バリデーションエラーの表示 --}}
    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-4 mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>・{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('record.pesticide_usage.storeField') }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf

        {{-- 日付 --}}
        <div class="mb-4">
            <label for="date" class="block text-gray-700 text-sm font-bold mb-2">日付</label>
            <input type="date" name="date" id="date"
                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700"
                   value="{{ old('date') }}"
                   required>
        </div>

        {{-- 作付 (cropping_id) --}}
        <div class="mb-4">
            <label for="cropping_id" class="block text-gray-700 text-sm font-bold mb-2">作付名</label>
            <select name="cropping_id" id="cropping_id"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700"
                    required>
                <option value="">選択してください</option>
                @foreach($croppings as $crop)
                    <option value="{{ $crop->id }}"
                        {{ old('cropping_id') == $crop->id ? 'selected' : '' }}>
                        {{ $crop->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- 圃場 (field_id) --}}
        <div class="mb-4">
            <label for="field_id" class="block text-gray-700 text-sm font-bold mb-2">圃場名</label>
            <select name="field_id" id="field_id"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700"
                    required>
                <option value="">選択してください</option>
                @foreach($fields as $field)
                    <option value="{{ $field->id }}"
                        {{ old('field_id') == $field->id ? 'selected' : '' }}>
                        {{ $field->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- 農薬 (pesticide_id) --}}
        <div class="mb-4">
            <label for="pesticide_id" class="block text-gray-700 text-sm font-bold mb-2">農薬名</label>
            <select name="pesticide_id" id="pesticide_id"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700"
                    required>
                <option value="">選択してください</option>
                @foreach($pesticides as $pesti)
                    <option value="{{ $pesti->id }}"
                        {{ old('pesticide_id') == $pesti->id ? 'selected' : '' }}>
                        {{ $pesti->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- 希釈倍数 (dilution) --}}
        <div class="mb-4">
            <label for="dilution" class="block text-gray-700 text-sm font-bold mb-2">希釈倍数</label>
            <input type="number" step="0.1" name="dilution" id="dilution"
                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700"
                   value="{{ old('dilution') }}"
                   required>
        </div>

        {{-- 使用量 (usage_amount) --}}
        <div class="mb-4">
            <label for="usage_amount" class="block text-gray-700 text-sm font-bold mb-2">使用量</label>
            <input type="number" step="0.01" name="usage_amount" id="usage_amount"
                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700"
                   value="{{ old('usage_amount') }}"
                   required>
        </div>

        {{-- 作業員 (worker_id) --}}
        <div class="mb-4">
            <label for="worker_id" class="block text-gray-700 text-sm font-bold mb-2">作業員</label>
            <select name="worker_id" id="worker_id"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700">
                <option value="">-- 選択しない --</option>
                @foreach($workers as $worker)
                    <option value="{{ $worker->id }}"
                        {{ old('worker_id') == $worker->id ? 'selected' : '' }}>
                        {{ $worker->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- 使用機械 (equipment_id) --}}
        <div class="mb-4">
            <label for="equipment_id" class="block text-gray-700 text-sm font-bold mb-2">使用機械</label>
            <select name="equipment_id" id="equipment_id"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700">
                <option value="">-- 選択しない --</option>
                @foreach($equipments as $equipment)
                    <option value="{{ $equipment->id }}"
                        {{ old('equipment_id') == $equipment->id ? 'selected' : '' }}>
                        {{ $equipment->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- メモ (memo) --}}
        <div class="mb-4">
            <label for="memo" class="block text-gray-700 text-sm font-bold mb-2">メモ</label>
            <textarea name="memo" id="memo" rows="4"
                      class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700">{{ old('memo') }}</textarea>
        </div>

        <div class="flex justify-end">
            <button type="submit"
                    class="btn btn-secondary">
                登録
            </button>
        </div>
    </form>

</div>
@endsection
