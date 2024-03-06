<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('page.login', [
        'title'=> 'Welcome',
        'active' => 'login',
    ]);
});

Route::get('/login', function () {
    return view('page.login', [
        'title'=> 'Welcome',
        'active' => 'login',
    ]);
});

Route::get('/register', function () {
    return view('page.register', [
        'title'=> 'Register',
        'active'=> 'register',
    ]);
});

Route::get('/profile', function() {
    return view('page.auth.dashboard.profile', [
        'title' => 'Profile',
        'active' => 'profile',
    ]);
});