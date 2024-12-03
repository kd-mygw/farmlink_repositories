<!-- resources/views/qr/create.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $crop->product_name }} のQRコード生成</h1>
    <p>この農作物の詳細情報を消費者に見せるためのQRコードを生成します。</p>
    <form action="{{ route('qr.store', ['crop' => $crop->id]) }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-primary">QRコードを生成</button>
    </form>
    <a href="{{ route('crops.index') }}" class="btn btn-secondary mt-3">戻る</a>
</div>
@endsection
