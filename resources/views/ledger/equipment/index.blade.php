@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-6">機械設備一覧</h1>

    <table class="table-auto w-full border">
        <thead>
            <tr class="bg-gray-200">
                <th class="px-4 py-2 border">ID</th>
                <th class="px-4 py-2 border">機械設備名</th>
                <th class="px-4 py-2 border">型番形式</th>
                <th class="px-4 py-2 border">メーカー</th>
                <th class="px-4 py-2 border">燃料種別</th>
                <th class="px-4 py-2 border">取得日</th>
                <th class="px-4 py-2 border">取得価格</th>
                <th class="px-4 py-2 border">操作</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($equipment as $item)
                <tr>
                    <td class="px-4 py-2 border">{{ $item->id }}</td>
                    <td class="px-4 py-2 border">{{ $item->name }}</td>
                    <td class="px-4 py-2 border">{{ $item->model }}</td>
                    <td class="px-4 py-2 border">{{ $item->manufacturer }}</td>
                    <td class="px-4 py-2 border">{{ $item->fuel_type }}</td>
                    <td class="px-4 py-2 border">{{ $item->acquisition_date }}</td>
                    <td class="px-4 py-2 border">{{ $item->unit_price }}</td>
                    <td class="px-4 py-2 border">
                        <a href="{{ route('ledger.equipment.edit', $item->id) }}" class="text-blue-500">編集</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-6">
        <a href="{{ route('ledger.equipment.create') }}" class="btn btn-success">
            新規登録
        </a>
    </div>
</div>
@endsection
