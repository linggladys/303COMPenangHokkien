@extends('layouts.app')
@foreach ($phrases as $phrase)
    @section('title', 'Memory Aids for ' . $phrase->phrase_name)
@endforeach

@section('content')
    <div class="container">
        <div class="mb-3">
            <a href="{{ route('phrases.show',['phraseCateogryId'=>$phrasesoloId->phrase_category_id,'phraseId'=>$phrasesoloId->id]) }}" class="btn btn-warning">
                <i class="fa-solid fa-long-arrow-left"></i>
                Return to {{ $phrasesoloId->phrase_name }}
            </a>
        </div>
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
                                <img src="{{ asset('uploads/user_images/' . $memoryAid->user->profile_image) }}"
                                    alt="user-image-profile" class="icon-avatar"
                                    title="{{ $memoryAid->user->username }}'s profile pic" />
                            @else
                                <img src="{{ asset('assets/images/user.png') }}" alt="user-image-profile-unavailable"
                                    class="icon-avatar">
                            @endif
                            <span class="span-text-hover">
                                {{ $memoryAid->user->username }}
                                @if ($memoryAid->user->email_verified_at)
                                <i class="fa-solid fa-circle-check text-success" title="Verified Account"></i>
                            @endif
                            </span>
                        </p>
                        {!! $memoryAid->memory_aid_content !!}
                        <div class="d-flex justify-content-end">
                            <div class="btn-group" role="group">
                                <button disabled="disabled"
                                    class="btn btn-info">{{ $memoryAid->upvotes()->count() }}</button>
                                <button disabled="disabled" class="btn btn-outline-info">
                                    <i class="fa-solid fa-caret-up"></i>
                                    {{ Str::plural('upvote', $memoryAid->upvotes()->count()) }}
                                </button>
                            </div>
                        </div>

                        <hr>
                        <p class="card-text">
                            <span class="fw-bold">Created:</span> {{ date('d-m-Y', strtotime($memoryAid->created_at)) }}
                            at {{ date('g:i A', strtotime($memoryAid->created_at)) }}
                        <div class="d-flex justify-content-end gap-2">
                            @if (!$memoryAid->upvotedBy(auth()->user()))
                                <form action="{{ route('memaid.upvotes', $memoryAid->id) }}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Upvote</button>
                                </form>
                            @else
                                <form action="{{ route('memaid.upvotes', $memoryAid->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Remove from Upvotes</button>
                                </form>
                            @endif
                        </div>
                        </p>
                    </div>
                @empty
                    <img src="{{ asset('assets/images/frowned.png') }}" alt="notFound">
                    It is empty here.
                @endforelse
            </div>

            <hr>

            <x-app-page-header>User Created Memory Aid
            </x-app-page-header>
            @forelse ($userMemAids as $userMemAid)
                <div class="card mb-3">
                    <div class="card-body">
                        {!! $userMemAid->memory_aid_content !!}
                        <div class="btn-group" role="group">
                            <a class="btn btn-warning"
                                href="{{ route('memaid.edit', ['phraseId' => $userMemAid->phrase_id, 'memAidId' => $userMemAid->id]) }}"
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
                <a href="{{ route('memaid.create', $phrasesoloId) }}" class="btn btn-secondary ">
                    <i class="fa-solid fa-plus"></i>
                    Create a memory aid
                </a>
            @endforelse

        </div>
    </div>

    </div>

@endsection
