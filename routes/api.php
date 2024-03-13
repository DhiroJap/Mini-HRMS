<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\AttendanceController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('attendance/getAttendanceWeek', [AttendanceController::class, "getAttendanceWeek"]);
Route::get('attendance/getAttendanceMonth', [AttendanceController::class, "getAttendanceMonth"]);
Route::post('attendance/postSchedule', [ScheduleController::class, "postSchedule"]);
Route::get('attendance/getSchedule', [ScheduleController::class, "getSchedule"]);
Route::post('attendance/checkPassword', [ScheduleController::class, "checkPassword"]);

