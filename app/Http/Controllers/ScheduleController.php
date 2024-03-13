<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    /**
     * Store a newly created resource in storage.
     */

    public function index() {
        return view("page.auth.attendance", [
            'title' => 'Attendance',
            'group' => 'attendance',
        ]);
    }

    public function postSchedule(Request $request)
    {
        
        $data = $request->json()->all();

        // Log::info('Received schedule data:', $data);

        foreach($data as $schedule_data) {
            $schedule = new Schedule();
            $schedule->user_id = '161d57d6-c6aa-3b05-a90a-3c57ff455dc0';
            $schedule->day = $schedule_data['day_day'];
            $schedule->start_time = Carbon::createFromFormat('H:i', $schedule_data['start'])->format('Y-m-d H:i:s');
            $schedule->end_time = Carbon::createFromFormat('H:i', $schedule_data['end'])->format('Y-m-d H:i:s');
            $schedule->save();
        }

        return response()->json([
            'status' => 201,
            'message' => 'success',
            'data' => '',
        ], 201);
    }

    public function getSchedule(Request $request) {

        // Check if user is logged in or not
        // if(!Auth::check()) {
        //     return response()->json([
        //         'status' => 401,
        //         'message'=> 'Unauthorized',
        //         'data' => null,
        //     ], 401);
        // }

        // $user_id = $request->user()->id;
        $user_id = '161d57d6-c6aa-3b05-a90a-3c57ff455dc0';

        $retrieved_data = Schedule::where('user_id', $user_id)
                            ->get();
        
        if($retrieved_data->isEmpty()) {
            return response()->json([
                'status' => 204,
                'message' => 'No Content',
                'data' => '',
            ], 204);
        }

        $filtered_data = [];
        foreach($retrieved_data as $schedule) {
            $start_carbon_format = Carbon::parse($schedule->start_time);
            $end_carbon_format = Carbon::parse($schedule->end_time);

            $start_time = $start_carbon_format->hour == 0 ? $start_carbon_format->format('H:i A') : $start_carbon_format->format('h:i A');
            $end_time = $end_carbon_format->hour == 0 ? $end_carbon_format->format('H:i A') : $end_carbon_format->format('h:i A');
            $total_work = $end_carbon_format->diffInMinutes($start_carbon_format);
            
            if($end_carbon_format->format('H:i:s') >= "13:00:00" && $start_carbon_format->format('H:i:s') <= "12:00:00") {
                $total_work -= 60;
            }

            $filtered_data[] = [
                'user_id' => $user_id,
                'day' => $schedule->day,
                'start' => $start_time,
                'end' => $end_time,
                'total_work' => $total_work,
            ];
        }

        return response()->json([
            'status' => 200,
            'message' => 'Success',
            'data' => $filtered_data,
        ], 200);
    }
    
    public function checkPassword(Request $request, Validator $validator) {
        $validator = Validator::make($request->all(), [
            'check_password' => 'required|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^\w\s]).{8,}$/',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'message' => 'Validation failed',
                'data' => $validator->errors(),
            ], 400);
        }

        // $user = auth()->user();
        $check_password = $request->input('check_password');
        // $check_password = 'password';

        Log::info('Received schedule data:', $check_password);
        
        if(!Hash::check($check_password, '$2y$12$OQlDIcivvjGrzHaYoaBVNely71iBkZ2cEMEPqrUcFyPyyR6H3Ml2S')) {
            return response()->json([
                'status' => 403,
                'message' => 'Wrong password',
                'data' => '',
            ], 403);
        }

        return response()->json([
            'status' => 200,
            'message' => 'Success',
            'data' => '',
        ], 200);
    }


}
