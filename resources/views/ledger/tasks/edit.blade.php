@extends('layouts.app')

@section('content')
<div class="field-registration-container">
    <h1 class="field-registration-title">作業編集</h1>

    <form action="{{ route('ledger.tasks.update', $task->id) }}" method="POST" class="field-registration-form">
        @csrf
        @method('PATCH')

        <div class="form-group">
            <label for="crop_name">作物名</label>
            <select name="crop_name" id="crop_name" class="form-select"required>
                <option value="" disabled>作物を選択してください</option>
                @foreach ($items as $item)
                    <option value="{{ $item->crop_name }}" {{ $item->crop_name == $task->crop_name ? 'selected' : '' }}>
                        {{ $item->crop_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="task_name">作業名</label>
            <input type="text" name="task_name" id="task_name" value="{{ $task->task_name }}" class="form-input" required>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn-submit">
                更新
            </button>
            <a href="{{ route('ledger.tasks.index') }}" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
                キャンセル
            </a>
        </div>
    </form>
</div>
@endsection
