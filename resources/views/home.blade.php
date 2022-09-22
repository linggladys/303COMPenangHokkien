@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <x-page-header>Halo {{ Auth::user()->name }}</x-page-header>
        </div>
    </div>

@endsection
