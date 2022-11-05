
@extends('layouts.guest')
@section('title','Email Verifification Notification')
@section('guest-content')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                        <div class="card-body">
                            @if (session('resent'))
                                <div class="alert alert-success" role="alert">
                                    A fresh verification link has been sent to your email address during registration.
                                </div>
                            @endif

                            Before proceeding, could you verify your email address by clicking on the link we emailed to you? If you didn't receive the email, mm thang khaek khi, click the below link and we will generate another link for you!
                            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                                @csrf
                                <button type="submit" class="btn btn-link p-0 m-0 align-baseline">Click here to request another if email has not been received</button>.
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection


