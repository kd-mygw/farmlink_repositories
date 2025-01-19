@extends('layouts.app')

@section('title','作付ページ')
@section('content')
<div class="ledger-container">
    <div class="title-container">
        <h1 class="ledger-title">作付一覧</h1>
    </div>
    <!-- 作付一覧表示 -->
    <div class="ledger-table-container">
        <table class="ledger-table">
            <thead>
                <tr class="bg-green-500 text-black">
                    <th class="px-4 py-2">作付名</th>
                    <th class="px-4 py-2">品目名</th>
                    <th class="px-4 py-2">圃場名</th>
                    <th class="px-4 py-2">栽培方法</th>
                    <th class="px-4 py-2">播種/定植日</th>
                    <th class="px-4 py-2">操作</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($croppings as $cropping)
                    <tr class="border-t">
                        <!-- 作付名 -->
                        <td class="px-4 py-2">{{ $cropping->name }}</td>

                        <!-- 品目名 -->
                        <td class="px-4 py-2">
                            {{ $cropping->item->crop_name }} {{ $cropping->item->variety_name }}
                        </td>

                        <!-- 圃場名 -->
                        <td class="px-4 py-2">{{ $cropping->field->name }}</td>

                        <!-- 栽培方法 -->
                        <td class="px-4 py-2">{{ $cropping->cultivation_method }}</td>

                        <!-- 播種/定植日 -->
                        <td class="px-4 py-2">{{ $cropping->planting_date }}</td>

                        <!-- 操作 -->
                        <td class="px-4 py-2">
                            <a href="{{ route('cropping.edit', $cropping->id) }}" class="btn-primary">編集</a>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-4">登録された作付がありません。</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="ledger-actions">
        <a href="{{ route('cropping.create') }}" class="btn-success">
            作付を作成
        </a>
    </div>
</div>
@endsection
