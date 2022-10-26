@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <x-app-page-header>Quiz Review on {{ $phraseCategory->phrase_category_name }}</x-app-page-header>
            <h3>
                <span class="span-text-hover fw-bolder">Last Scored Points: </span>{{ $latestScoredPoints }}
            </h3>
            @foreach ($phraseCategory->questions as $question)
                <div class="card mb-3">
                    <div class="card-body">
                        @if ($question->correct_answer == $question->user_answer->answer)
                            <i class="fa-solid fa-check text-success"></i>
                        @else
                            <i class="fa-solid fa-xmark text-danger"></i>
                        @endif
                        <span class="fw-semibold span-text-hover">{{ $loop->iteration }}#</span>
                        What is the meaning of <span class="fw-bold span-text-hover">{{ $question->questionDetail->phrase_meaning }}</span> in Penang Hokkien?
                        <br>
                        @if ($question->question_with_media)
                            <img src="{{ asset($question->question_with_media) }}" alt="quizImage" class="img-fluid">
                        @endif
                        <div class="form-check">
                            @if ('answer1' == $question->correct_answer)
                                <i class="fa-solid fa-check text-success"></i>
                            @elseif('answer1' == $question->user_answer->answer)
                                <span class="span-text-hover text-muted fw-bolder">Selected Answer: </span>
                            @endif
                            <label class="form-check-label" for="{{ $question->id }}">
                                {{ $question->answer1Option->phrase_name }}
                            </label>
                        </div>
                        <div class="form-check">
                            @if ('answer2' == $question->correct_answer)
                                <i class="fa-solid fa-check text-success"></i>
                            @elseif('answer2' == $question->user_answer->answer)
                                <span class="span-text-hover text-muted fw-bolder">Selected Answer: </span>
                            @endif
                            <label class="form-check-label" for="{{ $question->id }}">
                                {{ $question->answer2Option->phrase_name }}
                            </label>
                        </div>
                        <div class="form-check">
                            @if ('answer3' == $question->correct_answer)
                                <i class="fa-solid fa-check text-success"></i>
                            @elseif('answer3' == $question->user_answer->answer)
                                <span class="span-text-hover text-muted fw-bolder">Selected Answer: </span>
                            @endif
                            <label class="form-check-label" for="{{ $question->id }}">
                                {{ $question->answer3Option->phrase_name }}
                            </label>
                        </div>
                    </div>
                </div>
            @endforeach
            <a class="btn btn-warning" href="{{ route('quiz.quizInfo', $phraseCategory->id) }}" role="button">Return To
                Quiz Info</a>
        </div>
    </div>
@endsection
