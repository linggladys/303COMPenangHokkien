@extends('layouts.app')
@section('title', 'Quiz Statistics')

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Month', 'Marks'],
            @php
                foreach ($lineChartResults as $result) {
                    echo "['" . $result->quiz_taken_date . "', " . $result->points . '],';
                }
            @endphp
        ]);

        var options = {
            title: 'Quiz Performance',
            curveType: 'none',
            legend: {
                position: 'bottom'
            },
            fontName: 'Poppins',

        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
        window.addEventListener('resize', drawChart, false);
    }
</script>


@section('content')
    <div class="container">
        <x-app-page-header>Quiz Results Recency Statistics Info</x-app-page-header>
        <a class="btn btn-warning" href="{{ route('quiz.index') }}" role="button">
            <i class="fa-solid fa-long-arrow-left"></i>
            Return to Quiz
        </a>
        <div class="row">
            <h2 class="span-text-hover">Latest Score from Quiz</h2>
            @foreach ($latestScore as $latestScoreItem)
                <div class="col-md-3 mb-3">
                    <div class="card bg-white text-center">
                        <div class="card-body">
                            <h4>{{ $latestScoreItem->phrase_category_name }}</h4>
                            <hr>
                            <p class="card-text">
                                {{ $latestScoreItem->points }} marks
                            </p>
                        </div>
                    </div>

                </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-md-12 mb-3">
                <div id="curve_chart"></div>
            </div>
        </div>



    </div>

@endsection
