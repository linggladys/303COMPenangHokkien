@extends('layouts.app')
@section('title', 'Welcome')
@section('content')
    <div class="container">
        <div class="position-absolute top-50 start-50 translate-middle">
        @if (Route::has('login'))
            <div class="gap-3">
                @auth
                    <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                    @endif
                @endauth
            </div>
        @endif
    </div>
    </div>

@endsection
