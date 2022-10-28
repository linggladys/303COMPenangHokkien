@extends('layouts.app')
@section('title', 'Drag and Drop')
@section('content')
    <div class="container">
        <x-app-page-header>Quiz</x-app-page-header>
        <div class="btn-group mb-3">
           <a class="btn btn-info" href="{{ route('quiz.quizStatistics') }}">
            <i class="fa-solid fa-chart-line"></i>
         View Quiz Result Statistics
        </a>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#quizInstructionsModal">
             <i class="fa-solid fa-info-circle"></i>
            View Instructions
        </button>
        </div>
        <div class="row">
            @foreach ($phraseCategories as $category)
                <div class="col-md-4 col-sm-6">
                    <div class="card bg-white mb-3">
                        <div class="image-container">

                            <img class="card-img-top d-block position-absolute"
                                src="{{ asset($category->phrase_category_image_cover) }}" alt="lesson-image">

                            <div class="d-flex justify-content-center">
                                <a href="{{ route('quiz.quizInfo', $category->id) }}"
                                    class="btn btn-primary btn-custom ">Quiz Info</a>
                            </div>

                        </div>

                        <div class="card-body text-center">
                            <h4 class="card-title fw-bolder">{{ $category->phrase_category_name }}</h4>
                            <p class="card-text">{{ $category->phrase_category_description }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
<!-- modal for instructions -->
@include('games.quiz.quiz_instructions')
