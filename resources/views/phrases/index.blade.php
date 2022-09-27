@extends('layouts.app')
@section('title', 'Phrases')
@section('content')
    <div class="container">
        <div class="row">
            <div class="container">
                <div class="mb-3">
                    <a href="{{ route('phrasesCategory.index')}}" class="btn btn-warning">
                        <i class="fa-solid fa-long-arrow-left"></i>
                        Return to Phrase Categories
                    </a>
                </div>
                @foreach ($phrases as $phrase)
                    <div class="card mb-3 custom-card" id="card">
                        <div class="front">
                            <div class="card-body text-center">
                                <div class="phrase-container">
                                    @if ($phrase->phrase_image)
                                        <img class="card-img-top phrase-img-card" src="{{ asset($phrase->phrase_image) }}"
                                            alt="phrase_placeholder_image" />
                                    @endif
                                </div>

                                <h3 class="card-title">{{ $phrase->phrase_meaning }}</h3>
                            </div>
                        </div>

                        <div class="back">
                            <div class="card-body text-center">
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
                                                class="pronunciation-img" title="Male pronounce">
                                        </button>
                                        <button class="btn btn-outline-secondary" onclick="playAudio2()">
                                            <img src="{{ asset('assets/images/female.png') }}" alt="female-speech-bubble"
                                                class="pronunciation-img" title="Female pronounce">
                                        </button>
                                    </div>
                                </div>


                                Audio Speed
                                <i class="fa-solid fa-gauge-high"></i> <span id="currentPbr" class="mr-3">1</span>

                                <form action="#" class="mb-3">
                                    <label for="pbr">
                                    </label>
                                    <input id="pbr" type="range" value="1" min="0.75" max="2"
                                        step="0.25" />
                                </form>


                            </div>
                        </div>



                    </div>

            </div>

        </div>
        @endforeach
        {!! $phrases->links('pagination::simple-bootstrap-5') !!}
    </div>
    </div>
    </div>
@endsection
@section('scripts')
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
@endsection
