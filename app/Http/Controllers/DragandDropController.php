<?php

namespace App\Http\Controllers;

use App\Models\Phrase;
use Illuminate\Http\Request;
use App\Models\PhraseCategory;

class DragandDropController extends Controller
{
    public function index()
    {

        $phraseCategories = PhraseCategory::get();
        // dd($phraseCategoryId);
        return view('games.draganddrop.draganddrop_index',[
            'phraseCategories' => $phraseCategories,

        ]);
    }


    public function dragByPhrase($phraseCategoryId)
    {
        $phrases = Phrase::where("phrase_category_id",$phraseCategoryId)->inRandomOrder()->limit(10)->get();
        // dd($phrases);
        return view('games.draganddrop.draganddrop_phrase',[
            'phrases'=>$phrases
        ]);
    }

    public function dragByAudioMale($phraseCategoryId)
    {
        $phrases = Phrase::where("phrase_category_id",$phraseCategoryId)->inRandomOrder()->limit(10)->get();
        // dd($phrases);
        $phraseId = Phrase::where("phrase_category_id",$phraseCategoryId)->value('phrase_category_id');
        // dd($phraseId);
        return view('games.draganddrop.draganddrop_audiomatch_male',[
            'phrases'=>$phrases,
            'phraseId'=>$phraseId
        ]);
    }

    public function dragByAudioFemale($phraseCategoryId)
    {
        $phrases = Phrase::where("phrase_category_id",$phraseCategoryId)->inRandomOrder()->limit(10)->get();
        $phraseId = Phrase::where("phrase_category_id",$phraseCategoryId)->value('phrase_category_id');
        return view('games.draganddrop.draganddrop_audiomatch_female',[
            'phrases'=>$phrases,
            'phraseId'=>$phraseId
        ]);
    }
}
