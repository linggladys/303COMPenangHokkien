<?php

namespace App\Http\Controllers;

use App\Models\Phrase;
use Illuminate\Http\Request;
use App\Models\PhraseCategory;

class PhraseCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $phraseCategories = PhraseCategory::get();
        return view('phraseCategory.index',[
            'phraseCategories' => $phraseCategories,
        ]);
    }
}
