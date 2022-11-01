@extends('layouts.app')
@section('title', 'Welcome')
@section('content')
    <div class="container">
        <div class="row">
            <x-app-auth-card>
                @if (Route::has('login'))

                @auth
                <div class="text-center my-5">
                      <a href="{{ url('/home') }}" class="btn btn-dark">
                        <i class="fa-solid fa-house"></i>
                        Click to redirect to the home page.
                    </a>
                </div>

                @else
                    <div class="d-flex justify-content-center">
                        <x-app-logo></x-app-logo>
                    </div>
                    <h5 class="text-center">Ha lo, welcome to Ok Learn Penang Hokkien App.</h5>

                    <div class="btn-group mb-5" role="group">
                       <a href="{{ route('login') }}" class="btn btn-primary">Registered user? Login then.</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="btn btn-secondary">New user? Sign up first.</a>
                    @endif
                    </div>

                @endauth

        @endif
            </x-app-auth-card>

        </div>
    </div>

@endsection
