@extends('layouts.public')

@section('content')
<div class="container mt-4">
    <div class="card shadow-lg border-0 mb-4 rounded-lg">
        <div class="card-body text-center">
            <h1 class="card-title text-4xl font-bold text-green-700 mb-4">{{ $crop->product_name }}</h1>
            @if ($crop->image)
                <div class="image text-center mt-3">
                    <img src="{{ asset('storage/' . $crop->image) }}" alt="Crop Image" class="img-fluid rounded-lg shadow">
                </div>
            @endif
        </div>
    </div>

    <div class="card shadow-lg border-0 mb-4 rounded-lg">
        <div class="card-body">
            <h2 class="card-subtitle mb-3 text-2xl font-semibold text-green-700 flex items-center">
                <span class="material-icons text-green-500 mr-2"></span> 農法・栽培方法
            </h2>
            <p class="card-text p-4 bg-green-50 rounded-lg text-gray-700">
                {{ $crop->cultivation_method }}
            </p>
        </div>
    </div>

    <div class="card shadow-lg border-0 mb-4 rounded-lg">
        <div class="card-body">
            <h2 class="card-subtitle mb-3 text-2xl font-semibold text-green-700 flex items-center">
                <span class="material-icons text-yellow-500 mr-2"></span> 食の安全性
            </h2>
            <p class="card-text p-4 bg-green-50 rounded-lg text-gray-700">
                {{ $crop->description }}
            </p>
        </div>
    </div>

    <div class="card shadow-lg border-0 mb-4 rounded-lg">
        <div class="card-body">
            <h2 class="card-subtitle mb-3 text-2xl font-semibold text-green-700 flex items-center">
                <span class="material-icons text-orange-500 mr-2"></span> おいしい食べ方
            </h2>
            <p class="card-text p-4 bg-green-50 rounded-lg text-gray-700">
                {{ $crop->cooking_tips }}
            </p>
        </div>
    </div>

    @if ($crop->video)
        <div class="card shadow-lg border-0 mb-4 rounded-lg">
            <div class="card-body">
                <h2 class="card-subtitle mb-3 text-2xl font-semibold text-green-700 flex items-center">
                    <span class="material-icons text-blue-500 mr-2"></span> 動画
                </h2>
                <div class="video text-center">
                    <video controls class="w-100 rounded-lg shadow">
                        <source src="{{ asset('storage/' . $crop->video) }}" type="video/mp4">
                        お使いのブラウザは動画タグに対応していません。
                    </video>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection
