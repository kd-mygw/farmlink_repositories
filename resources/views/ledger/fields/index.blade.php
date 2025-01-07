@extends('layouts.app')

@section('content')
<div class="ledger-container">
    <div class="title-container">
        <img src="{{ asset('images/ボードアイコン.png') }}" alt="Icon" class="title-icon">
        <h1 class="ledger-title">圃場一覧</h1>
    </div>
    <div class="ledger-table-container">
        <table class="ledger-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>圃場名</th>
                    <th>面積</th>
                    <th>単位</th>
                    <th>所有/借地</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($fields as $field)
                <tr>
                    <td>{{ $field->id }}</td>
                    <td>{{ $field->name }}</td>
                    <td>{{ $field->area }}</td>
                    <td>{{ $field->area_unit }}</td>
                    <td>{{ $field->ownership }}</td>
                    <td>
                        <a href="{{ route('ledger.fields.edit', $field->id) }}" class="btn-primary">編集</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="ledger-actions">
        <a href="{{ route('ledger.fields.create') }}" class="btn-success">新規圃場登録</a>
    </div>
</div>
@endsection

<style>
    /* 全体のコンテナ */
    .ledger-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
        background: #f7fafc;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    /* タイトルコンテナ */
    .title-container {
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 20px;
    }

    /* アイコンのデザイン */
    .title-icon {
        width: 32px;
        height: 32px;
        margin-right: 10px;
    }

    /* タイトルのデザイン */
    .ledger-title {
        font-size: 2rem;
        font-weight: bold;
        text-align: center;
        color: #2d3748;
        text-transform: uppercase;
        letter-spacing: 0.1rem;
    }

    /* テーブルコンテナ */
    .ledger-table-container {
        overflow-x: auto; /* 横スクロール対応 */
    }

    /* テーブルのデザイン */
    .ledger-table {
        width: 100%;
        border-collapse: collapse;
        background: #ffffff;
        border-radius: 8px;
        overflow: hidden;
    }

    .ledger-table th {
        background: #4a5568;
        color: #f7fafc;
        padding: 12px;
        text-align: left;
        font-weight: bold;
        text-transform: uppercase;
    }

    .ledger-table td {
        padding: 12px;
        color: #4a5568;
        border-bottom: 1px solid #e2e8f0;
    }

    .ledger-table tbody tr:hover {
        background: #edf2f7;
    }

    /* ボタンスタイル */
    .btn-primary, .btn-success {
        display: inline-block;
        padding: 10px 20px;
        font-size: 0.9rem;
        font-weight: bold;
        text-align: center;
        text-decoration: none;
        border-radius: 5px;
        transition: all 0.3s ease;
    }

    .btn-primary {
        background: #3182ce;
        color: #ffffff;
    }

    .btn-primary:hover {
        background: #2b6cb0;
    }

    .btn-success {
        background: #38a169;
        color: #ffffff;
    }

    .btn-success:hover {
        background: #2f855a;
    }

    /* ボタン配置のデザイン */
    .ledger-actions {
        text-align: right;
        margin-top: 20px;
    }

    /* レスポンシブ対応 */
    @media (max-width: 768px) {
        .ledger-title {
            font-size: 1.5rem;
        }

        .ledger-table th, .ledger-table td {
            padding: 8px;
            font-size: 0.9rem;
        }

        .btn-primary, .btn-success {
            padding: 8px 12px;
            font-size: 0.8rem;
        }
    }
</style>
