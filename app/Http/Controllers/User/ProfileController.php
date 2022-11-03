<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\SendOtp;
use App\Models\EmailOtp;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id;
        $userData = User::find($id);
        return view('profile.index',compact('userData'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = Auth::user()->id;
        $userData = User::find($id);

        // validation
        $request->validate([
            'profile_image' =>'nullable|image|mimes:jpg,png,gif,jpeg|max:2048'
        ]);

        $userData->name = $request->name;
        $userData->username = $request->username;

        if($request->file('profile_image')){
            $file = $request->file('profile_image');

            $filename = date('YmdHi').'.'.$file->getClientOriginalExtension();
            $file->move(public_path('uploads/user_images'),$filename);
            $userData['profile_image'] = $filename;
        }

        $userData->save();

        return redirect(route('profile.index'))->withSuccess('User Profile Edited With Success! ');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $id = Auth::user()->id;
        $userData = User::find($id);
        return view('profile.edit',compact('userData'));
    }

    public function changePassword()
    {
        return view('profile.change_password');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:8',
            'confirm_password' => 'required|same:new_password',
        ]);

        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->old_password, $hashedPassword))
        {
            $users = User::find(Auth::id());
            // access users password
            $users->password = bcrypt($request->new_password);
            // OTP create around 2 to 4 digits
            $otp = rand(10,9999);

            EmailOtp::create([
                'user_id' =>auth()->user()->id,
                'otp'=>$otp
            ]);

            session(['new_password' => $request->new_password]);
            if(Mail::to(auth()->user()->email)->send(new SendOtp($otp))){
                return redirect(route('profile.confirmOTP'));
            }else{
                return abort(404);
            }

            $users->save();

            return redirect(route('profile.index'))->withSuccess('User Password Edited With Success! ');
        }else{
            return redirect(route('profile.changePassword'))->withFailures('Oops, the current password is invalid. Try again.');
        }

    }

    public function confirmOTP()
    {
        return view('profile.confirm_otp');
    }

    public function validateOTP(Request $request)
    {
        $otp = EmailOtp::where(['user_id'=> auth()->user()->id, 'otp'=>$request->otp])->first();
        if($otp != null){
            auth()->user()->update(
                ['password'=>Hash::make(session('new_password'))
            ]);
            return redirect(route('profile.index'))->withSuccess('User Password Edited With Success! ');
        }else{
            return back()->withFailures('You have entered the wrong OTP.');
        }
    }
}
