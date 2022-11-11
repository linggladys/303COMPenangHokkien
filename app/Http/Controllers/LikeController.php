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
        $likesResults = Like::select(DB::raw("COUNT(likes.phrase_id) AS count_likes"), DB::raw("phrase_categories.phrase_category_name"))
        ->leftJoin('phrases','likes.phrase_id', '=','phrases.id')
        ->leftJoin('phrase_categories','phrase_category_id','=','phrase_categories.id')
        ->leftJoin('users','likes.user_id', '=', 'users.id')
        ->where('users.id', $userId)
        ->groupBy('phrase_categories.id')
        ->get();
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
        return back()->withSuccess('You suka the phrase!');

    }

    public function destroy(Phrase $phrase, Request $request)
    {
        $request->user()->likes()->where('phrase_id',$phrase->id)->delete();

        return back()->withSuccess('You bo suka the phrase.');
    }
}
