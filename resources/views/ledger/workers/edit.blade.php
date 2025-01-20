@extends('layouts.app')

@section('title','作業員編集')
@section('content')
<div class="field-registration-container">
    <h1 class="field-registration-title">作業員編集</h1>
    <form action="{{ route('ledger.workers.update', $worker->id) }}" method="POST" class="field-registration-form">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="name">名前</label>
            <input type="text" name="name" id="name" class="form-input" value="{{ $worker->name }}" required>
        </div>
        <div class="form-group">
            <label for="kana">フリガナ</label>
            <input type="text" name="kana" id="kana" class="form-input" value="{{ $worker->kana }}" required>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn-submit">更新</button>
            <a href="{{ route('ledger.workers.index')}}" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
                キャンセル
            </a>
        </div>
        
    </form>
</div>
@endsection
