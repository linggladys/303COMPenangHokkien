@extends('layouts.app')
@section('title', 'Liked Phrases')
@section('content')
    <div class="container">
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                @forelse ($likes as $like)
                <thead>
                    <tr>
                        <th scope="col">Liked Phrases</th>
                        <th scope="col">Operations</th>

                    </tr>
                </thead>
                <tbody>

                        <tr class="">

                            <td scope="row">{{ $like->phrase_name }}</td>

                        </tr>
                    @empty
                    <img src="{{ asset('assets/images/frowned.png') }}" alt="notFound" class="mx-auto">
                        There's no likes. Make an initiave to like a phrase!
                    @endforelse




                </tbody>
            </table>
        </div>

    </div>
@endsection
