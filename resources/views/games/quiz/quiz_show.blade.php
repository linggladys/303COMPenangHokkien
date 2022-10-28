@extends('layouts.app')
@section('title', 'Quiz for ' . $phraseCategory->phrase_category_name)
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Correct Answers', 'Wrong Answers'],
          @php
                echo $quizResultData;
            @endphp
        ]);

        var options = {
          fontName: 'Poppins',
          title: 'Latest Score Info',
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
        window.addEventListener('resize', drawChart, false);
      }
    </script>

@section('content')
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fa-solid fa-face-smile" style="font-size: 18pt"></i>
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @elseif(session('failures'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fa-solid fa-face-frown" style="font-size: 18pt"></i>
                {{ session('failures') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="row">
            <x-app-page-header>Quiz on {{ $phraseCategory->phrase_category_name }}</x-app-page-header>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body text-center">
                        <div id="donutchart"></div>
                            <div class="btn-group">
                                <a class="btn btn-primary" href="{{ route('quiz.quizStart', $phraseCategory->id) }}">Gia</a>
                                <a class="btn btn-info" href="{{ route('quiz.quizReview', $phraseCategory->id) }}">Latest Quiz Review</a>
                                <a class="btn bg-indigo-300" href="{{ route('quiz.index') }}" role="button">Return to Quiz</a>
                            </div>

                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection
