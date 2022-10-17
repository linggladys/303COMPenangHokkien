@extends('layouts.app')
@foreach ($phrases as $phrase)
 @section('title', 'Learn Penang Hokkien - ' . $phrase->phraseCategory->phrase_category_name )
@endforeach
@section('content')
    <div class="container">
        <div class="row">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fa-solid fa-face-smile"></i>
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @elseif(session('failure'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="fa-solid fa-face-frown"></i>
                    {{ session('failure') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="container">
                <div class="mb-3">
                    <button onclick="history.back()" class="btn btn-warning">
                        <i class="fa-solid fa-long-arrow-left"></i>
                        Return to Previous Page
                    </button>
                </div>
                @foreach ($phrases as $phrase)
                    <div class="card mb-3 custom-card bg-light" id="card">
                        <div class="front">
                            <div class="card-body text-center">
                                    @if ($phrase->phrase_image)
                                    <div class="phrase-container">
                                        <img class="card-img-top phrase-img-card" src="{{ asset($phrase->phrase_image) }}"
                                            alt="phrase_placeholder_image" />
                                        </div>
                                    @endif
                                <h3 class="card-title span-text-hover">{{ $phrase->phrase_meaning }}</h3>

                            </div>
                        </div>

                        <div class="back">
                            <div class="card-body text-center span-text-hover">
                                <h3 class="card-title">{{ $phrase->phrase_name }}</h3>

                                <audio id="myAudio">
                                    <source src="{{ asset($phrase->phrase_pronunciation_audio_m) }}" type="audio/mpeg" />
                                    Your browser does not support the audio element.
                                </audio>


                                <audio id="myAudio2">
                                    <source src="{{ asset($phrase->phrase_pronunciation_audio_f) }}" type="audio/mpeg" />
                                    Your browser does not support the audio element.
                                </audio>


                                <div class="gap-2 mb-3">
                                    <p class="small fw-bolder">Audio Pronunciation:</p>
                                    <div class="btn-group" role="group">
                                        <button class="btn btn-outline-secondary" onclick="playAudio()">
                                            <img src="{{ asset('assets/images/male.png') }}" alt="male-speech-bubble"
                                                class="pronunciation-img">
                                            Male Pronounce
                                        </button>
                                        <button class="btn btn-outline-secondary" onclick="playAudio2()">
                                            <img src="{{ asset('assets/images/female.png') }}" alt="female-speech-bubble"
                                                class="pronunciation-img" title="Female pronounce">
                                            Female Pronounce
                                        </button>
                                    </div>
                                </div>


                                <div class="span-text-hover">
                                    Audio Speed
                                    <i class="fa-solid fa-gauge-high"></i> <span id="currentPbr" class="mr-3">1</span>
                                </div>

                                <form action="#" class="mb-3">
                                    <label for="pbr">
                                    </label>
                                    <input id="pbr" type="range" value="1" min="0.75" max="2"
                                        step="0.25" />
                                </form>


                                <div class="btn-group" role="group" aria-label="Basic example">
                                    @if (!$phrase->likedBy(auth()->user()))
                                        <form action="{{ route('phrases.likes', $phrase) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-info text-white">
                                                <i class="fa-solid fa-thumbs-up"></i>
                                                Like this phrase
                                        </form>
                                    @else
                                        <form action="{{ route('phrases.likes', $phrase) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">
                                                <i class="fa-solid fa-thumbs-down"></i>
                                                Dislike this phrase
                                        </form>
                                        </button>
                                    @endif

                                    </button>





                                </div>

                            </div>

                        </div>

                    </div>

            </div>

        </div>
        <h2>Random memory aid for {{ $phrase->phrase_name }}</h2>
        <a href="{{ route('memaid.index',$phrase->id) }}" class="btn bg-indigo-600 text-white">
            <i class="fa-solid fa-brain"></i>
            View More Memory Aid
        </a>
        <div class="my-3">
          @forelse($memoryAids as $memAid)
          <div class="card">
            <div class="card-body">
                <p class="card-text">  {!! $memAid->memory_aid_content !!}
                    <p><span class="fw-bolder">Created by: </span>{{ $memAid->user->username }}</p>
                    <div class="d-flex justify-content-end">
                        <div class="btn-group" role="group">
                            <button disabled="disabled" class="btn btn-info">{{ $memAid->upvotes()->count() }}</button>
                            <button disabled="disabled" class="btn btn-outline-info">
                                <i class="fa-solid fa-caret-up"></i>
                                 {{ Str::plural('upvote',$memAid->upvotes()->count()) }}
                                </button>
                        </div>
                    </div>
                    @empty
                    <p>None of the memory aids have been made</p>
                @endforelse</p>
            </div>
          </div>
        </div>
        @endforeach

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
