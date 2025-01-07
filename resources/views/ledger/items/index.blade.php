@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-6">品目一覧</h1>

    <table class="table-auto w-full border">
        <thead>
            <tr class="bg-gray-200">
                <th class="px-4 py-2 border">ID</th>
                <th class="px-4 py-2 border">作物名</th>
                <th class="px-4 py-2 border">品種名</th>
                <th class="px-4 py-2 border">操作</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $item)
                <tr>
                    <td class="px-4 py-2 border">{{ $item->id }}</td>
                    <td class="px-4 py-2 border">{{ $item->crop_name }}</td>
                    <td class="px-4 py-2 border">{{ $item->variety_name }}</td>
                    <td class="px-4 py-2 border">
                        <a href="{{ route('ledger.items.edit', $item->id) }}" class="text-blue-500">編集</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-6">
        <a href="{{ route('ledger.items.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
            新規登録
        </a>
    </div>
</div>
@endsection
