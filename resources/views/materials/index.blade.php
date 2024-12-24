@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-6">資材管理</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- 種苗 -->
        <a href="{{ route('materials.seeds.index') }}" class="block bg-green-500 text-black font-bold py-4 px-6 rounded-lg shadow-md text-center hover:bg-green-700">
            種苗
        </a>
    </div>
</div>
@endsection
