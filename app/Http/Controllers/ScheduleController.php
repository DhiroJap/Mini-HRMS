<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function viewSchedule() {
        return view("page.auth.attendance", [
            'group'=>'attendance',
            'title'=>'Attendance'
        ]);
    }

    public function createSchedule(Request $request)
    {
        $user = auth()->user();

        foreach ($request->schedules as $scheduleData) {
            $schedule = new Schedule();
            $schedule->user_id = $user->user_id;
            $schedule->day = $scheduleData['currentDay'];

            $startTime = strtotime($scheduleData['start']);
            $schedule->start_time = date('Y-m-d H:i:s', $startTime);

            $endTime = strtotime($scheduleData['end']);
            $schedule->end_time = date('Y-m-d H:i:s', $endTime);

            $schedule->save();
        }

        toast()->success('Schedule input successfully!')->pushOnNextPage();
        return redirect()->back();
    }
}
