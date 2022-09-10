@extends('layouts.app')
@section('title', 'User Profile')
@section('content')
    <div class="container">
        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fa-solid fa-face-smile" style="font-size: 18pt"></i>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card align-items-center">
                    <div class="d-flex justify-content-center m-3">
                        @if ($userData->profile_image)
                            <img src="{{ asset('uploads/user_images/' . $userData->profile_image) }}" alt="user-image-profile"
                                class="w-25 img-fluid img-thumbnail">
                        @else
                            <img src="{{ asset('assets/images/user.png') }}" alt="user-profile-image"
                                class="img-fluid rounded-circle">
                        @endif
                    </div>

                    <div class="btn-group mb-3" role="group" aria-label="Basic outlined example">
                        <button type="button" class="btn btn-outline-dark">59 friends</button>
                        <button type="button" class="btn btn-outline-dark">2 responses</button>
                    </div>

                    <div class="mb-3">
                        <h4 class=fw-bolder">{{ $userData->name }} <span
                                class="username-display fw-bold text-indigo-400">
                                {{ $userData->username }}
                            </span></h4>
                    </div>

                    <div class="mb-3">
                        <a href="{{ route('profile.edit') }}" class="btn btn-secondary">
                            <i class="fa-solid fa-pencil"></i>
                            Edit Profile
                        </a>
                        <a href="{{ route('profile.changePassword') }}" class="btn btn-dark">
                            <i class="fa-solid fa-key"></i>
                            Change Password
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
