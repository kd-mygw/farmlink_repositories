@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-6">作付一覧</h1>

    <!-- + ボタン -->
    <div class="mb-4">
        <a href="{{ route('cropping.create') }}" class="bg-green-500 hover:bg-green-700 text-black font-bold py-2 px-4 rounded">
            + 作付を作成
        </a>
    </div>

    <!-- 作付一覧表示 -->
    <table class="table-auto w-full bg-white shadow-md rounded">
        <thead>
            <tr class="bg-green-500 text-white">
                <th class="px-4 py-2">作付名</th>
                <th class="px-4 py-2">開始日</th>
                <th class="px-4 py-2">終了日</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($croppings as $cropping)
                <tr class="border-t">
                    <td class="px-4 py-2">{{ $cropping->name }}</td>
                    <td class="px-4 py-2">{{ $cropping->start_date }}</td>
                    <td class="px-4 py-2">{{ $cropping->end_date ?? '未設定' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center py-4">登録された作付がありません。</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
