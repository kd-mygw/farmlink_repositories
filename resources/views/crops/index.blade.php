@extends('layouts.app')

@section('content')
<div class="container">
    <h1>農作物一覧</h1>
    <a href="{{ route('crops.create') }}" class="btn btn-primary">新規農作物を登録</a>
    @if (session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif
    <table class="table mt-3">
        <thead>
            <tr>
                <th>商品名</th>
                <th>品種名</th>
                <th>栽培方法</th>
                <th>肥料情報</th>
                <th>農薬情報</th>
                <th>説明</th>
                <th>おすすめの調理法</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($crops as $crop)
                <tr>
                    <td>{{ $crop->product_name }}</td>
                    <td>{{ $crop->name }}</td>
                    <td>{{ $crop->cultivation_method }}</td>
                    <td>{{ $crop->fertilizer_info }}</td>
                    <td>{{ $crop->pesticide_info }}</td>
                    <td>{{ $crop->description }}</td>
                    <td>{{ $crop->cooking_tips }}</td>
                    <td>
                        <a href="{{ route('crops.edit', $crop->id) }}" class="btn btn-warning">編集</a>
                        <form action="{{ route('crops.destroy', $crop->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('本当に削除しますか？')">削除</button>
                        </form>
                        <!-- <a href="{{ route('shipments.create', ['crop_id' => $crop->id]) }}" class="btn btn-info">出荷情報を管理</a> -->
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
