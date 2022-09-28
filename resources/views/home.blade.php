@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <x-app-page-header>Halo {{ Auth::user()->name }}</x-app-page-header>
        </div>
    </div>

@endsection
