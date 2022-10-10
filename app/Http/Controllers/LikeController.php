<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Phrase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $likesResults = DB::select(DB::raw("SELECT COUNT(likes.phrase_id) AS count_likes, phrase_categories.phrase_category_name FROM likes LEFT JOIN phrases on likes.phrase_id = phrases.id LEFT JOIN phrase_categories ON phrases.phrase_category_id = phrase_categories.id LEFT JOIN users ON likes.user_id = users.id WHERE users.id = $userId GROUP BY phrase_categories.id;"));
        $data = "";
        foreach ($likesResults as $result)
        {
            $data.= " ['".$result->phrase_category_name."',    ".$result->count_likes."],";
        }
        $likesData = $data;

        return view('likes.index', [
            'likes' => $likes,
            'likesData' => $likesData
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
        return back()->withSuccess('Phrase has been successfully liked!');


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

        return back()->withSuccess('Phrase is removed from likes with success.');
    }
}
