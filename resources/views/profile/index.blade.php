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
        @elseif(session('failures'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fa-solid fa-face-frown" style="font-size: 18pt"></i>
                {{ session('failures') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card bg-white align-items-center">
                    <div class="d-flex justify-content-center m-3">
                        @if ($userData->profile_image)
                            <img src="{{ asset('uploads/user_images/' . $userData->profile_image) }}"
                                alt="user-image-profile" class="rounded-circle" id="showProfileImage" title="{{ auth()->user()->username }}'s profile pic">
                        @else
                            <img src="{{ asset('assets/images/user.png') }}" alt="user-profile-image"
                                class="img-fluid img-thumbnail">
                        @endif
                    </div>

                    <div class="mb-3">
                        <h4 class=fw-bolder">{{ $userData->name }} <span class="username-display fw-bold text-indigo-400">
                                {{ $userData->username }}
                            </span></h4>
                        <p class="fw-bolder small">Last logged in: <span
                                class="fw-lighter">{{ date('d-m-Y, H:i', strtotime($userData->last_login)) }}</span></p>
                    </div>

                    <div class="mb-3 btn-group" role="group">
                        <a href="{{ route('profile.edit') }}" class="btn btn-secondary">
                            <i class="fa-solid fa-pencil"></i>
                            Edit Profile
                        </a>
                        <a href="{{ route('profile.changePassword') }}" class="btn btn-dark">
                            <i class="fa-solid fa-key"></i>
                            Edit Password
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
