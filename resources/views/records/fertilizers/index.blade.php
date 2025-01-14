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
        <a href="{{ route('record.fertilizer.create') }}" class="btn btn-success">
            新規肥料登録
        </a>
    </div>

    {{-- 一覧表 --}}
    <table class="table-auto w-full border-collapse border border-gray-300">
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
                <th class="border px-4 py-2">メモ</th>
                {{-- 編集や削除ボタンも必要なら追加 --}}
            </tr>
        </thead>
        <tbody>
            @forelse($fertilizers as $fertilizer)
                <tr>
                    <td class="border px-4 py-2">{{ $fertilizer->date }}</td>
                    <td class="border px-4 py-2">{{ $fertilizer->cropping->name }}</td>
                    <td class="border px-4 py-2">{{ $fertilizer->fields->name }}</td>
                    <td class="border px-4 py-2">{{ $fertilizer->fertilizer->name }}</td>
                    <td class="border px-4 py-2">{{ $fertilizer->quantity }}</td>
                    <td class="border px-4 py-2">{{ $fertilizer->unit }}</td>
                    <td class="border px-4 py-2">{{ $fertilizer->workers->name }}</td>
                    <td class="border px-4 py-2">{{ $fertilizer->equipment->name }}</td>
                    <td class="border px-4 py-2">{{ $fertilizer->memo }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="border px-4 py-2 text-center">出荷データがありません</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
