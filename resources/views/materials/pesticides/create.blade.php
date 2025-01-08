@extends('layouts.app')

@section('content')
<div class="field-registration-container">
    <h1 class="field-registration-title">農薬登録</h1>

    {{-- バリデーションエラーの表示 --}}
    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>・{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('materials.pesticides.store') }}" method="POST" class="field-registration-form">
        @csrf

        {{-- 農薬名 --}}
        <div class="form-group">
            <label for="pesticideSearch">農薬名</label>
            <input type="text" 
                   name="name" 
                   id="pesticideSearch" 
                   class="form-input" 
                   value="{{ old('name') }}"
                   required>
        </div>

        {{-- 有効成分 --}}
        <div class="form-group">
            <label for="active_ingredient">有効成分</label>
            <input type="text" 
                   name="active_ingredient" 
                   id="active_ingredient"
                   class="form-input"
                   value="{{ old('active_ingredient') }}">
        </div>

        {{-- 購入日 --}}
        <div class="form-group">
            <label for="purchase_date">購入日</label>
            <input type="date" 
                   name="purchase_date" 
                   id="purchase_date"
                   class="form-input"
                   value="{{ old('purchase_date') }}">
        </div>

        {{-- 数量 --}}
        <div class="form-group">
            <label for="quantity">数量</label>
            <input type="number" 
                   name="quantity" 
                   id="quantity"
                   class="form-input" 
                   value="{{ old('quantity') }}"
                   required>
        </div>

        {{-- 使用量 --}}
        <div class="form-group">
            <label for="application_rate">使用量</label>
            <input type="number" 
                   step="0.01"
                   name="application_rate" 
                   id="application_rate"
                   class="form-input"
                   value="{{ old('application_rate') }}">
        </div>

        {{-- ロット番号 --}}
        <div class="form-group">
            <label for="lot_number">ロット番号</label>
            <input type="text" 
                   name="lot_number" 
                   id="lot_number"
                   class="form-input"
                   value="{{ old('lot_number') }}">
        </div>

        <div class="form-actions">
            <button type="submit"
                class="btn-submit">
            登録
        </button>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
    $('#pesticideSearch').autocomplete({
        source: function(request, response) {
            $.ajax({
                url: '/pesticides/search-by-wagri',
                data: { q: request.term },
                success: function(data) {
                    // data = [ { id, text }, ... ] を
                    // jQuery UI Autocomplete形式 { label, value } に変換
                    let results = data.map(item => {
                        return {
                            label: item.text,
                            value: item.text
                        };
                    });
                    response(results);
                }
            });
        },
        minLength: 2
    });
});
</script>
@endpush
