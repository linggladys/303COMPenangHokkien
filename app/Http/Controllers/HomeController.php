<?php

namespace App\Http\Controllers;


use App\Models\Like;
use App\Models\MemAid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $userId = auth()->user()->id;

        // number of likes from authenticated users
        $likesCount = Like::with('user')->where('user_id',$userId)->count();

        // number of created memory aids from authenticated users
        $memAidsCount = MemAid::with('user')->where('user_id',$userId)->count();

        $phrase = DB::table('likes')
        ->select('phrases.phrase_name','phrases.id','phrase_categories.id as phrase_category_id', DB::raw('count(likes.id) as count_likes'))
        ->leftJoin('phrases', 'likes.phrase_id', '=', 'phrases.id')
        ->leftJoin('phrase_categories', 'phrases.phrase_category_id', '=', 'phrase_categories.id')
        ->groupBy('phrases.id')
        ->orderBy('count_likes','desc')
        ->take(4)
        ->get();

        // dd($phrase);
        return view('home',[
            'likesCount' => $likesCount,
            'phrase'=>$phrase,
            'memAidsCount' => $memAidsCount
        ]);
    }



}
