<?php

use App\Http\Controllers\DragandDropController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\MemAidController;
use App\Http\Controllers\PhraseCategoryController;
use App\Http\Controllers\PhraseController;
use App\Http\Controllers\UpvoteController;
use App\Http\Controllers\User\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify'=>true]);

Route::name('auth.resend_confirmation')->get('/register/confirm/resend', 'Auth\RegisterController@resendConfirmation');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware(['verified']);

Route::group(['middleware'=>['auth','verified'],'prefix'=>'user'],function(){
    Route::get('phrase/{phraseId}',[PhraseController::class,'show'])->name('phrases.show');
    Route::get('/phrase/{phraseCateogryId}/word/',[PhraseController::class,'index'])->name('phrases.index');

    Route::get('/profile/index',[ProfileController::class,'index'])->name('profile.index');
    Route::get('/profile/edit',[ProfileController::class,'edit'])->name('profile.edit');
    Route::post('/profile/store',[ProfileController::class,'store'])->name('profile.store');

    Route::get('/profile/change-password',[ProfileController::class,'changePassword'])->name('profile.changePassword');
    Route::post('/profile/change-password',[ProfileController::class,'updatePassword'])->name('profile.updatePassword');

    Route::get('phrase',[PhraseCategoryController::class,'index'])->name('phrasesCategory.index');
    Route::get('phraseCategory/{phraseCategoryId}',[PhraseCategoryController::class,'show'])->name('phrasesCategory.show');

    Route::get('/liked-phrases',[LikeController::class,'index'])->name('likedphraselist.likes');
    Route::post('/phrase/{phrase}/word/likes',[LikeController::class,'store'])->name('phrases.likes');
    Route::delete('/phrase/{phrase}/word/likes',[LikeController::class,'destroy'])->name('phrase.likes');

    Route::get('phrase/{phraseId}/memory-aid/',[MemAidController::class,'index'])->name('memaid.index');
    Route::get('phrase/{phraseId}/memory-aid/create',[MemAidController::class,'create'])->name('memaid.create');
    Route::post('phrase/memory-aid/upload',[MemAidController::class,'upload'])->name('memaidPic.upload');
    Route::post('phrase/{phraseId}/memory-aid/store',[MemAidController::class,'store'])->name('memaid.store');
    Route::get('phrase/{phraseId}/memory-aid/edit/{memAidId}',[MemAidController::class,'edit'])->name('memaid.edit');
    Route::put('phrase/{phraseId}/memory-aid/update',[MemAidController::class,'update'])->name('memaid.update');
    Route::delete('phrase/{phraseId}/memory-aid/delete',[MemAidController::class,'destroy'])->name('memaid.destroy');

    Route::get('phrase/games/draganddrop',[DragandDropController::class,'index'])->name('draganddrop.index');
    Route::get('phrase/games/draganddropbyphrase/{phraseCategoryId}',[DragandDropController::class,'dragByPhrase'])->name('draganddropphrase.index');
    Route::get('phrase/games/draganddropbyaudio-male/{phraseCategoryId}',[DragandDropController::class,'dragByAudioMale'])->name('draganddropaudiomale.index');
    Route::get('phrase/games/draganddropbyaudio-female/{phraseCategoryId}',[DragandDropController::class,'dragByAudioFemale'])->name('draganddropaudiofemale.index');

    Route::post('/memory-aid/{memAid}/upvotes',[UpvoteController::class,'store'])->name('memaid.upvotes');
    Route::delete('/memory-aid/{memAid}/upvotes',[UpvoteController::class,'destroy'])->name('memaid.upvotes');

});

Route::get('games',GameController::class);

