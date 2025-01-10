@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">

    <h1 class="text-2xl font-bold mb-6">肥料使用記録一覧</h1>

    {{-- タブボタン --}}
    <div class="mb-4 flex border-b" id="usageTabs">
        <button class="px-4 py-2 focus:outline-none border-b-2 border-transparent"
            data-target="fieldList">圃場</button>
        <button class="px-4 py-2 focus:outline-none border-b-2 border-transparent"
            data-target="seedList">種苗</button>
        <button class="px-4 py-2 focus:outline-none border-b-2 border-transparent"
            data-target="soilList">床土</button>
    </div>

    {{-- 登録ボタン --}}
    <div class="mb-6 text-right">
        {{-- デフォルトは圃場を表示 --}}
        <a id="createButton" href="{{ route('record.fertilizer_usage.createField') }}"
            class="btn btn-success">
            新規登録
        </a>
    </div>

    {{-- 圃場一覧 --}}
    <div id="fieldList" class="tab-content hidden">
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
                @foreach($fieldUsages as $usage)
                <tr>
                    <td class="border px-4 py-2">{{ $usage->date}}</td>
                    <td class="border px-4 py-2">{{ optional($usage->cropping)->name }}</td>
                    <td class="border px-4 py-2">{{ optional($usage->field)->name }}</td>
                    <td class="border px-4 py-2">{{ optional($usage->fertilizer)->name }}</td>
                    <td class="border px-4 py-2 text-right">{{ $usage->usage_amount }}</td>
                    <td class="border px-4 py-2">{{ $usage->unit }}</td>
                    <td class="border px-4 py-2">{{ optional($usage->worker)->name }}</td>
                    <td class="border px-4 py-2">{{ optional($usage->equipment)->name }}</td>
                </tr>
                @endforeach
                {{--<tr>
                    <td colspan="6" class="border px-4 py-2 text-center">肥料データがありません</td>
                </tr>
                @endforelse--}}
            </tbody>
        </table>
    </div>
    {{-- 種苗一覧--}}
    <div id="seedList" class="tab-content hidden">
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
                @foreach($seedUsages as $usage)
                <tr>
                    <td class="border px-4 py-2">{{ $usage->date}}</td>
                    <td class="border px-4 py-2">{{ optional($usage->cropping)->name }}</td>
                    <td class="border px-4 py-2">{{ optional($usage->seed)->name }}</td>
                    <td class="border px-4 py-2">{{ optional($usage->fertilizer)->name }}</td>
                    <td class="border px-4 py-2 text-right">{{ $usage->usage_amount }}</td>
                    <td class="border px-4 py-2">{{ $usage->unit }}</td>
                    <td class="border px-4 py-2">{{ optional($usage->worker)->name }}</td>
                    <td class="border px-4 py-2">{{ optional($usage->equipment)->name }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{--床土一覧--}}
    <div id="soilList" class="tab-content hidden">
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
                @foreach($soilUsages as $usage)
                <tr>
                    <td class="border px-4 py-2">{{ $usage->date}}</td>
                    <td class="border px-4 py-2">{{ optional($usage->cropping)->name }}</td>
                    <td class="border px-4 py-2">{{ optional($usage->soil)->name }}</td>
                    <td class="border px-4 py-2">{{ optional($usage->fertilizer)->name }}</td>
                    <td class="border px-4 py-2 text-right">{{ $usage->usage_amount }}</td>
                    <td class="border px-4 py-2">{{ $usage->unit }}</td>
                    <td class="border px-4 py-2">{{ optional($usage->worker)->name }}</td>
                    <td class="border px-4 py-2">{{ optional($usage->equipment)->name }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventLintener('DOMContentLoaded', function() {
    const tabButtons = document.querySelectorAll('#usageTabs button');
    const tabContents = document.querySelectorAll('.tab-content');
    const createButton = documnt.getElementById('createButton');

    function showTabContent(targetId) {
        // 1.他のタブを非表示
        tabContents.forEach(content => {
            content.classlist.add('hidden');
        });
        // 2.対象タブだけ表示
        document.getElemntById(targetId).classList.remove('hidden');

        // 3.ボタンのスタイル変更
        tabButtons.forEach(btn => {
            if (btn.dataset.targt === targetId) {
                btn.classlist.add('border-blue-500', 'text-blue-500');
            }
        });

        // 4.新規登録ボタンのリンク先をタブに合わせて変更
        if (targetId === 'fildList') {
            createButton.href = "{{ route('record.fertilizer_usage.createField') }}";
        } else if (targetId === 'seedList') {
            createButton.href = "{{ route('record.fertilizer_usage.createSeed') }}";
        } else if (targetId === 'soilList') {
            createButton.href = "{{ route('record.fertilizer_usage.createSoil')}}";
        }
    }

    tabButtons.forEach(btn => {
        btn.addEvenListener('click', () => {
            showTabContents(btn.dataset.target);
        });
    });

    // 初期表示:圃場タブ
    showTabContent('fieldList');
});
</script>
@endpush