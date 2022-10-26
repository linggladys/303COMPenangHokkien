@extends('layouts.app')
@section('title', 'Drag and Drop')
@section('content')
    <div class="container">
        <div class="row">
            <div class="container">
                <x-app-page-header>Drag and Drop</x-app-page-header>
                <p class="lead small">Please pick a phrase category</p>
                <div class="row">
                    @foreach ($phraseCategories as $category)
                        <div class="col-md-4 col-sm-6">
                            <div class="card bg-white mb-3">
                                <div class="image-container">

                                    <img class="card-img-top d-block position-absolute"
                                        src="{{ asset($category->phrase_category_image_cover) }}" alt="lesson-image">

                                    <div class="d-flex justify-content-center">
                                        <!-- Hover added -->

                                        <a href="{{ route('draganddropphrase.index',$category->id) }}" class="btn btn-primary btn-custom ">Drag Via Phrase</a>
                                        <a href="{{ route('draganddropaudiomale.index',$category->id) }}" class="btn btn-primary btn-custom ">Drag Via Listening Pronunciation</a>
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
        </div>
    </div>
@endsection
