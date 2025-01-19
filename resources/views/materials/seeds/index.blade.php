@extends('layouts.app')

@section('title','種苗一覧')
@section('content')
<div class="materials-container">
    <div class="title-container">
        <h1 class="materials-title">種苗一覧</h1>
    </div>
    <div class="materials-table-container">
        <table class="materials-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>品目</th>
                    <th>購入日/棚卸日</th>
                    <th>内容量</th>
                    <th>数量</th>
                    <th>有効期限</th>
                    <th>ロット番号</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($seeds as $seed)
                <tr>
                    <td>{{ $seed->id }}</td>
                    <td>{{ $seed->item->crop_name }}</td>
                    <td>{{ $seed->purchase_date ?? 'なし'}}</td>
                    <td>{{ $seed->content_volume ?? 'なし'}}</td>
                    <td>{{ $seed->quantity }}</td>
                    <td>{{ $seed->expiry_date ?? 'なし' }}</td>
                    <td>{{ $seed->lot_number ?? 'なし' }}</td>
                    <td>
                        <a href="{{ route('materials.seeds.edit', $seed->id) }}" class="btn-primary">編集</a>
                    </td>
                </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-4">登録された種苗がありません。</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="materials-actions">
        <a href="{{ route('materials.seeds.create') }}" class="btn-success">
            新規登録
        </a>
    </div>

    
</div>
@endsection
