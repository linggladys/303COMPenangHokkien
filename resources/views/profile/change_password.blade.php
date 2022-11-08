@extends('layouts.app')
@section('title', 'User Profile Password Change')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <x-app-page-header>Edit Password</x-app-page-header>
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('profile.updatePassword') }}">
                        @csrf
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

                    @if(session('failures'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="fa-solid fa-face-frown custom-icon-size"></i>
                        {{ session('failures') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                        <div class="mb-3 input-group">
                            <span class="input-group-text" for="old_password">Current Password</span>
                            <input type="password" class="form-control" id="old_password" name="old_password" value="{{ old('old_password') }}" required>
                        </div>

                        <div class="mb-3 input-group">
                            <span for="new_password" class="input-group-text">New Password</span>
                            <input type="password" class="form-control" id="new_password" name="new_password" required>
                        </div>


                        <div class="mb-3 input-group">
                            <span for="confirm_password" class="input-group-text">Reconfirm New Password</span>
                            <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                        </div>

                        <div class="d-flex justify-content-center gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa-solid fa-arrow-up"></i>
                                Update Password
                            </button>
                            <a href="{{ route('profile.index') }}" class="btn btn-danger">
                                <i class="fa-solid fa-xmark"></i>
                                Cancel
                            </a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
