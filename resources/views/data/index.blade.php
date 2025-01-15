@extends('layouts.app') 
{{-- または別のレイアウトを使うなら調整 --}}

@section('content')
<div class="container mx-auto my-6">
    <h1 class="text-2xl font-bold mb-4">ダッシュボード</h1>

    <!-- グラフを表示するキャンバス -->
    <canvas id="myChart" width="400" height="200"></canvas>
</div>

{{-- Chart.js CDN --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('myChart').getContext('2d');

        // Blade から受け取った配列を JavaScript でも使えるようにする
        const labels = @json($chartLabels);
        const data = @json($chartData);

        new Chart(ctx, {
            type: 'bar', // 'line', 'bar', 'pie', etc.
            data: {
                labels: labels,
                datasets: [{
                    label: 'サンプルデータ',
                    data: data,
                    backgroundColor: 'rgba(75, 192, 192, 0.4)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1 
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true 
                    }
                }
            }
        });
    });
</script>
@endsection
