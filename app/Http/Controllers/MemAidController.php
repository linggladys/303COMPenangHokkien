<?php

namespace App\Http\Controllers;

use App\Models\MemAid;
use App\Models\Phrase;
use App\Models\PhraseCategory;
use Illuminate\Http\Request;


class MemAidController extends Controller
{
    public function index($phraseId)
    {
        $userId = auth()->user()->id;
        $phrases = Phrase::with('memoryAid')->where('id',$phraseId)->get();
        $phrasesoloId = Phrase::with('phraseCategory')->where('id',$phraseId)->find($phraseId);
        $userMemAids= MemAid::with('user')->where('phrase_id',$phraseId)->where('user_id',$userId)->get();
        // dd($phrasesoloId);
        return view('memAid.index',[
            'phrases' => $phrases,
            'userMemAids'=>$userMemAids,
            'phrasesoloId'=>$phrasesoloId
        ]);
    }


    public function create($phraseId)
    {
        $phrase = Phrase::with('memoryAid')->find($phraseId);
        // dd($phrase);
        return view('memAid.create',[
            'phrase'=>$phrase
        ]);
    }

    public function upload(Request $request)
    {
        if($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = uniqid().'_'.time().'.'.$extension;
            $request->file('upload')->move(public_path('storage/images'), $fileName);
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('storage/images/'.$fileName);
            $message = 'Image has uploaded with success! 😊';
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$message')</script>";

            @header('Content-type: text/html; charset=utf-8');
            echo $response;
        }

    }

    public function store($phraseId, Request $request)
    {
        // $phrase = Phrase::find('id');
        $request->validate([
            'memory_aid_content' => 'required',
        ]);

        MemAid::create([
            'user_id'=>auth()->user()->id,
            'phrase_id'=>$phraseId,
            'memory_aid_content' => $request->input('memory_aid_content'),
        ]);

        $phraseSoloId = Phrase::with('phraseCategory')->where('id',$phraseId)->find($phraseId);
        // dd('test');

        return redirect(route('phrases.show',['phraseCateogryId'=>$phraseSoloId->phrase_category_id,'phraseId'=>$phraseId]))->withSuccess('Memory aid created with success!');
    }

    public function edit($phraseId, $memAidId)
    {
        $memoryAids = MemAid::with('phrase')->where('phrase_id',$phraseId)->where('id',$memAidId)->get();
        // dd($memoryAids);
        return view('memAid.edit',[
            'memoryAids'=>$memoryAids
        ]);
    }

    public function update(Request $request, $memAidId)
    {
        // $phraseId = Phrase::find('phrases.id');
        $memAid = MemAid::find($memAidId);
        $memAid->memory_aid_content = $request->input('memory_aid_content');
        $memAid->update();
        // dd($phraseId);

        return redirect(route('memaid.index',$memAid->phrase_id))->withSuccess('Memory aid modified with success!');
    }

    public function destroy($memAidId)
    {
        MemAid::find($memAidId)->delete();
        // dd($memAidId);
        return redirect()->back()->withSuccess('Memory aid removed with success!');
    }
}
