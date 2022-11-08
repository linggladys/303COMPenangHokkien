@extends('layouts.app')
@section('title', 'User Profile')
@section('content')
<div class="container">
   <div class="row justify-content-center">
        <div class="col-md-6">
            <x-app-page-header>Edit User Profile</x-app-page-header>
            <div class="card">
                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        @foreach ($errors->all() as $error)
                        <ul>
                          <li>{{ $error }}</li>
                        </ul>
                        @endforeach
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                    <form method="POST" action="{{ route('profile.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="d-flex justify-content-center mb-3">
                                    @if($userData->profile_image)
                                    <img src="{{ asset('storage/images/'.$userData->profile_image) }}"
                                        alt="user-profile-image" id="showProfileImage" name="showProfileImage" class="rounded-circle">
                                    @else
                                    <img src="{{ asset('assets/images/user.png') }}"
                                        alt="user-profile-image" id="showProfileImage" name="showProfileImage" class="rounded-circle">
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="profile_image" class="form-label">
                                    Profile Image
                                </label>
                                    <input type="file" class="form-control" id="profile_image" name="profile_image" accept="image/*">
                                </div>
                            </div>


                                <div class="input-group mb-3">
                                    <span for="name" class="input-group-text span-text-hover">Name</span>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="{{ $userData->name }}" placeholder="Jane Doe" aria-describedby="nameHelp" required>
                                </div>

                                <div class="input-group mb-3">
                                    <span for="username" class="input-group-text span-text-hover">Username</span>
                                    <input type="text" class="form-control" id="username" name="username"
                                        value="{{ $userData->username }}" placeholder="janedoe"
                                        aria-describedby="usernameHelp"required>
                                </div>
                            <div class="d-flex justify-content-center gap-2">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa-solid fa-arrow-up"></i>
                                    Update User Profile
                                </button>
                                <a href="{{ route('profile.index') }}" class="btn btn-danger">
                                    <i class="fa-solid fa-xmark"></i>
                                    Cancel
                                </a>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

    @push('scripts')
       <script type="module">

            $('#profile_image').change(function(event){
                var reader = new FileReader();
                reader.onload = function(event){
                    $('#showProfileImage').attr('src', event.target.result);
                }
                reader.readAsDataURL(event.target.files[0]);
            })

</script>
    @endpush

@endsection
