<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Carbon\Carbon;

class AttendanceController extends Controller
{
    public function viewAttendance()
    {
        // $user = auth()->user();
        $currentDate = now()->toDateString();
        $existingAttendance = Attendance::where("user_id", "953f6b00-a1e2-43ea-a4ed-8781a0917fd2")->whereDate("date", $currentDate)->exists();
        $status = $existingAttendance ? 'checked_in' : 'not_checked_in';

        $retrieved_data = Attendance::where("user_id", "953f6b00-a1e2-43ea-a4ed-8781a0917fd2")->orderBy('date', 'desc')->get();
        $total_hour_in_month = 0;

        foreach($retrieved_data as $attendance) {
            if($attendance->date <= Carbon::today() && $attendance->date > Carbon::today()->subDays(30)) {
                $check_in = Carbon::parse($attendance->check_in);
                $check_out = Carbon::parse($attendance->check_out);
                $total_hour = $check_out->diffInHours($check_in);

                if($check_out->format('H:i:s') >= "13:00:00" && $check_in->format('H:i:s') <= "12:00:00") {
                    $total_hour -= 1;
                };
                $total_hour_in_month += $total_hour;

                $data_month[] = [
                    'date' => Carbon::parse($attendance->date)->format('l, j F Y'),
                    'check_in' => $check_in->format('H:i:s'),
                    'check_out' => $check_out->format('H:i:s'),
                    'total_hour' => $total_hour,
                ];
        };
    }
        return view("page.auth.attendance", [
            "title" => "Attendance",
            "group" => "attendance",
            "status" => $status,
            'dataMonth' => $data_month,
            'total_hour_in_month' => $total_hour_in_month,
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
