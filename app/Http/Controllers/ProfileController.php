<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function edit() {
        $user = auth()->user();
        return view('page.auth.profile', compact("user"))->with([
            'title' => 'Profile',
            'group'=> 'profile'
        ]);
    }

    public function update(Request $request, Validator $validator) {
        $validator = Validator::make($request->all(), [
            "username" => "regex:/^[a-z0-9]+$/|unique:users,username," . auth()->id(),
            "email" => "email|unique:users,email," . auth()->id(),
            "first_name" => "regex:/^[a-zA-Z]+$/",
            "last_name" => "regex:/^[a-zA-Z]+$/",
            "avatar" => "image|mimes:jpg,jpeg,png",
        ]);

        $username = $request->username;
        if (User::where('username', $username)->exists()) {
            toast()->danger("This username has already been taken! Please choose another one.")->pushOnNextPage();
            return redirect()->back();
        }

        $email = $request->email;
        if (User::where('email', $email)->exists()) {
            toast()->danger("This email has already been taken! Please choose another one.")->pushOnNextPage();
            return redirect()->back();
        }

        $user = auth()->user();
        $user->username = $request->username ?: $user->username;
        $user->email = $request->email ?: $user->email;
        $user->first_name = $request->first_name ?: $user->first_name;
        $user->last_name = $request->last_name ?: $user->last_name;

        if($request->hasFile("avatar")) {
            $avatar = $request->file("avatar");
            $extension = $avatar->getClientOriginalExtension();
            $fileName = $user->user_id.".".$extension;

            $path = 'images/';
            $avatar->move($path, $fileName);
            $user->avatar = $fileName;
        };

        $user->save();
        toast()->success('Profile updated successfully!')->pushOnNextPage();
        return redirect()->back();
    }

    public function changePassword(Request $request, Validator $validator) {
        $validator = Validator::make($request->all(), [
            'newPassword' => 'required|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^\w\s]).{8,}$/',
            'currentPassword' => 'required|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^\w\s]).{8,}$/',
        ]);

        $user = auth()->user();
        $currentPassword = $request->currentPassword;
        $newPassword = $request->newPassword;

        if (!Hash::check($currentPassword, $user->password)) {
            toast()->danger('Incorrect password!')->pushOnNextPage();
            return redirect()->back()->withInput();
        }

        if ($currentPassword === $newPassword) {
            toast()->danger('The new password must be different from your current password.')->pushOnNextPage();
            return redirect()->back()->withInput();
        }

        $user->password = bcrypt($request->newPassword);
        $user->save();
        toast()->success('Password changed successfully!')->pushOnNextPage();

        return redirect()->back();
    }
}

