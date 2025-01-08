@extends('layouts.app')

@section('content')
<div class="materials-container">
    <div class="title-container">
        <h1 class="materials-title">農薬一覧</h1>
    </div>
    <div class="materials-table-container">
        <table class="materials-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>農薬名</th>
                    <th>有効成分</th>
                    <th>購入日</th>
                    <th>数量</th>
                    <th>使用量</th>
                    <th>ロット番号</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pesticides as $pesticide)
                    <tr>
                        <td>{{ $pesticide->id }}</td>
                        <td>{{ $pesticide->name }}</td>
                        <td>{{ $pesticide->active_ingredient ?? 'なし' }}</td>
                        <td>{{ $pesticide->purchase_date ?? 'なし' }}</td>
                        <td>{{ $pesticide->quantity }}</td>
                        <td>{{ $pesticide->application_rate ?? 'なし' }}</td>
                        <td>{{ $pesticide->lot_number ?? 'なし' }}</td>
                        <td>
                            <a href="{{ route('materials.pesticides.edit', $pesticide->id) }}" class="btn-primary">編集</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-4">登録された農薬がありません。</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="materials-actions">
        <a href="{{ route('materials.pesticides.create') }}" class="btn-success">新規登録</a>
    </div>
</div>
@endsection
