@extends('layouts.app')

@section('title','日報編集')
@section('content')
<div class="field-registration-container">
    <h1 class="field-registration-title">日報編集</h1>

    <form action="{{ route('record.report.update', $report->id) }}" method="POST" class="field-regration-form">
        @csrf
        @method('PATCH')

        <div class="form-group">
            <label for="date">日付</label>
            <input type="date" name="date" id="date" class="form-input" value="{{ old('date', $report->date) }}" required>
        </div>

        <div class="form-group">
            <label for="worker_id">作業員</label>
            <select name="worker_id" id="worker_id" class="form-input">
                <option value="" disabled {{ old('worker_id', $report->worker_id) ? '' : 'selected' }}>作業員を選択してください</option>
                @foreach ($workers as $worker)
                <option value="{{ $worker->id }}" {{ $worker->id == $report->worker_id ? 'selected' : '' }}>{{ $worker->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="start_time">作業開始時間</label>
            <input type="time" name="start_time" id="start_time" class="form-input" value="{{ old('start_time', $report->start_time) }}" required>
        </div>

        <div class="form-group">
            <label for="end_time">作業終了時間</label>
            <input type="time" name="end_time" id="end_time" class="form-input" value="{{ old('end_time', $report->end_time) }}">
        </div>

        <div class="form-group">
            <label for="task_id">作業内容</label>
            <select name="task_id" id="task_id" class="form-input">
                <option value="" disabled {{ $report->task_id ? '' :'selected' }}>作業内容を選択してください</option>
                @foreach ($tasks as $task)
                    <option value="{{ $task->id }}" {{ $task->id == $report->task_id ? 'selected' : '' }}>{{ $task->task_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="memo">メモ</label>
            <textarea name="memo" id="memo" class="form-input">{{ $report->memo }}</textarea>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn-submit">更新</button>
            <a href="{{ route('record.report.index') }}" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
                キャンセル
            </a>
        </div>
    </form>
</div>
@endsection