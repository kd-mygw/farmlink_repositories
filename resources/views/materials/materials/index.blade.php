@extends('layouts.app')

@section('title','資材一覧')
@section('content')
<div class="materials-container">
  <div class="title-container">
    <h1 class="materials-title">資材一覧</h1>
  </div>
  <div class="materials-table-container">
    <table class="materials-table">
      <thead>
        <tr>
          <th>ID</th>
          <th>品名</th>
          <th>購入日または棚卸日</th>
          <th>内容量</th>
          <th>数量</th>
          <th>購入金額</th>
          <th>購入先</th>
          <th>操作</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($materials as $material)
        <tr>
          <td>{{ $material->id }}</td>
          <td>{{ $material->name }}</td>
          <td>{{ $material->purchased_date ?? 'なし' }}</td>
          <td>{{ $material->content_volume ?? 'なし' }} {{ $material->unit ?? '' }}</td>
          <td>{{ $material->quantity }}</td>
          <td>{{ $material->purchase_price ? '¥' . number_format($material->purchase_price, 2) : 'なし' }}</td>
          <td>{{ $material->supplier ?? 'なし' }}</td>
          <td>
            <a href="{{ route('materials.materials.edit', $material->id) }}" class="btn-primary">編集</a>
          </td>
        </tr>
        @empty
        <tr>
          <td colspan="6" class="text-center py-4">登録された資材がありません。</td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>
  <div class="materials-actions">
    <a href="{{route('materials.materials.create')}}" class="btn-success">新規登録</a>
  </div>
</div>
@endsection