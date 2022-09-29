@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <x-app-page-header>Halo {{ Auth::user()->name }}</x-app-page-header>
            <div class="row">
                <div class="col-md-3">
                    <div class="card text-white bg-primary mb-3">
                        <div class="card-body">
                            <h4 class="card-title">Liked Phrases</h4>
                            <hr>
                            <p class="card-text">{{ $likes }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-white bg-indigo-400 mb-3">
                        <div class="card-body">
                            <h4 class="card-title">Responses</h4>
                            <hr>
                            <p class="card-text">3</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
