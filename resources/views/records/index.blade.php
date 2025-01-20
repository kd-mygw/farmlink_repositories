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
                <img src="{{asset('/images/出荷アイコン.png')}}" alt="">
                <span class="ledger-card-title">出荷</span>
            </a>
        </div>
        <div class="ledger-card">
            <a href="{{ route('record.pesticide_usage.index') }}">
                <img src="{{asset('/images/農薬アイコン.png')}}" alt="">
                <span class="ledger-card-title">農薬</span>
            </a>
        </div>
        <div class="ledger-card">
            <a href="{{ route('record.fertilizer_usage.index') }}">
                <img src="{{asset('/images/肥料アイコン.png')}}" alt="">
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
            <img src="{{asset('/images/日報アイコン.png')}}" alt="">
            <span class="ledger-card-title">従業員日報</span>
          </a>
        </div>
        <div class="ledger-card">
          <a href="{{route('record.memo.index')}}">
            <img src="{{asset('/images/メモ帳アイコン.png')}}" alt="">
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

span {
    margin-top:13px;
}

</style>
