<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index() {
        return view("page.auth.attendance", [
            'title' => 'Report',
            'group' => 'attendance',
        ]);
    }

    // API for attendance last 30 day
    public function getAttendanceMonth(Request $request)
    {
        // Check if user is logged in or not
        // if(!Auth::check()) {
        //     return response()->json([
        //         'status' => 401,
        //         'message'=> 'Unauthorized',
        //         'data' => null,
        //     ], 401);
        // }

        // $user_id = $request->user()->id;
        $user_id = '30fe0460-259e-3cda-afe9-4e70d1c79839';

        $retrieved_data = Attendance::where("user_id", $user_id)
                            ->orderBy('date', 'desc')
                            ->get();

        $data_month = [];
        foreach($retrieved_data as $attendance) {
            if($attendance->date <= Carbon::today() && $attendance->date > Carbon::today()->subDays(30)) {
                $check_in = Carbon::parse($attendance->check_in);
                $check_out = Carbon::parse($attendance->check_out);
                $total_hour = $check_out->diff($check_in)->h;
        
                if($check_out->format('H:i:s') >= "13:00:00" && $check_in->format('H:i:s') <= "12:00:00") {
                    $total_hour -= 1;
                }

                $data_month[] = [
                    'user_id' => $user_id,
                    'date' => Carbon::parse($attendance->date)->format('l, j F Y'),
                    'check_in' => $check_in->format('h:i:s A'),
                    'check_out' => $check_out->format('h:i:s A'),
                    'total_hour' => $total_hour,
                ];
            }
        }
 
        return response()->json([
            'status' => 200,
            'message' => 'Success',
            'data' => $data_month,
        ], 200);
    }

    public function getAttendanceWeek(Request $request)
    {

        // Check if user is logged in or not
        // if(!Auth::check()) {
        //     return response()->json([
        //         'status' => 401,
        //         'message'=> 'Unauthorized',
        //         'data' => null,
        //     ], 401);
        // }

        // $user_id = $request->user()->id;
        $user_id = '30fe0460-259e-3cda-afe9-4e70d1c79839';
        $retrieved_data = Attendance::where("user_id", $user_id)
                            ->orderBy('date', 'desc')
                            ->get();

        $data_week = [];
        foreach($retrieved_data as $attendance) {
            if($attendance->date <= Carbon::today() && $attendance->date > Carbon::today()->subDays(7)) {
                $check_in = Carbon::parse($attendance->check_in);
                $check_out = Carbon::parse($attendance->check_out);
                $total_hour = $check_out->diff($check_in)->h;
        
                if($check_out->format('H:i:s') >= "13:00:00" && $check_in->format('H:i:s') <= "12:00:00") {
                    $total_hour -= 1;
                }
    
                $data_week[] = [
                    'user_id' => $user_id,
                    'date' => Carbon::parse($attendance->date)->format('l, j F Y'),
                    'check_in' => $check_in->format('h:i:s A'),
                    'check_out' => $check_out->format('h:i:s A'),
                    'total_hour' => $total_hour,
                ];
            }
        }
 
        return response()->json([
            'status' => 200,
            'message' => 'Success',
            'data' => $data_week,
        ], 200);
    }
}
