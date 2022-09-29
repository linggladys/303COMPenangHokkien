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
        $phraseTitle = PhraseCategory::select('phrase_category_name')->leftJoin('phrases','phrases.phrase_category_id','=','phrase_categories.id')->get();


        //  dd($phraseTitle);
         return view('phrases.index', [
             'phrases' => $phrases,
             'phraseTitle' => $phraseTitle,
         ]);
    }
}
