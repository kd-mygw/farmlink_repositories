<!-- resources/views/crops/simple.blade.php -->
@extends('layouts.public')

@section('content')
<div class="container">
    <section class="hero">
        <h1>{{ $crop->product_name }} - {{ $crop->name }}</h1>
        <p>{{ $crop->description }}</p>
    </section>

    <section class="section">
        <h2>生産者情報</h2>
        <p>{{ $name }}</p>
        <p>{{ $farm_name }}</p>
        <p>{{ $farm_address }}</p>
    </section>
</div>
@endsection
