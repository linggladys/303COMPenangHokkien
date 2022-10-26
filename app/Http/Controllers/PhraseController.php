<?php

namespace App\Http\Controllers;

use App\Models\MemAid;
use App\Models\Phrase;
use Illuminate\Http\Request;
use App\Models\PhraseCategory;
use App\Models\SelectedMemAid;
use App\Models\Upvote;
use Illuminate\Support\Facades\DB;

class PhraseController extends Controller
{
    public function index($phraseCategoryId)
    {
        $phrases = Phrase::with('phraseCategory')->where('phrase_category_id',$phraseCategoryId)->get();

         return view('phrases.index', [
             'phrases' => $phrases,
         ]);
    }


    public function show($phraseCategoryId,$phraseId)
    {
        $phrases = Phrase::where('id',$phraseId)->where('phrase_category_id',$phraseCategoryId)->get();
        $memoryAids = MemAid::where('phrase_id',$phraseId)->where('user_id',auth()->user()->id)->take(1)->get();
        return view('phrases.show',[
            'phrases'=>$phrases,
            'memoryAids'=>$memoryAids
        ]);
    }


}
