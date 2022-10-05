<?php

use App\Http\Controllers\GameController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\MemAidController;
use App\Http\Controllers\PhraseCategoryController;
use App\Http\Controllers\PhraseController;
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

    Route::get('/phrase',[PhraseCategoryController::class,'index'])->name('phrasesCategory.index');
    Route::get('/phraseCategory/{phraseCategoryId}',[PhraseCategoryController::class,'show'])->name('phrasesCategory.show');


    Route::get('/liked-phrases',[LikeController::class,'index'])->name('likedphraselist.likes');
    Route::post('/phrase/{phrase}/word/likes',[LikeController::class,'store'])->name('phrases.likes');
    Route::delete('/phrase/{phrase}/word/likes',[LikeController::class,'destroy'])->name('phrase.likes');

    Route::get('/memory-aid/{id}',[MemAidController::class,'index'])->name('memoryaid.index');
});

Route::get('games',GameController::class);

