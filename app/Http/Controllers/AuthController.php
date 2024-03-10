<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function viewRegister() 
    {
        return view('page.register', [
            'title' => 'Register'
        ]);
    }

    public function register(Request $request, Validator $validator) 
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^\w\s]).{8,}$/',
            'username' => 'required|unique:users,username',
        ]);

        $username = strtolower($request->first_name . $request->last_name);
        $username = preg_replace('/[^a-z]/', '', $username);
        $username = str_replace(' ', '', $username);
        $base_username = $username;
        $suffix = 0;
        while (User::where('username', $username)->exists()) {
            $suffix++;
            $username = $base_username . $suffix;
        }

        $email = $request->email;
        if (User::where('email', $email)->exists()) {
            toast()->danger("This email has already been taken.")->pushOnNextPage();
            return redirect()->back();
        }

        $avatar = "default.jpg";

        $newuser = new User();
        $newuser->user_id = Str::uuid();
        $newuser->username = $username;
        $newuser->first_name = $request->first_name;
        $newuser->last_name = $request->last_name;
        $newuser->email = $request->email;
        $newuser->password = Hash::make($request->password);
        $newuser->avatar = $avatar;
        $newuser->save();

        toast()->success("Account successfully created.")->pushOnNextPage();
        return redirect('/login');
    }

    public function viewLogin() 
    {
        return view('page.login', [
            'title' => 'Login'
        ]);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email'=> 'required|email',
            'password'=> 'required|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^\w\s]).{8,}$/',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        };

        $user = User::where('email', $request->email)->first();
        if (!$user) {
            toast()->danger('Account doesn\'t exist! Please create a new one.')->pushOnNextPage();
            return redirect()->back()->withInput();
        }

        $token = $user->createToken('auth_token')->plainTextToken;
        $cookie = cookie('auth_token', $token, config('sanctum.expiration'), null, null, false, true);

        if (!Hash::check($request->password, $user->password)) {
            toast()->danger('Invalid password!')->pushOnNextPage();
            return redirect()->back()->withInput();
        }

        Auth::login($user);
        return redirect('/profile')->withCookie($cookie);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/login')->withoutCookie('auth_token');
    }
        
}