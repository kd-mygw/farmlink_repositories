@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-6">作業員日報一覧</h1>
    <div class="mb-4">
        <a href="{{ route('record.report.create') }}" class="bg-green-500 hover:bg-green-700 text-black font-bold py-2 px-4 rounded">
            新規日報記録を追加
        </a>
    </div>

    @if($reports->isEmpty())
        <p class="text-gray-700">登録された日報記録がありません。</p>
    @else
        <table class="table-auto w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border px-4 py-2">日付</th>
                    <th class="border px-4 py-2">作業員</th>
                    <th class="border px-4 py-2">作業開始時間</th>
                    <th class="border px-4 py-2">作業終了時間</th>
                    <th class="border px-4 py-2">作業時間</th>
                    <th class="border px-4 py-2">作業内容</th>
                    <th class="border px-4 py-2">メモ</th>
                    <th class="border px-4 py-2">編集・終了時間入力</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reports as $report)
                    <tr>
                        <td class="border px-4 py-2">{{ $report->date }}</td>

                        <td class="border px-4 py-2">{{ optional($report->worker)->name ?? '未設定' }}</td>
                        <td class="border px-4 py-2">{{ $report->start_time}}</td>
                        <td class="border px-4 py-2">{{ $report->end_time}}</td>
                        <td class="border px-4 py-2">{{ $report->office_hours}}</td>
                        <td class="border px-4 py-2">{{ optional($report->task)->task_name ?? '未設定' }}</td>
                        <td class="border px-4 py-2">{{ $report->memo }}</td>
                        <td>
                            <a href="{{ route('record.report.edit', $report->id) }}" class="btn-primary">編集</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
