@extends('layouts.app')

@section('title','台帳ページ')

@section('content')
<div class="ledger-container">
    <h1 class="ledger-title">台帳</h1>

    <div class="ledger-grid">
        <div class="ledger-card">
            <a href="{{ route('ledger.fields.index') }}">
                <div class="ledger-card-content">
                    <img src="{{asset('images/圃場アイコン.png')}}" alt="">
                    <span class="ledger-card-title">圃場</span>
                </div>
            </a>
        </div>
        <div class="ledger-card">
            <a href="{{ route('ledger.workers.index') }}">
                <div class="ledger-card-content">
                    <img src="{{asset('images/作業員アイコン.png')}}" alt="">
                    <span class="ledger-card-title">作業員</span>
                </div>
            </a>
        </div>
        <div class="ledger-card">
          <a href="{{ route('ledger.clients.index') }}">
              <div class="ledger-card-content">
                <img src="{{asset('images/取引先アイコン.png')}}" alt="">
                <span class="ledger-card-title">取引先</span>
              </div>
          </a>
        </div>
        <div class="ledger-card">
          <a href="{{ route('ledger.items.index') }}">
              <div class="ledger-card-content">
                <img src="{{asset('images/品目アイコン.png')}}" alt="">
                <span class="ledger-card-title">品目</span>
              </div>
          </a>
        </div>
        <div class="ledger-card">
          <a href="{{ route('ledger.tasks.index') }}">
              <div class="ledger-card-content">
                <img src="{{asset('images/作業アイコン.png')}}" alt="">
                <span class="ledger-card-title">作業</span>
              </div>
          </a>
        </div>
        <div class="ledger-card">
          <a href="{{ route('ledger.equipment.index') }}">
              <div class="ledger-card-content">
                <img src="{{asset('images/機械設備アイコン.png')}}" alt="">
                <span class="ledger-card-title">機械設備</span>
              </div>
          </a>
        </div>
        <div class="ledger-card">
          <a href="{{ route('crops.index') }}">
              <div class="ledger-card-content">
                <img src="{{asset('images/商品アイコン.png')}}" alt="">
                <span class="ledger-card-title">商品</span>
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