@extends('layouts.app')
@section('title', 'Phrases')
@section('content')
    <div class="container">
        <div class="row">
            <div class="container">
                <x-app-page-header>Phrase Category</x-app-page-header>
                <div class="mb-3">
                  <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#phraseInstructionsModal">
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
                                        <a href="{{ route('phrases.index',$category->id) }}" class="btn btn-primary btn-custom ">Gia</a>
                                    </div>

                                </div>

                                <div class="card-body text-center">
                                    <span class="badge rounded-pill text-bg-secondary mb-2">Word Count: {{ count($category->phrases) }}</span>
                                    <h4 class="card-title fw-bolder">{{ $category->phrase_category_name }}</h4>
                                    <p class="card-text">{{ $category->phrase_category_description }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
@include('phraseCategory.instructions')
