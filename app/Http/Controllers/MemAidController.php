<?php

namespace App\Http\Controllers;

use App\Models\MemAid;
use Illuminate\Http\Request;

class MemAidController extends Controller
{
    public function index($wordId)
    {
        $memAid = MemAid::with('phrase')->find($wordId);
        return view('memaid.index',compact('memAid'));
    }
}
