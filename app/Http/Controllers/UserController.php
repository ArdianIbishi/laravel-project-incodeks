<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function user_profile()
    {

        $user = auth()->user();

        return view('user.user_profile', compact('user'));

    }

    public function edit()
    {

        $user = auth()->user();

        return view('user.edit', compact('user'));

    }

    public function update_profile(UpdateProfileRequest $request)
    {

        $user = auth()->user();

        $user_update=$user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        if($user_update){
            return redirect(route('user.profile'))->with('status','Your profile is updated successfully');
        }
        else{
            return redirect(route('user.profile'))->with('status','Your profile is not updated!');

        }



    }




}
