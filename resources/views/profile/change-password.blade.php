@extends('layouts.app')
@section('title', 'User Profile Password Change')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('profile.updatePassword') }}">
                        @csrf
                        <h5 class="card-title fw-bolder">
                            User Password Change Page
                        </h5>
                        @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="fa-solid fa-face-frown" style="font-size: 24pt"></i>
                            @foreach ($errors->all() as $error)
                            <ul>
                               <li>{{ $error }}</li>
                            </ul>
                            @endforeach
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                        <div class="mb-3">
                            <label for="old_password" class="form-label">Current Password</label>
                            <input type="password" class="form-control" id="old_password" name="old_password" value="{{ old('old_password') }}">
                        </div>

                        <div class="mb-3">
                            <label for="new_password" class="form-label">New Password</label>
                            <input type="password" class="form-control" id="new_password" name="new_password">
                        </div>


                        <div class="mb-3">
                            <label for="confirm_password" class="form-label">Reconfirm New Password</label>
                            <input type="password" class="form-control" id="confirm_password" name="confirm_password">
                        </div>

                        <div class="d-flex justify-content-center gap-2">
                            <button type="submit" class="btn btn-primary">Update Password</button>
                            <a href="{{ route('profile.index') }}" class="btn btn-danger">Cancel</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
