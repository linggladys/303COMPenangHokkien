@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <x-app-page-header>Halo, {{ Auth::user()->name }}</x-app-page-header>
                <div class="row">
                    <div class="col-md-3">
                        <div class="card bg-dark text-light mb-3">
                            <div class="card-body">
                                <h4><a href="{{ route('likedphraselist.likes') }}" class="text-decoration-none">Liked {{ Str::plural('phrase',$likes) }}</a>
                                </h4>
                                <hr>
                                <p class="card-text span-text-hover">{{ $likes }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card text-dark bg-indigo-100 mb-3">
                            <div class="card-body">
                                <h4 class="card-title">Amount of  {{ Str::plural('login',Auth::user()->amount_of_logins) }}</h4>
                                <hr>
                                <p class="card-text span-text-hover">{{ Auth::user()->amount_of_logins }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <h4>Most liked words from users</h4>
                    @foreach ($phrase as $phraseItem)
                    <div class="col-md-3 mb-3">
                        <div class="card bg-light text-center">
                          <div class="card-body">

                            <a href={{ route('phrases.show',['phraseCateogryId'=>$phraseItem->phrase_category_id,'phraseId'=>$phraseItem->id]) }} class="card-title text-decoration-none">{{ $phraseItem->phrase_name}}</a>
                            <p class="card-text small"><span class="fw-bolder">Liked by: </span>{{ $phraseItem->count_likes }}</p> {{ Str::plural('user',$phraseItem->count_likes) }}
                          </div>
                        </div>
                    </div>
                    @endforeach

                    <div class="col-md-6">

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
