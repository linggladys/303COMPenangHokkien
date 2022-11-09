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
            height: 400,
            pieHole: 0.4
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));


        chart.draw(data, options);
        window.addEventListener('resize', drawChart, false);
    }
</script>
@section('content')
    <div class="container">
        <div class="row">
            @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fa-solid fa-face-smile custom-icon-size"></i>
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
            <div class="col-md-5">
                <table class="table bg-white text-indigo-600 table-bordered">
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

                                <td scope="row">
                                    <a href="{{ route('phrases.show', ['phraseCateogryId'=>$like->phrase->phrase_category_id,'phraseId'=>$like->phrase_id]) }}" class="text-decoration-none">
                                       {{ $like->phrase->phrase_name }}
                                    </a>
                                </td>
                                <td>
                                    {{-- {{ $like->phrase }} --}}
                                    <form action="{{ route('phrase.likes', $like->phrase_id) }}" method="post">

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
                    It is empty here.
                    @endforelse
                </table>
            </div>
            <div class="col-md-7">
                <div class="my-5">
                     <div id="donutchart" class="chartCustom"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
