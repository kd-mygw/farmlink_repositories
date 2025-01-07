@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-6">作業登録</h1>

    <form action="{{ route('ledger.tasks.store') }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf
        <div class="mb-4">
            <label for="crop_name" class="block text-gray-700 text-sm font-bold mb-2">作物名</label>
            <select name="crop_name" id="crop_name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                <option value="" disabled selected>作物を選択してください</option>
                @foreach ($items as $item)
                    <option value="{{ $item->crop_name }}">{{ $item->crop_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="task_name" class="block text-gray-700 text-sm font-bold mb-2">作業名</label>
            <input type="text" name="task_name" id="task_name" placeholder="例: 播種" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        </div>

        <div class="flex items-center justify-between">
            <button type="submit" class="btn btn-success">
                登録
            </button>
        </div>
    </form>
</div>
@endsection
