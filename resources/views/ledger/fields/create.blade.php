@extends('layouts.app')

@section('content')
<div class="field-registration-container">
    <h1 class="field-registration-title">圃場の登録</h1>

    <form action="{{ route('ledger.fields.store') }}" method="POST" class="field-registration-form">
        @csrf
        <div class="form-group">
            <label for="type">種別</label>
            <select name="type" id="type" class="form-select">
                <option value="露地">露地</option>
                <option value="施設">施設</option>
            </select>
        </div>

        <div class="form-group">
            <label for="name">名称</label>
            <input type="text" name="name" id="name" placeholder="例: 圃場A" class="form-input">
        </div>

        <div class="form-group">
            <label for="area">面積</label>
            <input type="number" step="0.01" name="area" id="area" placeholder="例: 100.5" class="form-input">
        </div>

        <div class="form-group">
            <label for="area_unit">単位</label>
            <select name="area_unit" id="area_unit" class="form-select">
                <option value="a">a</option>
                <option value="反">反</option>
                <option value="m²">m²</option>
            </select>
        </div>

        <div class="form-group">
            <label for="ownership">所有/借地</label>
            <select name="ownership" id="ownership" class="form-select">
                <option value="所有">所有</option>
                <option value="借地">借地</option>
            </select>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn-submit">登録</button>
        </div>
    </form>
</div>
@endsection

<style>
    /* コンテナスタイル */
    .field-registration-container {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
        background-color: #f9f9f9;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }
    
    /* タイトルスタイル */
    .field-registration-title {
        font-size: 1.8rem;
        color: #333;
        margin-bottom: 20px;
        text-align: center;
        font-weight: bold;
    }
    
    /* フォームスタイル */
    .field-registration-form {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }
    
    /* フォームグループスタイル */
    .form-group {
        display: flex;
        flex-direction: column;
        gap: 5px;
    }
    
    .form-group label {
        font-size: 1rem;
        font-weight: bold;
        color: #4a5568;
    }
    
    /* 入力フィールドスタイル */
    .form-input,
    .form-select {
        padding: 10px 15px;
        font-size: 1rem;
        border: 1px solid #e2e8f0;
        border-radius: 5px;
        background-color: #ffffff;
        color: #333;
        transition: border-color 0.3s ease, box-shadow 0.3s ease;
    }
    
    .form-input:focus,
    .form-select:focus {
        border-color: #3182ce;
        box-shadow: 0 0 4px rgba(49, 130, 206, 0.5);
        outline: none;
    }
    
    /* ボタンスタイル */
    .btn-submit {
        background-color: #38a169;
        color: #ffffff;
        font-size: 1rem;
        font-weight: bold;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }
    
    .btn-submit:hover {
        background-color: #2f855a;
    }
    
    /* レスポンシブデザイン */
    @media (max-width: 768px) {
        .field-registration-container {
            padding: 15px;
        }
    
        .field-registration-title {
            font-size: 1.5rem;
        }
    
        .form-input,
        .form-select {
            font-size: 0.9rem;
        }
    
        .btn-submit {
            font-size: 0.9rem;
            padding: 8px 16px;
        }
    }
</style>
    