@extends('layouts.app')

@section('content')
<div class="container">
    <h1>作業員一覧</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>名前</th>
                <th>フリガナ</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($workers as $worker)
                <tr>
                    <td>{{ $worker->id }}</td>
                    <td>{{ $worker->name }}</td>
                    <td>{{ $worker->kana }}</td>
                    <td>
                        <a href="{{ route('ledger.workers.edit', $worker->id) }}" class="btn btn-primary">編集</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('ledger.workers.create') }}" class="btn btn-success">新規登録</a>
</div>
@endsection
