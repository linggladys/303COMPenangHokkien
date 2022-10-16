<?php

namespace App\Http\Controllers;

use App\Models\MemAid;
use App\Models\Phrase;
use Illuminate\Http\Request;

class UpvoteController extends Controller
{
    public function store(MemAid $memAid, Request $request)
    {
        // same as likes, if a user has upvoted the mem aid, the message will display
        if($memAid->upvotedBy($request->user())){
            return "You have already liked the phrase.";
        }

        $memAid->upvotes()->create([
            'user_id'=> $request->user()->id
        ]);
        // dd($memAid);
       return back()->withSuccess('The memory aid is added to the upvotes.');
    }

    public function destroy(MemAid $memAid, Request $request)
    {
        //go through the user in the upvotes relationship
        $request->user()->upvotes()->where('mem_aid_id',$memAid->id)->delete();
        // dd($memAid);
        return back()->withSuccess('The memory aid is removed from upvotes.');
    }
}
