@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <x-app-page-header>Ha lo, {{ Auth::user()->name }}</x-app-page-header>
                <div class="row">
                    <div class="col-md-3">
                        <div class="card bg-white bg-indigo-100 mb-3" data-bs-toggle="tooltip" data-bs-placement="bottom" title="How many phrases have you liked?">
                            <div class="card-body">
                                <h4 class="card-title span-text-hover">Liked {{ Str::plural('phrase',$likesCount) }}</h4>
                                <div class="d-flex justify-content-end">
                                    <i class="fa-solid fa-thumbs-up home-statistic-cards-icon"></i>
                               </div>
                                <hr>
                                <p class="card-text span-text-hover">{{ $likesCount }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card bg-white bg-indigo-100 mb-3" data-bs-toggle="tooltip" data-bs-placement="bottom" title="How many times have you logged in?">
                            <div class="card-body">
                                <h4 class="card-title span-text-hover">Amount of  {{ Str::plural('login',Auth::user()->amount_of_logins) }}</h4>
                                <div class="d-flex justify-content-end">
                                    <i class="fa-solid fa-sign-in-alt home-statistic-cards-icon"></i>
                               </div>
                                <hr>
                                <p class="card-text span-text-hover">{{ Auth::user()->amount_of_logins }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card bg-white bg-indigo-100 mb-3" data-bs-toggle="tooltip" data-bs-placement="bottom" title="How many memory aids have you created?">
                            <div class="card-body">
                                <h4 class="card-title span-text-hover">Created {{ Str::plural('memory aid',$memAidsCount) }}</h4>
                                <div class="d-flex justify-content-end">
                                     <i class="fa-solid fa-brain home-statistic-cards-icon"></i>
                                </div>

                                <hr>
                                <p class="card-text span-text-hover">{{ $memAidsCount }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <h4>Most liked words from users</h4>
                    @foreach ($phrase as $phraseItem)
                    <div class="col-md-3 mb-3">
                        <div class="card bg-white text-center">
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
