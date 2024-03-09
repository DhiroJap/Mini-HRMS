<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AuthController extends Controller
{

    public function register(Request $request)
    {
        $newuser = new User();
        $constraints = [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/',
        ];

        $validator = Validator::make($request->all(), $constraints);

        if ($validator->fails()) {
            return response()->json([
                'status' => 401,
                'message' => $validator->errors(),
                'data' => null
            ], 401);
        };

        $username = strtolower($request->first_name . $request->last_name);
        $username = preg_replace('/[^a-z]/', '', $username);
        $username = str_replace(' ', '', $username);
        $base_username = $username;
        $suffix = 0;
        while (User::where('username', $username)->exists()) {
            $suffix++;
            $username = $base_username . $suffix;
        }

        $avatar = "default.jpg";

        $newuser->user_id = Str::uuid();
        $newuser->username = $username;
        $newuser->first_name = $request->first_name;
        $newuser->last_name = $request->last_name;
        $newuser->email = $request->email;
        $newuser->password = Hash::make($request['password']);
        $newuser->avatar = $avatar;
        $newuser->save();

        return response()->json([
            'status' => 201,
            'message' => 'User Registered Successfully!',
            'data' => null
        ], 201);
    }

    public function login(Request $request)
    {
        try {
            $constraints = [
                'email' => 'required|email',
                'password' => 'required|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/',
            ];

            $validator = Validator::make($request->all(), $constraints);

            $newuser = User::where('email', $request->email)->firstOrFail();
            $token = $newuser->createToken('auth_token')->plainTextToken;

            if ($validator->fails()) {
                return response()->json([
                    'status' => 401,
                    'message' => $validator->errors(),
                    'data' => null
                ], 401);
            };

            if(!Auth::attempt($request->only(['email', 'password']))) {
                return response()->json([
                    'status' => 404,
                    'message' => 'Invalid Email or Password!',
                    'data' => null
                ], 404);
            }

            return response()->json([
                'status' => 201,
                'message' => 'User Logged In Successfully!',
                'token' => $token,
                'data' => null,
            ], 201);

        }   catch (\Throwable $th) {
            return response()->json([
                'status' => 500,
                'message' => $th->getMessage(),
                'data' => null
            ], 500);
        }
    }
}
