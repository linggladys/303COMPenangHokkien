<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
        return view('user.profile.index',compact('userData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $userData->name = $request->name;
        $userData->username = $request->username;
        $userData->email = $request->email;

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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        return view('user.profile.edit',compact('userData'));
    }

    public function changePassword()
    {
        return view('user.profile.change-password');
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
            $users->save();

            return redirect(route('profile.index'))->withSuccess('User Password Edited With Success! ');
        }else{
            return redirect(route('profile.index'))->withFailures('Oops, the current password does not match with the new one.');
        }

    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
