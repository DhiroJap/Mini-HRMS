@extends('layout.attendance-layout')

@section('content')
        <!-- Take Attendance Section -->
        <div id="take-attendance-content" class="flex-1 lg:max-w-2xl">
            <div class="space-y-6">
                <div>
                    <h3 class="text-lg font-medium">Take attandance</h3>
                    <p class="text-sm text-[#595960]">This is where you verify your attendance.</p>
                </div>
                
                <div class="shrink-0 bg-[#E2E8F0] h-[1px] w-full"></div>

                <div class="flex flex-col justify-center items-center">
                    <p id="current-date" class="text-5xl mb-5 font-bold">  </p>
                    <div class="flex gap-1">
                        <p id="current-hour" class="flex text-9xl font-extrabold w-52 h-36 bg-gray-200 border-gray rounded-2xl justify-center">  </p>
                        <p id="current-minute" class="flex text-9xl font-extrabold w-52 h-36 bg-gray-200 border-gray rounded-2xl justify-center"> </p>
                    </div>
                    <button id="checkin" type="submit" class="flex mt-5 w-auto justify-center rounded-md font-semibold bg-blue-600 px-3 py-2.5 text-lg leading-6 text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">Check in</button>
                </div>
            </div>
        </div>

        <!-- Input Schedule Section -->
        <div id="input-schedule-content" class="hidden flex-1 lg:max-w-2xl">
            <div class="space-y-6">
                <div class="">
                    <h3 class="text-lg font-medium">Input Schedule</h3>
                    <p class="text-sm text-[#595960]">This is where you upload your work schedule.</p>
                </div>

                <div class="shrink-0 bg-[#E2E8F0] h-[1px] w-full"></div>

                <div class="flex flex-col mt-4">
                    <div class="-m-1.5 overflow-x-auto">
                        <div class="p-1.5 min-w-full inline-block align-middle">
                            <div class="border rounded-lg shadow overflow-hidden border-[#6A6A6A]">
                                <table class="min-w-full divide-y divide-[#6A6A6A] text-center text-xs">
                                    <thead class="bg-[#2563EB] font-medium text-white">
                                        <tr class="divide-x divide-[#6A6A6A]">
                                            <th scope="col" class="px-6 py-3">
                                                Day
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Time
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-[#6A6A6A] whitespace-nowrap text-sm text-[#6A6A6A]">
                                        <x-input-schedule-row day="Monday" time="00:00 AM - 00:00 AM (0 hr 0m)" btn_id="schedule-1" modal_id="modal-1" close_btn_id="btn-1" close_outside_id="outside-1"/>
                                        <x-input-schedule-row day="Tuesday" time="00:00 AM - 00:00 AM (0 hr 0m)" btn_id="schedule-2" modal_id="modal-2" close_btn_id="btn-2" close_outside_id="outside-2"/>
                                        <x-input-schedule-row day="Wednesday" time="00:00 AM - 00:00 AM (0 hr 0m)" btn_id="schedule-3" modal_id="modal-3" close_btn_id="btn-3" close_outside_id="outside-3"/>
                                        <x-input-schedule-row day="Thursday" time="00:00 AM - 00:00 AM (0 hr 0m)" btn_id="schedule-4" modal_id="modal-4" close_btn_id="btn-4" close_outside_id="outside-4"/>
                                        <x-input-schedule-row day="Friday" time="00:00 AM - 00:00 AM (0 hr 0m)" btn_id="schedule-5" modal_id="modal-5" close_btn_id="btn-5" close_outside_id="outside-5"/>
                                        <x-input-schedule-row day="Saturday" time="00:00 AM - 00:00 AM (0 hr 0m)" btn_id="schedule-6" modal_id="modal-6" close_btn_id="btn-6" close_outside_id="outside-6"/>
                                        <x-input-schedule-row day="Sunday" time="00:00 AM - 00:00 AM (0 hr 0m)" btn_id="schedule-7" modal_id="modal-7" close_btn_id="btn-7" close_outside_id="outside-7"/>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex items-center justify-end">
                    <p class="font-medium mx-4">Work Hours: <span class="text-[#EF4444]">6 Hours</span></p>
                    <button class="w-auto justify-center rounded-md font-semibold bg-blue-600 px-3 py-2  text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">Save time</button>
                </div>                
            </div>
        </div>

        <!-- Report Section -->
        <div id="report-content" class="hidden flex-1 lg:max-w-2xl">
            <div class="space-y-6">
                <div class="">
                    <h3 class="text-lg font-medium">Report</h3>
                    <p class="text-sm text-[#595960]">This is where your weekly and monthly work report will be displayed.</p>
                </div>
    
                <div class="shrink-0 bg-[#E2E8F0] h-[1px] w-full"></div>
    
                <div class="">
                    <h3 class="text-md font-medium">Current Date</h3>
                    <p class="text-sm text-[#595960]" id="current-time">Today is {{ date("l, d F Y. h:i:s A") }}</p>
                </div>

                <div class="">
                    <h3 class="text-md font-medium">Weekly Report</h3>
                    <p class="text-sm text-[#595960]">This is your work report for the last 7 days.</p>
                    
                    <!-- Weekly Table -->
                    <div class="flex flex-col mt-4">
                        <div class="-m-1.5 overflow-x-auto">
                            <div class="p-1.5 min-w-full inline-block align-middle">
                                <div class="border rounded-lg shadow overflow-hidden border-[#6A6A6A]">
                                    <table class="min-w-full divide-y divide-[#6A6A6A] text-center text-xs">
                                        <thead class="bg-[#2563EB] font-medium text-white">
                                            <tr class="divide-x divide-[#6A6A6A]">
                                                <th scope="col" class="px-6 py-3">
                                                    No.
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Date
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Check In Time
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Check Out Time
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Work Hours
                                                </th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody class="divide-y divide-[#6A6A6A] whitespace-nowrap text-sm text-[#6A6A6A]" id="weekly-row">
                                            <!-- Placeholder -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p class="font-medium" id="total-weekly">
                        <!-- Placeholder -->
                    </p>
                </div>

                <div class="">
                    <h3 class="text-md font-medium">Monthly Report</h3>
                    <p class="text-sm text-[#595960]">This is your work report for the last 30 days.</p>
                    
                    <!-- Monthly Table -->
                    <div class="flex flex-col mt-4">
                        <div class="-m-1.5 overflow-x-auto">
                            <div class="p-1.5 min-w-full inline-block align-middle">
                                <div class="border rounded-lg shadow overflow-hidden border-[#6A6A6A]">
                                    <table class="min-w-full divide-y divide-[#6A6A6A] text-center text-xs">
                                        <thead class="bg-[#2563EB] font-medium text-white">
                                            <tr class="divide-x divide-[#6A6A6A]">
                                                <th scope="col" class="px-6 py-3">
                                                    No.
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Date
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Check In Time
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Check Out Time
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Work Hours
                                                </th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody class="divide-y divide-[#6A6A6A] whitespace-nowrap text-sm text-[#6A6A6A]" id="monthly-row">
                                            <!-- Placeholder -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p class="font-medium" id="total-monthly">
                        <!-- Placeholder -->
                    </p>
                </div>
            </div>
        </div>
@endsection