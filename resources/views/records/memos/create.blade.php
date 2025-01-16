@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-6">メモの新規登録</h1>

    <form action="{{ route('record.memo.store') }}" method="POST" enctype="multipart/form-data" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf
        <div class="mb-4">
            <label for="date" class="block text-gray-700 text-sm font-bold mb-2">日付</label>
            <input type="date" name="date" id="date" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        </div>

        {{-- 作業員 --}}
        <div class="mb-4">
          <label for="worker_id" class="block text-gray-700 text-sm font-bold mb-2">作業員</label>
          <select name="worker_id" id="worker_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            <option value="" disabled selected>作業員を選択してください</option>
            @foreach ($workers as $worker)
              <option value="{{ $worker->id }}">{{ $worker->name }}</option>
            @endforeach
          </select>
        </div>

        {{-- メモ --}}
        <div class="mb-4">
            <label for="memo" class="block text-gray-700 text-sm font-bold mb-2">メモ</label>
            <textarea name="memo" id="memo" rows="4" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
        </div>

        <div class="flex items-center justify-between">
            <button type="submit" class="bg-green-500 hover:bg-green-700 text-black font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                登録
            </button>
        </div>
    </form>
</div>
@endsection