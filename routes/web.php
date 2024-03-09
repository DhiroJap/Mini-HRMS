<?php

use App\Http\Controllers\ReportController;
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
    ]);
});

Route::get('/login', function () {
    return view('page.login', [
        'title'=> 'Welcome',
    ]);
});

Route::get('/register', function () {
    return view('page.register', [
        'title'=> 'Register',
    ]);
});

Route::get('/profile', function() {
    return view('page.auth.profile', [
        'title' => 'Profile',
        'group' => 'profile',
    ]);
});

Route::get('/attendance', [ReportController::class, "show"]);
