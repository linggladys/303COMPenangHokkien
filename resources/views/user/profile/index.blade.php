@extends('layouts.app')
@section('title', 'User Profile')
@section('content')
    <div class="container">
        <div class="row  justify-content-center">
            <div class="col-md-8">
                <div class="card align-items-center">
                    <div class="d-flex justify-content-center m-3">
                        @if ($userData->profile_image)
                            <img src="{{ asset('uploads/user_images/' . $userData->profile_image) }}" alt="user-image-profile"
                                class="w-25 img-fluid rounded-circle">
                        @else
                            <img src="{{ asset('assets/images/No-image-available.png') }}" alt="user-profile-image"
                                class="w-25 img-fluid rounded-circle">
                        @endif
                    </div>

                    <div class="btn-group mb-3" role="group" aria-label="Basic outlined example">
                        <button type="button" class="btn btn-outline-dark">59 friends</button>
                        <button type="button" class="btn btn-outline-dark">2 responses</button>
                    </div>

                    <div class="mb-3">
                        <h4 class=fw-bolder">{{ $userData->name }} <span
                                class="username-display fw-bold text-indigo-400">{{ $userData->username }}</span></h4>
                    </div>

                    <div class="mb-3">
                        <a href="{{ route('profile.edit') }}" class="btn btn-secondary">Edit Profile</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
