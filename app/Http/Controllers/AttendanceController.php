<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Carbon\Carbon;

class AttendanceController extends Controller
{
    public function viewAttendance()
    {
        $user = auth()->user();
        $currentDate = now()->toDateString();
        $existingAttendance = Attendance::where("user_id", $user->user_id)->whereDate("date", $currentDate)->exists();
        $status = $existingAttendance ? 'checked_in' : 'not_checked_in';

        return view("page.auth.attendance", [
            "title" => "Attendance",
            "group" => "attendance",
            "status" => $status
        ]);
    }

    public function checkIn()
    {
        $user = auth()->user();
        $currentDate = now()->toDateString();
        $existingAttendance = Attendance::where("user_id", $user->user_id)->whereDate("date", $currentDate)->exists();

        if ($existingAttendance) {
            toast()->danger('Cannot check in when already checked in!')->pushOnNextPage();
            return redirect()->back();
        }

        $attendance = new Attendance();
        $attendance->user_id = $user->user_id;
        $attendance->check_in = now();
        $attendance->date = now()->toDateString();
        $attendance->save();

        toast()->success('Successfully checked in!')->pushOnNextPage();
        return redirect()->back();
    }

    public function checkOut()
    {
        $user = auth()->user();
        $currentDate = now()->toDateString();
        $attendance = Attendance::where('user_id', $user->user_id)->whereDate('date', $currentDate)->latest()->first();

        if (!$attendance) {
            toast()->danger('Cannot check out when not checked in!')->pushOnNextPage();
            return redirect()->back();
        }

        if ($attendance->check_out) {
            toast()->danger('Cannot check out when already checked out!')->pushOnNextPage();
            return redirect()->back();
        }

        $checkInTime = Carbon::parse($attendance->check_in);
        $fiveMinutesAfterCheckIn = $checkInTime->addMinutes(30);

        if (now()->lt($fiveMinutesAfterCheckIn)) {
            toast()->danger('Please wait at least 30 minutes after checking in before checking out!')->pushOnNextPage();
            return redirect()->back();
        }

        $attendance->check_out = now();
        $attendance->save();

        toast()->success('Successfully checked out!')->pushOnNextPage();
        return redirect()->back();
    }
}
