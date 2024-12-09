@extends('layouts.public')

@section('content')
<div class="consumer-body">
    <div class="consumer-container">
        <div class="consumer-header">
            <h1>{{ $crop->product_name }}</h1>
            <h2>-{{ $crop->name}}-</h2>
            @if ($crop->image)
                <div class="consumer-image text-center mt-3">
                    <img src="{{ asset('storage/' . $crop->image) }}" alt="Crop Image" class="consumer-image">
                </div>
            @endif
        </div>

        <div class="consumer-card consumer-section">
            <div class="consumer-card-body">
                <h2 class="consumer-card-title flex items-center">
                    <span class="consumer-icon material-icons"></span> 農法・栽培方法
                </h2>
                <div class="consumer-card-content">
                    {{ $crop->cultivation_method }}
                </div>
            </div>
        </div>

        <div class="consumer-card consumer-section">
            <div class="consumer-card-body">
                <h2 class="consumer-card-title flex items-center">
                    <span class="consumer-icon material-icons"></span> 農家の声
                </h2>
                <div class="consumer-card-content">
                    {{ $crop->description }}
                </div>
            </div>
        </div>

        <div class="consumer-card consumer-section">
            <div class="consumer-card-body">
                <h2 class="consumer-card-title flex items-center">
                    <span class="consumer-icon material-icons"></span> おいしい食べ方
                </h2>
                <div class="consumer-card-content">
                    {{ $crop->cooking_tips }}
                </div>
            </div>
        </div>

        @if ($crop->video)
            <div class="consumer-card consumer-section">
                <div class="consumer-card-body">
                    <h2 class="consumer-card-title flex items-center">
                        <span class="consumer-icon material-icons"></span> 動画
                    </h2>
                    <div class="consumer-video text-center">
                        <video controls class="consumer-video">
                            <source src="{{ asset('storage/' . $crop->video) }}" type="video/mp4">
                            お使いのブラウザは動画タグに対応していません。
                        </video>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection
