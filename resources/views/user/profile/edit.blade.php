@extends('layouts.app')
@section('title', 'User Profile')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('profile.store') }}" enctype="multipart/form-data">
                        @csrf
                        <h5 class="card-title fw-bolder">
                            Edit User Profile
                        </h5>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="d-flex justify-content-center">
                                    <img src="{{ asset('assets/images/No-image-available.png') }}"
                                        alt="user-profile-image" id="showProfileImage" name="showProfileImage" class="w-25 img-fluid rounded-circle">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="profile_image" class="form-label">
                                         <i class="fa-solid fa-image-portrait">
                                    </i>
                                    Profile Image
                                </label>
                                    <input type="file" class="form-control" id="profile_image" name="profile_image" accept="image/*">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="{{ $userData->name }}" placeholder="Jane Doe" aria-describedby="emailHelp">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" class="form-control" id="username" name="username"
                                        value="{{ $userData->username }}" placeholder="janedoe"
                                        aria-describedby="emailHelp">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        value="{{ $userData->email }}" placeholder="janedoe@email.com"
                                        aria-describedby="emailHelp">
                                </div>
                            </div>
                            {{-- <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" name="password">
                                </div>
                            </div> --}}
                            <div class="d-flex justify-content-center gap-2">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="{{ route('profile.index') }}" class="btn btn-danger">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function () {
            $('#profile_image').change(function(event){
                var reader = new FileReader();
                reader.onload = function(event){
                    $('#showProfileImage').attr('src', event.target.result);
                }
                reader.readAsDataURL(event.target.files[0]);
            })
        });
</script>
@endsection
