@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card bg-light">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    {{ $greeting }}{{ Auth::user()->username}}
                </div>
            </div>
        </div>

    </div>
@endsection
