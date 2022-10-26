@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @foreach ($phraseCategory->questions->shuffle() as $question)
            <div class="card mb-3">
                <div class="card-body">
                    <form action="{{ route('quiz.quizResult',$question->phrase_category_id) }}" method="POST">
                        @csrf
                    <span class="fw-semibold span-text-hover">{{ $loop->iteration }}.</span>
                    What is the meaning of <span class="fw-bold span-text-hover">{{ $question->questionDetail->phrase_meaning }}</span> in Penang Hokkien?

                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="{{ $question->id }}" id="{{ $question->id }}" value="answer1" required>
                          <label class="form-check-label" for="{{ $question->id }}">
                            {{ $question->answer1Option->phrase_name }}
                          </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="{{ $question->id }}" id="{{ $question->id }}" value="answer2" required>
                            <label class="form-check-label" for="{{ $question->id }}">
                              {{ $question->answer2Option->phrase_name }}
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="{{ $question->id }}" id="{{ $question->id }}" value="answer3" required>
                            <label class="form-check-label" for="{{ $question->id }}">
                              {{ $question->answer3Option->phrase_name }}
                            </label>
                        </div>
                </div>

            </div>
            @endforeach
            <button type="submit" class="btn btn-primary">Submit Quiz</button>
        </form>
        <a class="btn btn-warning" href="{{ route('quiz.quizInfo', $phraseCategory->id) }}" role="button">Return To
            Quiz Info</a>
        </div>
    </div>
@endsection
