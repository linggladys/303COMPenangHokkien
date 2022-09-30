@extends('layouts.app')
@section('title', 'Liked Phrases')
@section('content')
    <div class="container">
        <div class="table-responsive">
            <table class="table table-striped table-bordered">

                <thead>
                    <tr>
                        <th scope="col">Liked Phrases</th>
                        <th scope="col">Operations</th>

                    </tr>
                </thead>
                <tbody>
                @forelse ($likes as $like)
                        <tr class="">
                            {{-- {{ $like->phrase->phraseCategory->id }} --}}

                            <td scope="row">{{ $like->phrase->phrase_name}}</td>
                            <td>
                                {{-- {{ $like->phrase }} --}}
                                <form action="{{ route('phrase.likes',$like->phrase_id)}}" method="post">
                                    <a href="{{ route('phrases.show',$like->phrase_id) }}" class="btn btn-primary">
                                        <i class="fa-solid fa-eye"></i>
                                        View
                                    </a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure of this action?');">
                                    <i class="fa-solid fa-trash-can"></i>
                                    Remove from Likes
                                </button>
                                </form>
                            </td>

                        </tr>
                </tbody>

                    @empty
                    <img src="{{ asset('assets/images/frowned.png') }}" alt="notFound" class="mx-auto">
                        There is no likes. Make an initiave to like a phrase!
                    @endforelse

  </table>


        </div>

    </div>
@endsection
