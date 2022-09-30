<?php

namespace App\Http\Controllers;

use App\Models\Phrase;
use App\Models\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = auth()->user()->id;
        $likes = Like::where('user_id',$userId)->get();
        // dd($likes);
        return view('likes.index', [
            'likes' => $likes,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Phrase $phrase, Request $request)
    {
        // if the user already liked the phrase, he/she will receive the message
        if($phrase->likedBy($request->user())){
            return "You have already liked the phrase.";
        }

        // display likes
        $phrase->likes()->create([
            'user_id'=>$request->user()->id
        ]);
        return back()->withSuccess('You liked the phrase, hua hee!');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Phrase $phrase, Request $request)
    {
        $request->user()->likes()->where('phrase_id',$phrase->id)->delete();

        return back()->withFailure('You disliked the phrase, kek sim.');
    }
}
