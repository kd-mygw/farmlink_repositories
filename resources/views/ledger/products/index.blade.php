@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-6">商品一覧</h1>

    <table class="table-auto w-full border">
        <thead>
            <tr class="bg-gray-200">
                <th class="px-4 py-2 border">ID</th>
                <th class="px-4 py-2 border">品目</th>
                <th class="px-4 py-2 border">包装容器</th>
                <th class="px-4 py-2 border">入数</th>
                <th class="px-4 py-2 border">出荷単位重量</th>
                <th class="px-4 py-2 border">単価</th>
                <th class="px-4 py-2 border">操作</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td class="px-4 py-2 border">{{ $product->id }}</td>
                    <td class="px-4 py-2 border">{{ $product->item->crop_name }}</td>
                    <td class="px-4 py-2 border">{{ $product->packaging }}</td>
                    <td class="px-4 py-2 border">{{ $product->quantity }}</td>
                    <td class="px-4 py-2 border">{{ $product->unit_weight }} {{ $product->unit }}</td>
                    <td class="px-4 py-2 border">{{ $product->price }}</td>
                    <td class="px-4 py-2 border">
                        <a href="{{ route('ledger.products.edit', $product->id) }}" class="text-blue-500">編集</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-6">
        <a href="{{ route('ledger.products.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
            新規登録
        </a>
    </div>
</div>
@endsection
