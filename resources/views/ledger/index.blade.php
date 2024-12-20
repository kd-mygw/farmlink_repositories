<!-- 台帳のトップページ -->
@extends('layouts.app')

@section('content')
<div class="Ledger-container">
  <h1>台帳</h1>

  <ul>
    <li><a href="{{ route('ledger.fields') }}">圃場</a></li>
    <li><a href="{{ route('ledger.workers') }}">作業員</a></li>
    <li><a href="{{ route('ledger.clients') }}">取引先</a></li>
    <li><a href="{{ route('ledger.items') }}">品目</a></li>
    <li><a href="{{ route('ledger.tasks') }}">作業</a></li>
    <li><a href="{{ route('ledger.equipment') }}">機械設備</a></li>
    <li><a href="{{ route('ledger.products') }}">商品</a></li>  </ul>
</div>
@endsection