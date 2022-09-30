<?php

namespace App\Http\Controllers;

use App\Models\Phrase;
use Illuminate\Http\Request;
use App\Models\PhraseCategory;
use Illuminate\Support\Facades\DB;

class PhraseController extends Controller
{
    public function index($phraseCategoryId)
    {
        $phrases = Phrase::with('phraseCategory')->where('phrase_category_id',$phraseCategoryId)->paginate(1);
        //  dd($phraseTitle);
         return view('phrases.index', [
             'phrases' => $phrases,
         ]);
    }

    public function show($phraseId)
    {


        $phrases = Phrase::where('id',$phraseId)->get();


        return view('phrases.show',[
            'phrases'=>$phrases,
        ]);
    }


}
