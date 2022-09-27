<?php

namespace App\Http\Controllers;

use App\Models\Phrase;
use Illuminate\Http\Request;

class PhraseController extends Controller
{
    public function index($phraseCateogryId)
    {
        $phrases = Phrase::with('phraseCategory')->where('phrase_category_id',$phraseCateogryId)->paginate(1);

        //  dd($phrases);
         return view('phrases.index', [
             'phrases' => $phrases
         ]);
    }
}
