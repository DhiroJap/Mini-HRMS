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
    return view('page.auth.dashboard.profile', [
        'title' => 'Profile',
        'group' => 'dashboard',
    ]);
});

Route::get('/takeattendance', function() {
    return view('page.auth.attendance.takeattendance', [
        'title' => 'Take Attendance',
        'group' => 'attendance',
    ]);
});

Route::get('/inputschedule', function() {
    return view('page.auth.attendance.inputschedule', [
        'title' => 'Input Schedule',
        'group' => 'attendance',
    ]);
});

Route::get('/report', function() {
    return view('page.auth.attendance.report', [
        'title' => 'Report',
        'group' => 'attendance',
    ]);
});

Route::get('/takeattendance', function () {
    return view('page.auth.attendance.takeattendance', [
        'title'=> 'Checkin',
        'active' => 'Checkin',
        'group' => 'attendance'
    ]);
});