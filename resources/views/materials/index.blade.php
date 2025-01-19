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
                    <svg class="ledger-card-icon" viewBox="0 0 24 24">
                        <path d="M20 3H4a1 1 0 0 0-1 1v16a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1zM8 17H6v-2h2v2zm0-4H6v-2h2v2zm0-4H6V7h2v2zm10 8h-8v-2h8v2zm0-4h-8v-2h8v2zm0-4h-8V7h8v2z"/>
                    </svg>
                    <span class="ledger-card-title">種苗</span>
                </div>
            </a>
        </div>
        <div class="ledger-card">
            <!-- 農薬 -->
            <a href="{{ route('materials.pesticides.index')}}">
                <div class="ledger-card-content">
                    <svg class="ledger-card-icon" viewBox="0 0 24 24">
                        <path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/>
                    </svg>
                    <span class="ledger-card-title">農薬</span>
                </div>
            </a>
        </div>
        <div class="ledger-card">
            <a href="{{ route('materials.fertilizers.index')}}">
                <div class="ledger-card-content">
                    <svg class="ledger-card-icon" viewBox="0 0 24 24">
                        <path d="M12 7V3H2v18h20V7H12zM6 19H4v-2h2v2zm0-4H4v-2h2v2zm0-4H4v-2h2v2zm0-4H4V9h2v2zm4 12H8v-2h2v2zm0-4H8v-2h2v2zm0-4H8V9h2v2zm0-4H8V5h2v2zm10 12h-8v-2h2v-2h-2v-2h2v-2h-2V9h8v10zm-2-8h-2v2h2v-2zm0 4h-2v2h2v-2z"/>
                    </svg>
                    <span class="ledger-card-title">肥料</span>
                </div>
            </a>
        </div>
        <div class="ledger-card">
            <a href="{{ route('materials.soils.index')}}">
                <div class="ledger-card-content">
                    <svg class="ledger-card-icon" viewBox="0 0 24 24">
                        <path d="M19 3H5c-1.11 0-2 .9-2 2v14c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V5h14v14zm-8-2h2v-4h4v-2h-4V7h-2v4H7v2h4z"/>
                    </svg>
                    <span class="ledger-card-title">床土</span>
                </div>
            </a>
        </div>
        <div class="ledger-card">
            <a href="{{ route('materials.materials.index')}}">
                <div class="ledger-card-content">
                    <svg class="ledger-card-icon" viewBox="0 0 24 24">
                        <path d="M19 3h-4.18C14.4 1.84 13.3 1 12 1c-1.3 0-2.4.84-2.82 2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-7 0c.55 0 1 .45 1 1s-.45 1-1 1-1-.45-1-1 .45-1 1-1zm2 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z"/>
                    </svg>
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

</style>
