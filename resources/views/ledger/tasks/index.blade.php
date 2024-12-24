@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-6">作業一覧</h1>

    <table class="table-auto w-full border">
        <thead>
            <tr class="bg-gray-200">
                <th class="px-4 py-2 border">ID</th>
                <th class="px-4 py-2 border">作物名</th>
                <th class="px-4 py-2 border">作業名</th>
                <th class="px-4 py-2 border">操作</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
                <tr>
                    <td class="px-4 py-2 border">{{ $task->id }}</td>
                    <td class="px-4 py-2 border">{{ $task->crop_name }}</td>
                    <td class="px-4 py-2 border">{{ $task->task_name }}</td>
                    <td class="px-4 py-2 border">
                        <a href="{{ route('ledger.tasks.edit', $task->id) }}" class="text-blue-500">編集</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-6">
        <a href="{{ route('ledger.tasks.create') }}" class="btn btn-success">
            新規登録
        </a>
    </div>
</div>
@endsection
