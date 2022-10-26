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

        <div class="my-3">
            <a href="{{ route('memaid.index',$phrase->id) }}" class="btn bg-indigo-600 text-white">
            <i class="fa-solid fa-brain"></i>
            View More Memory Aids From Users
        </a>
        @forelse ($memoryAids as $memoryAid)
        <h2>Memory Aid for {{ $memoryAid->phrase->phrase_name }}</h2>
            <div class="card border-primary p-3 mb-3 text-center">
                <p class="card-text">
                    <span class="span-text-hover fw-light">Created by: </span>
                    @if ($memoryAid->user->profile_image)
                        <img src="{{ asset('uploads/user_images/' . $memoryAid->user->profile_image) }}"
                            alt="user-image-profile" class="icon-avatar"
                            title="{{ $memoryAid->user->username }}'s profile pic" />
                    @else
                        <img src="{{ asset('assets/images/user.png') }}" alt="user-image-profile-unavailable"
                            class="icon-avatar">
                    @endif
                    {{ $memoryAid->user->username }}
                </p>
                {!! $memoryAid->memory_aid_content !!}
                <div class="d-flex justify-content-end">
                    <div class="btn-group" role="group">
                        <button disabled="disabled"
                            class="btn btn-info">{{ $memoryAid->upvotes()->count() }}</button>
                        <button disabled="disabled" class="btn btn-outline-info">
                            <i class="fa-solid fa-caret-up"></i>
                            {{ Str::plural('upvote', $memoryAid->upvotes()->count()) }}
                        </button>
                    </div>
                </div>
                @empty
                <p class="text-center my-5">
                    None of the memory aids have been made from {{ Auth::user()->username }}
                </p>
                @endforelse

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
