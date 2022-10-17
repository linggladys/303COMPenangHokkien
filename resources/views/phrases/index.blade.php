@extends('layouts.app')
@foreach ($phrases as $phrase)
 @section('title', 'Learn Penang Hokkien - ' . $phrase->phraseCategory->phrase_category_name )
@endforeach
@section('content')
    <div class="container">
        <div class="row">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Phrase</th>
                            <th scope="col">Phrase Meaning</th>
                            <th scope="col">Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($phrases as $phrase)<tr>
                         <td scope="row">{{ $phrase->phrase_name }}</td>
                            <td>{{ $phrase->phrase_meaning }}</td>
                            <td>
                                <a href="{{ route('phrases.show',['phraseCateogryId'=>$phrase->phrase_category_id,'phraseId'=>$phrase->id]) }}" class="btn btn-primary">
                                    <i class="fa-solid fa-eye"></i>
                                    View Phrase Info
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>


    </div>
    </div>
    @push('scripts')
    <script type="text/javascript">
        let x = document.getElementById("myAudio");
        let x2 = document.getElementById("myAudio2");

        function playAudio() {
            x.play();

        }

        function playAudio2() {
            x2.play();
        }

        let p = document.getElementById("pbr");
        let c = document.getElementById("currentPbr");

        p.addEventListener(
            "input",
            function() {
                c.innerHTML = p.value;
                x.playbackRate = p.value;
                x2.playbackRate = p.value;
            },
            false
        );
    </script>
@endpush

@endsection
