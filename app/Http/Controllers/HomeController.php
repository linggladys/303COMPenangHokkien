<?php

namespace App\Http\Controllers;

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

        $greeting = "";

        $time=time();

        $timezone = date("Asia/Kuala_Lumpur");

        if($time>="00" && $time<"12")
        {
            $greeting = "Good morning, ";
        }

        if($time>="12" && $time<"17")
        {
            $greeting = "Hello, ";
        }

        if($time>="17" && $time<"19")
        {
            $greeting = "Good evening, ";
        }

        if($time>="19")
        {
            $greeting = "Good night, ";
        }


        return view('home',compact('greeting'));
    }
}
