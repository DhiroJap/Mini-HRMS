<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Schedule;
use Carbon\Carbon;

class AttendanceController extends Controller
{
    public function viewAttendance()
    {
        $user = auth()->user();
        $currentDate = now()->toDateString();
        $existingAttendance = Attendance::where("user_id", $user->user_id)->whereDate("date", $currentDate)->exists();
        $status = $existingAttendance ? 'checked_in' : 'not_checked_in';

        $retrieved_data = Attendance::where("user_id", $user->user_id)->orderBy('date', 'desc')->get();
        $total_hour_in_month = 0;
        $data_month = [];
        $total_hour_in_week = 0;
        $data_week = [];

        foreach($retrieved_data as $monthly_attendance) {
            if($monthly_attendance->date <= Carbon::today() && $monthly_attendance->date > Carbon::today()->subDays(31)) {
                $check_in = Carbon::parse($monthly_attendance->check_in);
                $check_out = $monthly_attendance->check_out ? Carbon::parse($monthly_attendance->check_out) : null;
                $total_hour = $check_out ? $check_out->diffInHours($check_in) : null;

                if($check_out && $check_out->format('H:i:s') >= "13:00:00" && $check_in->format('H:i:s') <= "12:00:00") {
                    $total_hour -= 1;
                };
                $total_hour_in_month += $total_hour;

                $data_month[] = [
                    'date' => Carbon::parse($monthly_attendance->date)->format('l, j F Y'),
                    'check_in' => $check_in->format('H:i:s'),
                    'check_out' => $check_out ? $check_out->format('H:i:s') : 'Not checked out',
                    'total_hour' => $total_hour ?? 'NULL'
                ];
            };
         }

         foreach($retrieved_data as $weekly_attendance) {
            if($weekly_attendance->date <= Carbon::today() && $weekly_attendance->date > Carbon::today()->subDays(8)) {
                $check_in = Carbon::parse($weekly_attendance->check_in);
                $check_out = $weekly_attendance->check_out ? Carbon::parse($weekly_attendance->check_out) : null;
                $total_hour = $check_out ? $check_out->diffInHours($check_in) : null;

                if($check_out && $check_out->format('H:i:s') >= "13:00:00" && $check_in->format('H:i:s') <= "12:00:00") {
                    $total_hour -= 1;
                };
                $total_hour_in_week += $total_hour;

                $data_week[] = [
                    'date' => Carbon::parse($weekly_attendance->date)->format('l, j F Y'),
                    'check_in' => $check_in->format('H:i:s'),
                    'check_out' => $check_out ? $check_out->format('H:i:s') : 'Not checked out',
                    'total_hour' => $total_hour ?? 'NULL',
                ];
            };
         }

         $hasSchedule = Schedule::where('user_id', $user->user_id)->exists();
         $schedules = Schedule::where('user_id', $user->user_id)->get();

         $formattedSchedules = [];

        foreach ($schedules as $schedule) {
            $startTime = Carbon::parse($schedule->start_time)->format('H:i');
            $endTime = Carbon::parse($schedule->end_time)->format('H:i');

            $formattedSchedule = [
                'day' => $schedule->day,
                'time' => ($startTime === '00:00' && $endTime === '00:00') ? 'No work schedule' : "$startTime - $endTime",
            ];

            $exists = false;
            foreach ($formattedSchedules as $existingSchedule) {
                if ($existingSchedule['day'] === $formattedSchedule['day'] && $existingSchedule['time'] === $formattedSchedule['time']) {
                    $exists = true;
                    break;
                }
            }

        if (!$exists) {
            $formattedSchedules[] = $formattedSchedule;
            }
        }

        return view("page.auth.attendance", [
            "title" => "Attendance",
            "group" => "attendance",
            "status" => $status,
            'dataMonth' => $data_month,
            'totalHourInMonth' => $total_hour_in_month,
            'dataWeek' => $data_week,
            'totalHourInWeek'=> $total_hour_in_week,
            'hasSchedule'=> $hasSchedule,
            'schedules'=>$formattedSchedules
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
