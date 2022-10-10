@extends('layouts.app')
@foreach ($phrases as $phrase)
    @section('title', 'Memory Aids for ' . $phrase->phrase_name)
@endforeach

@section('content')
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fa-solid fa-face-smile" style="font-size: 18pt"></i>
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @elseif(session('failures'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fa-solid fa-face-frown" style="font-size: 18pt"></i>
                {{ session('failures') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @foreach ($phrases as $phrase)
            <x-app-page-header>Memory Aids for {{ $phrase->phrase_name }}</x-app-page-header>
        @endforeach
        <div class="row justify-content-center">
            <div class="col-md-12">
                @forelse ($phrase->memoryAid as $memoryAid)
                    <div class="card border-primary p-3 mb-3">
                        <p class="card-text">
                        @if ($memoryAid->user->profile_image)
                        <img src="{{ asset('uploads/user_images/' .$memoryAid->user->profile_image) }}" alt="user-image-profile" class="icon-avatar" title="{{ $memoryAid->user->username }}'s profile pic"/>
                        @else
                        <img src="{{ asset('assets/images/user.png') }}" alt="user-image-profile-unavailable" class="icon-avatar">
                        @endif
                       {{ $memoryAid->user->username}}</p>
                       {{ $memoryAid->memory_aid_content }}
                        <hr>
                        <p class="card-text">
                            <span class="fw-bold">Created:</span> {{ date('d-m-Y', strtotime($memoryAid->created_at)) }}
                            at {{ date('g:i A', strtotime($memoryAid->created_at)) }}


                        </p>
                    </div>
                @empty
                    <img src="{{ asset('assets/images/frowned.png') }}" alt="notFound">
                    It is empty here.
                    <a href="{{ route('memaid.create', $phrasesoloId) }}" class="btn btn-secondary">Create a memory aid</a>
                @endforelse
            </div>

            <hr>
            @forelse ($userMemAids as $userMemAid)
            <x-app-page-header>User Created Memory Aids
                <div class="d-flex justify-content-start">
                     <a href="{{ route('memaid.create', $phrasesoloId) }}" class="btn btn-secondary ">
                        <i class="fa-solid fa-plus"></i>
                        Create a memory aid
                    </a>
                </div>
            </x-app-page-header>

                <div class="card mb-3">
                    <div class="card-body">
                        {{ $userMemAid->memory_aid_content }}
                        <div class="btn-group">
                            <a class="btn btn-warning" href="{{ route('memaid.edit', $userMemAid->phrase_id) }}"
                                role="button">
                                <i class="fa-solid fa-pencil"></i>
                                Edit
                            </a>
                            <form action="{{ route('memaid.destroy', $userMemAid->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Are you sure of this action?');" role="button">
                                    <i class="fa-solid fa-trash-can"></i>
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                @empty
                No user created memory aids available
            @endforelse

        </div>
    </div>

    </div>

@endsection