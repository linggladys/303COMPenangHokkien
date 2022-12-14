@extends('layouts.app')
@section('title', 'User Profile')
@section('content')
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fa-solid fa-face-smile custom-icon-size"></i>
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @elseif(session('failures'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fa-solid fa-face-frown custom-icon-size"></i>
                {{ session('failures') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card bg-white align-items-center">
                    <div class="d-flex justify-content-center m-3">
                        @if ($userData->profile_image)
                            <img src="{{ asset('storage/images/'.$userData->profile_image) }}"
                                alt="user-image-profile" class="rounded-circle" id="showProfileImage"
                                title="{{ auth()->user()->username }}'s profile pic">
                        @else
                            <img src="{{ asset('assets/images/user.png') }}" alt="user-profile-image"
                                class="img-fluid">
                        @endif
                    </div>

                    <div class="mb-1 span-text-hover">
                        <h4 data-bs-toggle="tooltip" data-bs-placement="right" title="My name is"> Wa mia <span class="fw-bolder text-indigo-400">{{ $userData->name }}
                            </span></h4>
                            @if($userData->last_login)
                            <p class="fw-bolder small">Last logged in: <span
                                class="fw-lighter">{{ date('d-m-Y, H:i', strtotime($userData->last_login)) }}</span></p>
                            @else
                            <p class="fw-bolder small">Last logged in: <span
                                class="fw-lighter">N/A</span></p>
                            @endif

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
