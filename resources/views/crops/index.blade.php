@extends('layouts.app')

@section('content')
<div class="ledger-container">
        <div class="title-container">
            <h1 class="ledger-title">商品一覧</h1>
        </div>

        <!-- 検索バー -->
        <div class="search-bar">
            <form action="{{ route('crops.index') }}" method="GET">
                <input type="text" id="search-input" name="search" placeholder="検索キーワードを入力" value="{{ request('search') }}">
            </form>
        </div>

        <!-- 成功メッセージ -->
        @if (session('success'))
            <div class="crop-management-success-message">
                {{ session('success') }}
            </div>
        @endif

        <!-- テーブル -->
        <div class="ledger-table-container">
            <table class="ledger-table">
                <thead>
                    <tr>
                        <th>商品名</th>
                        <th>品種名</th>
                        <th>栽培方法</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($crops as $crop)
                        <tr>
                            <td class="product-name">{{ $crop->product_name }}</td>
                            <td>{{ $crop->name }}</td>
                            <td>{{ $crop->cultivation_method }}</td>
                            <td class="crop-management-action-buttons">
                                <a href="{{ route('crops.edit', $crop->id) }}" class="btn btn-outline-success">編集</a>
                                <form action="{{ route('crops.destroy', $crop->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger" onclick="return confirm('本当に削除しますか？')">削除</button>
                                </form>
                                @if ($crop->qr_code_path)
                                    <a href="{{ asset('storage/' . $crop->qr_code_path) }}" target="_blank" class="btn btn-outline-secondary">QRコードを表示</a>
                                @else
                                    <form action="{{ route('qr.store', ['crop' => $crop->id]) }}" method="POST" style="display:inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-outline-primary">QRコードを生成</button>
                                    </form>
                                @endif
                                <!-- テンプレート選択ボタン -->
                                <a href="{{ route('crops.templates.edit', $crop->id) }}" class="btn btn-outline-secondary">テンプレート選択</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="ledger-actions">
            <a href="{{ route('crops.create') }}" class="btn-success">商品登録</a>
        </div>

        <!-- ページネーション -->
        <div class="pagination-links">
            {{ $crops->links() }}
        </div>
</div>
@endsection
