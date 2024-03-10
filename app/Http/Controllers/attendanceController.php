<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\attendances;
use Illuminate\Support\Facades\Validator;

class attendanceController extends Controller
{
    public function checkIn(Request $request)
    { 
        $newattendance = new attendances();
        // $constraints = $request->validate([
        //     'check_in' => 'required',
        //     'check_out' => 'required',
        //     'date' => 'required',
        //     'created_at' => 'required',
        //     'updated_at' => 'required',
        // ]);
        // $validator = Validator::make($request->all(), $constraints);
        $newattendance->user_id = "052f49b3-eb86-4522-b127-709812cc89a2";
        $newattendance->check_in = $request->check_in;
        $newattendance->check_out = $request->check_in;
        $newattendance->date = $request->date;
        $newattendance->created_at = Carbon::now();//$request->check_in;
        $newattendance->updated_at = Carbon::now();//$request->check_in;
        

        
        $newattendance->save();

        return redirect()->back();
    }

    public function checkOut(Request $request)
    { 
        
        $checkout = attendances::where('attendance_id', $request->attendance_id)->first();

        if ($checkout) {
            $checkout->check_out = $request->check_out; // Assuming you're hardcoding the checkout time for illustration
            $checkout->save();
            return response()->json($checkout);
        } else {
            return response()->json(['error' => 'Attendance not found'], 404);
        }

    }  
    

    public function getAttend(attendances $report)
    {
        // dd($report->latest()->get()->toArray());
        return view("page.auth.attendance", [
            "title"=> "Attendance",
            "group" => "attendance",
            "reports" => $report::latest()->first()->toArray()
        ]);
    }

   
}
