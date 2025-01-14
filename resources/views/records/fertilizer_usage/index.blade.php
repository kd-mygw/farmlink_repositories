@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">

    <h1 class="text-2xl font-bold mb-6">肥料使用記録一覧</h1>

    {{-- タブボタン --}}
    <div class="mb-4 flex border-b" id="usageTabs">
        <button
            type="button"
            class="px-4 py-2 focus:outline-none border-b-2 border-transparent"
            data-target="fieldList"
        >
            圃場
        </button>
        <button
            type="button"
            class="px-4 py-2 focus:outline-none border-b-2 border-transparent"
            data-target="seedList"
        >
            種苗
        </button>
        <button
            type="button"
            class="px-4 py-2 focus:outline-none border-b-2 border-transparent"
            data-target="soilList"
        >
            床土
        </button>
    </div>

    {{-- 新規登録ボタン (タブごとにリンクを切り替える) --}}
    <div class="mb-6 text-right">
        <a
            id="createButton"
            href="{{ route('record.fertilizer_usage.createField') }}"
            class="btn btn-success"
        >
            新規登録
        </a>
    </div>

    {{-- 圃場一覧 --}}
    <div id="fieldList" class="tab-content hidden transition-all duration-300 opacity-0">
        <table class="table-auto w-full border-collapse border mb-6">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border px-4 py-2">日付</th>
                    <th class="border px-4 py-2">作付</th>
                    <th class="border px-4 py-2">圃場</th>
                    <th class="border px-4 py-2">肥料</th>
                    <th class="border px-4 py-2">使用量</th>
                    <th class="border px-4 py-2">単位</th>
                    <th class="border px-4 py-2">作業員</th>
                    <th class="border px-4 py-2">使用機械</th>
                </tr>
            </thead>
            <tbody>
                @forelse($fieldUsages as $usage)
                <tr>
                    <td class="border px-4 py-2">{{ $usage->date }}</td>
                    <td class="border px-4 py-2">{{ optional($usage->cropping)->name }}</td>
                    <td class="border px-4 py-2">{{ optional($usage->field)->name }}</td>
                    <td class="border px-4 py-2">{{ optional($usage->fertilizer)->name }}</td>
                    <td class="border px-4 py-2 text-right">{{ $usage->usage_amount }}</td>
                    <td class="border px-4 py-2 text-right">{{ $usage->unit }}</td>
                    <td class="border px-4 py-2">{{ optional($usage->worker)->name }}</td>
                    <td class="border px-4 py-2">{{ optional($usage->equipment)->name }}</td>
                </tr>
                @empty
                  <tr>
                    <td colspan="8">
                      データがありません
                    </td>
                  </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- 種苗一覧 --}}
    <div id="seedList" class="tab-content hidden transition-all duration-300 opacity-0">
        <table class="table-auto w-full border-collapse border mb-6">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border px-4 py-2">日付</th>
                    <th class="border px-4 py-2">作付</th>
                    <th class="border px-4 py-2">種苗</th>
                    <th class="border px-4 py-2">肥料</th>
                    <th class="border px-4 py-2">使用量</th>
                    <th class="border px-4 py-2">単位</th>
                    <th class="border px-4 py-2">作業員</th>
                    <th class="border px-4 py-2">使用機械</th>
                </tr>
            </thead>
            <tbody>
                @forelse($seedUsages as $usage)
                <tr>
                    <td class="border px-4 py-2">{{ $usage->date }}</td>
                    <td class="border px-4 py-2">{{ optional($usage->cropping)->name }}</td>
                    <td class="border px-4 py-2">
                        @php
                            $seedItem = optional($usage->seed)->item;
                        @endphp
                        {{ optional($seedItem)->crop_name }}
                        @if(optional($seedItem)->variety_name)
                            ({{ optional($seedItem)->variety_name }})
                        @endif
                    </td>
                    <td class="border px-4 py-2">{{ optional($usage->fertilizer)->name }}</td>
                    <td class="border px-4 py-2 text-right">{{ $usage->usage_amount }}</td>
                    <td class="border px-4 py-2 text-right">{{ $usage->unit }}</td>
                    <td class="border px-4 py-2">{{ optional($usage->worker)->name }}</td>
                    <td class="border px-4 py-2">{{ optional($usage->equipment)->name }}</td>
                </tr>
                @empty
                  <tr>
                    <td colspan="8">
                      データがありません
                    </td>
                  </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- 床土一覧 --}}
    <div id="soilList" class="tab-content hidden transition-all duration-300 opacity-0">
        <table class="table-auto w-full border-collapse border mb-6">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border px-4 py-2">日付</th>
                    <th class="border px-4 py-2">作付</th>
                    <th class="border px-4 py-2">床土</th>
                    <th class="border px-4 py-2">肥料</th>
                    <th class="border px-4 py-2">使用量</th>
                    <th class="border px-4 py-2">単位</th>
                    <th class="border px-4 py-2">作業員</th>
                    <th class="border px-4 py-2">使用機械</th>
                </tr>
            </thead>
            <tbody>
                @forelse($soilUsages as $usage)
                <tr>
                    <td class="border px-4 py-2">{{ $usage->date }}</td>
                    <td class="border px-4 py-2">{{ optional($usage->cropping)->name }}</td>
                    <td class="border px-4 py-2">{{ optional($usage->soil)->name }}</td>
                    <td class="border px-4 py-2">{{ optional($usage->fertilizer)->name }}</td>
                    <td class="border px-4 py-2 text-right">{{ $usage->usage_amount }}</td>
                    <td class="border px-4 py-2 text-right">{{ $usage->unit }}</td>
                    <td class="border px-4 py-2">{{ optional($usage->worker)->name }}</td>
                    <td class="border px-4 py-2">{{ optional($usage->equipment)->name }}</td>
                </tr>
                @empty
                  <tr>
                    <td colspan="8">
                      データがありません
                    </td>
                  </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const tabButtons = document.querySelectorAll('#usageTabs button');
    const tabContents = document.querySelectorAll('.tab-content');
    const createButton = document.getElementById('createButton');

    function showTabContent(targetId) {
        // 1. 他のタブを非表示 & アニメーション用クラスをリセット
        tabContents.forEach(content => {
            content.classList.add('hidden', 'opacity-0');
            content.classList.remove('opacity-100');
        });

        // 2. 対象タブだけ表示 & フェードイン
        const activeTab = document.getElementById(targetId);
        activeTab.classList.remove('hidden');
        setTimeout(() => {
            activeTab.classList.remove('opacity-0');
            activeTab.classList.add('opacity-100');
        }, 10);

        // 3. ボタンのスタイルを変更
        tabButtons.forEach(btn => {
            if (btn.dataset.target === targetId) {
                // アクティブタブのボタンに色を付ける
                btn.classList.add('border-blue-500', 'text-blue-500', 'font-bold', 'bg-blue-100');
            } else {
                btn.classList.remove('border-blue-500', 'text-blue-500', 'font-bold', 'bg-blue-100');
            }
        });

        // 4. 新規登録ボタンのリンク先をタブに合わせて変更
        if (targetId === 'fieldList') {
            createButton.href = "{{ route('record.fertilizer_usage.createField') }}";
        } else if (targetId === 'seedList') {
            createButton.href = "{{ route('record.fertilizer_usage.createSeed') }}";
        } else if (targetId === 'soilList') {
            createButton.href = "{{ route('record.fertilizer_usage.createSoil') }}";
        }
    }

    // タブクリック時イベント
    tabButtons.forEach(btn => {
        btn.addEventListener('click', () => {
            showTabContent(btn.dataset.target);
        });
    });

    // 初期表示: 圃場タブを開く
    showTabContent('fieldList');
});
</script>
@endpush
