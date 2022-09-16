@extends('layouts.app')
@section('title', 'Lessons')
@section('content')
<div class="container">
    <div class="row">
        @foreach ($lessons as $lesson)
            <div class="col-md-3 col-sm-6">
                <div class="card">
                    <div class="image-container">
                        @if($lesson->lesson_image_cover)
                       <img class="card-img-top d-block position-absolute"
                       src="{{ URL::to($lesson->lesson_image_cover) }}"
                       alt="lesson-image">
                        @else
                        <img class="card-img-top d-block position-absolute"
                        src="{{ asset('assets/images/No-image-available.png') }}" alt="placeholders" />
                        @endif
                            <div class="d-flex justify-content-center">
                                <a href="#" class="btn btn-primary btn-custom ">Gia!</a>
                            </div>

                    </div>

                    <div class="card-body text-center">
                        <span class="badge rounded-pill text-bg-secondary">Words: 0</span>
                        <h4 class="card-title fw-bolder">{{ $lesson->lesson_name }}
                        </h4>
                        <p class="card-text">{{ $lesson->lesson_description }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
