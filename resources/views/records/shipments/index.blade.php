@extends('layouts.app')

@section('title','出荷ページ')
@section('content')
<div class="records-container">
    <div class="title-container">
        <h1 class="records-title">出荷一覧</h1>
    </div>

    {{-- 一覧表 --}}
    <div class="records-table-container">
        <table class="records-table">
            <thead>
                <tr>
                    <th>日付</th>
                    <th>取引先</th>
                    <th>出荷品</th>
                    <th>単価</th>
                    <th>数量</th>
                    <th>メモ</th>
                    {{-- 編集や削除ボタンも必要なら追加 --}}
                </tr>
            </thead>
            <tbody>
                @forelse($shipments as $shipment)
                    <tr>
                        <td>{{ $shipment->date }}</td>
                        <td>{{ optional($shipment->client)->official_name }}</td>
                        <td>
                            {{-- 作付名 or 商品名 --}}
                            @if ($shipment->cropping)
                                {{ $shipment->cropping->name }}
                            @elseif ($shipment->product)
                                {{ $shipment->product->product_name }}
                            @else
                                なし
                            @endif
                        </td>
                        <td>{{ $shipment->unit_price }}</td>
                        <td>{{ $shipment->quantity }}</td>
                        <td>{{ $shipment->memo }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="border px-4 py-2 text-center">出荷データがありません</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        
    </div>
    {{-- 登録ボタン --}}
    <div class="records-actions">
        <a href="{{ route('record.shipment.create') }}" class="btn-success">
        新規出荷登録
        </a>
    </div>
</div>
@endsection
