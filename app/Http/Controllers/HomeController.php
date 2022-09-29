<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;

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
        $likes = Like::with('user')->where('user_id',$userId)->count();
        return view('home',[
            'likes' => $likes
        ]);
    }


}
