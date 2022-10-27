@extends('layouts.app')
@foreach ($phrases as $phrase)
 @section('title', 'Learn Penang Hokkien - ' . $phrase->phraseCategory->phrase_category_name )
@endforeach
@section('content')
    <div class="container">
        <div class="row">
            <div class="table-responsive">
                <table class="table bg-light text-indigo-600">
                    <thead>
                        <tr>
                            <th scope="col">Phrase</th>
                            <th scope="col">Phrase Meaning</th>
                            <th scope="col">Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($phrases as $phrase)<tr>
                         <td scope="row">{{ $phrase->phrase_name }}</td>
                            <td>{{ $phrase->phrase_meaning }}</td>
                            <td>
                                <a href="{{ route('phrases.show',['phraseCateogryId'=>$phrase->phrase_category_id,'phraseId'=>$phrase->id]) }}" class="btn btn-primary">
                                    <i class="fa-solid fa-eye"></i>
                                    View Phrase Info
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>


    </div>
    </div>

@endsection
