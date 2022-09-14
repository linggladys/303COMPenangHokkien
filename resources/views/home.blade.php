@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="display-6">Halo {{ Auth::user()->name }}</h1>
        </div>
    </div>

@endsection
