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

    public function createSchedule(Request $request) {
        $request->validate([
            'day' => 'required|in:Monday,Tuesday,Wednesday,Thursday,Friday,Saturday,Sunday',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
        ]);

        $user = auth()->user();

        $schedule = new Schedule();
        $schedule->day = $request->day;
        $schedule->start_time = $request->start_time;
        $schedule->end_time = $request->end_time;
        $schedule->user_id = $user->user_id;
        
        $schedule->save();

        toast()->success('Nice')->pushOnNextPage();
        return redirect()->back();
    }
}
