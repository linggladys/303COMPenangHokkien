@extends('layouts.app')
@section('title', 'Liked Phrases')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

        var data = google.visualization.arrayToDataTable([
            ['Word Category', 'Number Of Likes'],
            @php
                echo $likesData;
            @endphp
        ]);

        var options = {
            title: 'My Liked Words Per Category',
            fontName: 'Poppins',
            width: 400,
            height: 400
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));


        chart.draw(data, options);
        window.addEventListener('resize', drawChart, false);
    }
</script>
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <table class="table table-striped table-bordered">
                    <h1>Your Liked Phrases</h1>
                    <thead>
                        <tr>
                            <th scope="col">Liked Phrases</th>
                            <th scope="col">Operations</th>

                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($likes as $like)
                            <tr class="">
                                {{-- {{ $like->phrase->phraseCategory->id }} --}}

                                <td scope="row">{{ $like->phrase->phrase_name }}</td>
                                <td>
                                    {{-- {{ $like->phrase }} --}}
                                    <form action="{{ route('phrase.likes', $like->phrase_id) }}" method="post">
                                        <a href="{{ route('phrases.show', $like->phrase_id) }}" class="btn btn-primary">
                                            <i class="fa-solid fa-eye"></i>
                                            View
                                        </a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Are you sure of this action?');">
                                            <i class="fa-solid fa-trash-can"></i>
                                            Remove from Likes
                                        </button>
                                    </form>
                                </td>
                            </tr>
                    </tbody>

                @empty
                    <img src="{{ asset('assets/images/frowned.png') }}" alt="notFound" class="mx-auto">
                    There is no likes. Make an initiave to like a phrase!
                    @endforelse
                </table>
            </div>
            <div class="col-md-5">
                <div id="piechart" class="chartCustom"></div>
            </div>
        </div>
    </div>
@endsection
