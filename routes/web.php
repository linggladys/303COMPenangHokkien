<?php

use App\Http\Controllers\User\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify'=>true]);

Route::name('auth.resend_confirmation')->get('/register/confirm/resend', 'Auth\RegisterController@resendConfirmation');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware(['verified']);

Route::group(['middleware'=>['auth','verified'],'prefix'=>'user/profile'],function(){
    Route::get('index',[ProfileController::class,'index'])->name('profile.index');
    Route::get('edit',[ProfileController::class,'edit'])->name('profile.edit');
    Route::post('store',[ProfileController::class,'store'])->name('profile.store');

    Route::get('change-password',[ProfileController::class,'changePassword'])->name('profile.changePassword');
    Route::post('change-password',[ProfileController::class,'updatePassword'])->name('profile.updatePassword');

});

