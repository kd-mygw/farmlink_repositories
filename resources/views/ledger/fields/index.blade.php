@extends('layouts.app')

@section('content')
<div class="container">
    <h1>圃場一覧</h1>
    <table class="table">
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
                <td>{{ $field->area_unit}}</td>
                <td>{{ $field->ownership }}</td>
                <td>
                    <a href="{{ route('ledger.fields.edit', $field->id) }}" class="btn btn-primary">編集</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('ledger.fields.create') }}" class="btn btn-success">新規圃場登録</a>
</div>
@endsection
