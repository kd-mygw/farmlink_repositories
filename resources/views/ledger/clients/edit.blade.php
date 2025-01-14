@extends('layouts.app')

@section('content')
<div class="field-registration-container">
    <h1 class="field-registration-title">取引先の編集</h1>

    <form action="{{ route('ledger.clients.update', $client->id) }}" method="POST" class="field-registration-form">
        @csrf
        @method('PATCH') <!-- 更新処理用に PATCH メソッドを指定 -->

        <div class="form-group">
            <label for="official_name">正式名称</label>
            <input type="text" name="official_name" id="official_name" value="{{ $client->official_name }}" placeholder="例: 株式会社サンプル" class="form-input" required>
        </div>

        <div class="form-group">
            <label for="kana">よみがな</label>
            <input type="text" name="kana" id="kana" value="{{ $client->kana }}" placeholder="例: かぶしきがいしゃさんぷる" class="form-input" required>
        </div>

        <div class="form-group">
            <label for="app_registered_name">アプリ内登録名</label>
            <input type="text" name="app_registered_name" id="app_registered_name" value="{{ $client->app_registered_name }}" placeholder="例: サンプル取引先" class="form-input" required>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn-submit">
                更新
            </button>
            <a href="{{ route('ledger.clients.index') }}" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
                キャンセル
            </a>
        </div>
    </form>
</div>
@endsection
