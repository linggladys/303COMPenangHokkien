@extends('layouts.app')
@section('title', 'User Profile Password Change')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <x-app-page-header>OTP Verfication</x-app-page-header>
                <div class="card bg-white">
                    <div class="card-header">Please Enter The Provided OTP From Your Email.</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('profile.validateOTP') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="otp" class="col-md-4 col-form-label text-md-end">OTP</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('otp') is-invalid @enderror" name="otp" required
                                        autocomplete="new_password">

                                    @error('otp')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Confirm OTP') }}
                                    </button>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
