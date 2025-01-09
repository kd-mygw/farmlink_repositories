@extends('layouts.app')

@section('content')
<div class="materials-container">
    <div class="title-container">
        <h1 class="materials-title">床土一覧</h1>
    </div>
    <div class="materials-table-container">
        <table class="materials-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>品名</th>
                    <th>購入日/棚卸日</th>
                    <th>内容量</th>
                    <th>数量</th>
                    <th>購入金額</th>
                    <th>購入先</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($soils as $soil)
                    <tr>
                        <td>{{ $soil->id }}</td>
                        <td>{{ $soil->name }}</td>
                        <td>{{ $soil->purchased_date ?? 'なし' }}</td>
                        <td>{{ $soil->content_volume ?? 'なし' }} {{ $soil->unit ?? '' }}</td>
                        <td>{{ $soil->quantity }}</td>
                        <td>{{ $soil->purchase_price ? '¥' . number_format($soil->purchase_price, 2) : 'なし' }}</td>
                        <td>{{ $soil->supplier ?? 'なし' }}</td>
                        <td>
                            <a href="{{ route('materials.soils.edit', $soil->id) }}" class="btn-primary">編集</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-4">登録された床土がありません。</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="materials-actions">
        <a href="{{ route('materials.soils.create') }}" class="btn-success">新規登録</a>
    </div>

</div>
@endsection
