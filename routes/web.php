<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScheduleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/login');
});

Route::group(['middleware' => 'web'], function () {
    Route::middleware('guest')->group(function () {
        Route::get('/login', [AuthController::class,'viewLogin']);
        Route::get('/register', [AuthController::class,'viewRegister']);

        Route::post('/login', [AuthController::class,'login']);
        Route::post('/register', [AuthController::class, 'register']);
    });

    Route::middleware('auth')->group(function () {
        Route::get('/profile',[ProfileController::class, 'edit']);
        Route::get('/attendance', [AttendanceController::class,'viewAttendance']);

        Route::put('/profile', [ProfileController::class, 'update'])->name('updateProfile');
        Route::put('/change-password', [ProfileController::class, 'changePassword'])->name('changePassword');
        Route::put('/check-out', [AttendanceController::class, 'checkOut'])->name('checkOut');

        Route::post('/check-in', [AttendanceController::class, 'checkIn'])->name('checkIn');
        Route::post('/schedule', [ScheduleController::class, 'createSchedule'])->name('createSchedule');
    });
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
