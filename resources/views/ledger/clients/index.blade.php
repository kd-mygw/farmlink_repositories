@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-6">取引先一覧</h1>

    <table class="table-auto w-full border">
        <thead>
            <tr class="bg-gray-200">
                <th class="px-4 py-2 border">ID</th>
                <th class="px-4 py-2 border">正式名称</th>
                <th class="px-4 py-2 border">よみがな</th>
                <th class="px-4 py-2 border">アプリ内登録名</th>
                <th class="px-4 py-2 border">操作</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clients as $client)
                <tr>
                    <td class="px-4 py-2 border">{{ $client->id }}</td>
                    <td class="px-4 py-2 border">{{ $client->official_name }}</td>
                    <td class="px-4 py-2 border">{{ $client->kana }}</td>
                    <td class="px-4 py-2 border">{{ $client->app_registered_name }}</td>
                    <td class="px-4 py-2 border">
                        <a href="{{ route('ledger.clients.edit', $client->id) }}" class="text-blue-500">編集</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-6">
        <a href="{{ route('ledger.clients.create') }}" class="btn btn-success">
            新規登録
        </a>
    </div>
</div>
@endsection
