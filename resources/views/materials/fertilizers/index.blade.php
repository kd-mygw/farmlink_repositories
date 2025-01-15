@extends('layouts.app')

@section('content')
<div class="materials-container">
  <div class="title-container">
    <h1 class="materials-title">肥料一覧</h1>
  </div>
  <div class="materials-table-container">
    <table class="materials-table">
      <thead>
        <tr>
          <th>ID</th>
          <th>肥料名</th>
          <th>含有成分</th>
          <th>購入日</th>
          <th>数量</th>
          <th>使用量</th>
          <th>ロット番号</th>
          <th>操作</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($fertilizers as $fertilizer)
          <tr>
            <td>{{ $fertilizer->id }}</td>
            <td>{{ $fertilizer->name }}</td>
            <td>{{ $fertilizer->nutrient ?? 'なし' }}</td>
            <td>{{ $fertilizer->purchase_date ?? 'なし' }}</td>
            <td>{{ $fertilizer->quantity }}</td>
            <td>{{ $fertilizer->application_rate ?? 'なし' }}</td>
            <td>{{ $fertilizer->lot_number ?? 'なし' }}</td>
            <td>
              <a href="{{ route('materials.fertilizers.edit', $fertilizer->id) }}" class="btn-primary">編集</a>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="6" class="text-center py-4">登録された肥料がありません。</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>
  <div class="materials-actions">
    <a href="{{route('materials.fertilizers.create')}}" class="btn-success">新規登録</a>
  </div>
</div>
@endsection