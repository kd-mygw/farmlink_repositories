@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-6">農薬使用記録</h1>

    {{-- タブ（圃場 / 種苗 / 床土） --}}
    <div class="mb-6 flex border-b" id="usageTabs">
        <button class="px-4 py-2 focus:outline-none border-b-2 border-transparent"
                data-target="fieldTab">圃場</button>
        <button class="px-4 py-2 focus:outline-none border-b-2 border-transparent"
                data-target="seedTab">種苗</button>
        <button class="px-4 py-2 focus:outline-none border-b-2 border-transparent"
                data-target="soilTab">床土</button>
    </div>

    {{-- 圃場タブ --}}
    <div id="fieldTab" class="tab-content hidden">
        <form action="{{ route('record.pesticide_usage.storeField') }}" method="POST"
              class="bg-white shadow rounded p-4 mb-4">
            @csrf
            <div class="mb-4">
                <label class="block text-sm font-bold mb-2">日付</label>
                <input type="date" name="date" class="border rounded w-full p-2" required>
            </div>
            
            <div class="mb-4">
                <label class="block text-sm font-bold mb-2">作付名</label>
                <select name="cropping_id" class="border rounded w-full p-2" required>
                    <option value="">選択してください</option>
                    @foreach($croppings as $crop)
                        <option value="{{ $crop->id }}">{{ $crop->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-bold mb-2">圃場名</label>
                <select name="field_id" class="border rounded w-full p-2" required>
                    <option value="">選択してください</option>
                    @foreach($fields as $field)
                        <option value="{{ $field->id }}">{{ $field->name }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="mb-4">
                <label class="block text-sm font-bold mb-2">農薬名</label>
                <select name="pesticide_id" class="border rounded w-full p-2" required>
                    <option value="">選択してください</option>
                    @foreach($pesticides as $p)
                        <option value="{{ $p->id }}">{{ $p->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4 flex space-x-4">
                <div class="w-1/2">
                    <label class="block text-sm font-bold mb-2">希釈倍数</label>
                    <input type="number" name="dilution" class="border rounded w-full p-2" required>
                </div>
                <div class="w-1/2">
                    <label class="block text-sm font-bold mb-2">使用量</label>
                    <input type="number" step="0.01" name="usage_amount" class="border rounded w-full p-2" required>
                </div>
            </div>

            <div class="mb-4 flex space-x-4">
                <div class="w-1/2">
                    <label class="block text-sm font-bold mb-2">作業員</label>
                    <select name="worker_id" class="border rounded w-full p-2">
                        <option value="">--選択なし--</option>
                        @foreach($workers as $w)
                            <option value="{{ $w->id }}">{{ $w->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="w-1/2">
                    <label class="block text-sm font-bold mb-2">使用機械</label>
                    <select name="equipment_id" class="border rounded w-full p-2">
                        <option value="">--選択なし--</option>
                        @foreach($equipments as $m)
                            <option value="{{ $m->id }}">{{ $m->equipment_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-bold mb-2">メモ</label>
                <textarea name="memo" rows="3" class="border rounded w-full p-2"></textarea>
            </div>

            <button type="submit" class="btn btn-success">
                登録
            </button>
        </form>
    </div>

    {{-- 種苗タブ --}}
    <div id="seedTab" class="tab-content hidden">
        <form action="{{ route('record.pesticide_usage.storeSeed') }}" method="POST" class="bg-white shadow rounded p-4 mb-4">
            @csrf
            <!-- ほぼ同じ構成で seed_id フィールドだけが違う -->
            <div class="mb-4">
                <label class="block text-sm font-bold mb-2">日付</label>
                <input type="date" name="date" class="border rounded w-full p-2" required>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-bold mb-2">作付名</label>
                <select name="cropping_id" class="border rounded w-full p-2" required>
                    <option value="">選択してください</option>
                    @foreach($croppings as $crop)
                        <option value="{{ $crop->id }}">{{ $crop->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-bold mb-2">種苗名</label>
                <select name="seed_id" class="border rounded w-full p-2" required>
                    <option value="">選択してください</option>
                    @foreach($seeds as $seed)
                        <option value="{{ $seed->id }}">{{ $seed->name }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="mb-4">
                <label class="block text-sm font-bold mb-2">農薬名</label>
                <select name="pesticide_id" class="border rounded w-full p-2" required>
                    <option value="">選択してください</option>
                    @foreach($pesticides as $p)
                        <option value="{{ $p->id }}">{{ $p->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- あとは希釈倍数、使用量、作業員、機械、メモなど同様 -->

            <button type="submit" class="btn btn-success">
                登録
            </button>
        </form>
    </div>

    {{-- 床土タブ --}}
    <div id="soilTab" class="tab-content hidden">
        <form action="{{ route('record.pesticide_usage.storeSoil') }}" method="POST" class="bg-white shadow rounded p-4 mb-4">
            @csrf
            <!-- 同様に soil_id フィールドを用意 -->

            <!-- フィールド構成は圃場・種苗とほぼ同じ -->
            <!-- 省略 -->

            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                登録
            </button>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const tabButtons = document.querySelectorAll('#usageTabs button');
    const tabContents = document.querySelectorAll('.tab-content');

    function showTabContent(targetId) {
        tabContents.forEach(content => {
            content.classList.add('hidden');
        });
        document.getElementById(targetId).classList.remove('hidden');

        // ボタンのスタイル切り替え
        tabButtons.forEach(btn => {
            if (btn.dataset.target === targetId) {
                btn.classList.add('border-blue-500');
                btn.classList.add('text-blue-500');
            } else {
                btn.classList.remove('border-blue-500');
                btn.classList.remove('text-blue-500');
            }
        });
    }

    tabButtons.forEach(btn => {
        btn.addEventListener('click', () => {
            const target = btn.dataset.target;
            showTabContent(target);
        });
    });

    // 初期表示は圃場タブを表示
    showTabContent('fieldTab');
});
</script>
@endpush
