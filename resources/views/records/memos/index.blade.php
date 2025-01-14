@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-6">メモ一覧</h1>
    <div class="mb-4">
        <a href="{{ route('record.memo.create') }}" class="bg-green-500 hover:bg-green-700 text-black font-bold py-2 px-4 rounded">
            新規メモを記録
        </a>
    </div>

    @if($memos->isEmpty())
        <p class="text-gray-700">記録されたメモがありません。</p>
    @else
        <table class="table-auto w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border px-4 py-2">日付</th>
                    <th class="border px-4 py-2">作業員</th>
                    <th class="border px-4 py-2">メモ</th>
                </tr>
            </thead>
            <tbody>
                @foreach($memos as $memo)
                    <tr>
                        <td class="border px-4 py-2">{{ $memo->date }}</td>
                        <td class="border px-4 py-2">{{ $memo->workers->name }}</td>
                        <td class="border px-4 py-2">{{ $memo->memo }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
