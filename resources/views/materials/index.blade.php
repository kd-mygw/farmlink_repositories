@extends('layouts.app')

@section('title','資材ページ')
@section('content')
<div class="ledger-container">
    <div class="title-container">
        <h1 class="ledger-title">資材管理</h1>
    </div>

    <div class="ledger-grid">
        <div class="ledger-card">
            <!-- 種苗 -->
            <a href="{{ route('materials.seeds.index') }}">
                <div class="ledger-card-content">
                    <img src="{{ asset('/../images/種苗アイコン.png') }}" width="50" height="50" alt="">
                    <span class="ledger-card-title">種苗</span>
                </div>
            </a>
        </div>
        <div class="ledger-card">
            <!-- 農薬 -->
            <a href="{{ route('materials.pesticides.index')}}">
                <div class="ledger-card-content">
                    <img src="{{ asset('/../images/農薬アイコン.png') }}" alt="">
                    <span class="ledger-card-title">農薬</span>
                </div>
            </a>
        </div>
        <div class="ledger-card">
            <a href="{{ route('materials.fertilizers.index')}}">
                <div class="ledger-card-content">
                    <img src="{{ asset('/../images/肥料アイコン.png') }}" alt="">
                    <span class="ledger-card-title">肥料</span>
                </div>
            </a>
        </div>
        <div class="ledger-card">
            <a href="{{ route('materials.soils.index')}}">
                <div class="ledger-card-content">
                    <img src="{{ asset('/../images/床土アイコン.png') }}" alt="">
                    <span class="ledger-card-title">床土</span>
                </div>
            </a>
        </div>
        <div class="ledger-card">
            <a href="{{ route('materials.materials.index')}}">
                <div class="ledger-card-content">
                    <img src="{{ asset('/../images/資材アイコン.png') }}" alt="">
                    <span class="ledger-card-title">資材</span>
                </div>
            </a>
        </div>
    </div>
</div>
@endsection

<style>
/* Base Styles */
.ledger-container {
    font-family: 'Arial', sans-serif;
    background: linear-gradient(135deg, #f8f9fa, #e9ecef);
    padding: 2rem;
    max-width: 1200px;
    margin: 0 auto;
    border-radius: 12px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.ledger-title {
    text-align: center;
    color: #343a40;
    margin-bottom: 2rem;
    font-size: 2.5rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 2px;
}

.ledger-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    gap: 1.5rem;
}

/* Card Styles */
.ledger-card {
    background: #ffffff;
    border-radius: 12px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.ledger-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
}

.ledger-card a {
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 2rem;
    color: #495057;
    text-decoration: none;
}

.ledger-card-content {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
}

.ledger-card-icon {
    width: 60px;
    height: 60px;
    margin-bottom: 1rem;
    fill: #6c757d;
    transition: fill 0.3s ease;
}

.ledger-card:hover .ledger-card-icon {
    fill: #495057;
}

.ledger-card-title {
    font-size: 1.2rem;
    font-weight: 600;
    text-align: center;
    text-transform: capitalize;
    color: #212529;
}

/* Responsive Adjustments */
@media (hover: hover) {
    .ledger-card:hover {
        transform: scale(1.05);
    }
}

@media (max-width: 768px) {
    .ledger-title {
        font-size: 2rem;
    }

    .ledger-card {
        padding: 1.5rem;
    }

    .ledger-card-icon {
        width: 50px;
        height: 50px;
    }

    .ledger-card-title {
        font-size: 1rem;
    }
}

span {
    margin-top:13px;
}

</style>
