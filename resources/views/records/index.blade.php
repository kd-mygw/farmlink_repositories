@extends('layouts.app')

@section('title','記録ページ')
@section('content')

<div class="records-container">
    <div class="title-container">
        <h1 class="records-title">記録管理</h1>

    </div>

    <div class="ledger-grid">
        <div class="ledger-card">
            <a href="{{ route('record.harvest.index') }}">
                <img src="{{asset('/images/収穫アイコン.png')}}" alt="">
                <span class="ledger-card-title">収穫</span>
            </a>
        </div>
        <div class="ledger-card">
            <a href="{{ route('record.shipment.index') }}">
                <svg class="ledger-card-icon" viewBox="0 0 24 24">
                    <path d="M20 8h-3V4H7v4H4v12h16V8zm-7-2h4v2h-4V6zm-2 0v2H8V6h3zm-5 14v-8h12v8H6z"/>
                </svg>
                <span class="ledger-card-title">出荷</span>
            </a>
        </div>
        <div class="ledger-card">
            <a href="{{ route('record.pesticide_usage.index') }}">
                <svg class="ledger-card-icon" viewBox="0 0 24 24">
                    <path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/>
                </svg>
                <span class="ledger-card-title">農薬</span>
            </a>
        </div>
        <div class="ledger-card">
            <a href="{{ route('record.fertilizer_usage.index') }}">
                <svg class="ledger-card-icon" viewBox="0 0 24 24">
                    <path d="M12 7V3H2v18h20V7H12zM6 19H4v-2h2v2zm0-4H4v-2h2v2zm0-4H4v-2h2v2zm0-4H4V9h2v2zm4 12H8v-2h2v2zm0-4H8v-2h2v2zm0-4H8V9h2v2zm0-4H8V5h2v2zm10 12h-8v-2h2v-2h-2v-2h2v-2h-2V9h8v10zm-2-8h-2v2h2v-2zm0 4h-2v2h2v-2z"/>
                </svg>
                <span class="ledger-card-title">肥料</span>
            </a>
        </div>
        {{--<div class="record-card">
          <a href="{{route('record.task.index')}}">
            <svg class="record-card-icon" viewBox="0 0 24 24">
              <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5S10.62 6.5 12 6.5 14.5 7.62 14.5 9 13.38 11.5 12 11.5z"/>
            </svg>
            <span class="record-card-title">その他作業</span>
          </a>
        </div>--}}
        <div class="ledger-card">
          <a href="{{route('record.report.index')}}">
            <svg class="ledger-card-icon" viewBox="0 0 24 24">
              <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5S10.62 6.5 12 6.5 14.5 7.62 14.5 9 13.38 11.5 12 11.5z"/>
            </svg>
            <span class="recoledgerrd-card-title">従業員日報</span>
          </a>
        </div>
        <div class="ledger-card">
          <a href="{{route('record.memo.index')}}">
            <svg class="ledger-card-icon" viewBox="0 0 24 24">
              <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5S10.62 6.5 12 6.5 14.5 7.62 14.5 9 13.38 11.5 12 11.5z"/>
            </svg>
            <span class="ledger-card-title">メモ報告</span>
          </a>
        </div>
        {{--<div class="record-card">
          <a href="{{route('record.material.index')}}">
            <svg class="record-card-icon" viewBox="0 0 24 24">
              <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5S10.62 6.5 12 6.5 14.5 7.62 14.5 9 13.38 11.5 12 11.5z"/>
            </svg>
            <span class="record-card-title">資材</span>
          </a>
        </div> --}}
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
