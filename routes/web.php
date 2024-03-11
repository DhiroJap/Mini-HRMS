<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/login');
});

Route::group(['middleware' => 'web'], function () {
    Route::middleware('guest')->group(function () {
        Route::get('/login', [AuthController::class,'viewLogin']);
        Route::post('/login', [AuthController::class,'login']);
        Route::get('/register', [AuthController::class,'viewRegister']);
        Route::post('/register', [AuthController::class, 'register']);
    });

    Route::middleware('auth')->group(function () {
        Route::get('/profile',[ProfileController::class, 'edit']);

        Route::get('/attendance', function () {
            return view('page.auth.attendance', [
                'title' => 'Attendance',
                'group' => 'attendance'
            ]);
        });

        Route::put('/profile', [ProfileController::class, 'update'])->name('updateProfile');
        Route::put('/changepassword', [ProfileController::class, 'changePassword'])->name('changePassword');
    });
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
