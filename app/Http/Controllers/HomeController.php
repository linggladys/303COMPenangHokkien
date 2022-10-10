<?php

namespace App\Http\Controllers;


use App\Models\Like;
use App\Models\Phrase;
use App\Models\User;
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
        $likes = Like::with('user')->where('user_id',$userId)->count();



        $phrase = DB::table('likes')
        ->select('phrases.phrase_name','phrases.id', DB::raw('count(likes.id) as count_likes'))
        ->leftJoin('phrases', 'likes.phrase_id', '=', 'phrases.id')
        ->groupBy('phrases.id')
        ->orderBy('count_likes','desc')
        ->take(4)
        ->get();

        // $loginDate = User::where('id',$userId)->value('last_login');

        $phraseId = Phrase::select('id')->get();
        // dd($loginDate);
        return view('home',[
            'likes' => $likes,
            'phrase'=>$phrase,

        ]);
    }


}
