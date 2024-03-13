@extends('layout.attendance-layout')

@section('content')
        <!-- Take Attendance Section -->
        <div id="take-attendance-content" class="flex-1 lg:max-w-2xl">
            <div class="space-y-6">
                <div>
                    <h3 class="text-lg font-medium">Take Attendance</h3>
                    <p class="text-sm text-[#595960]">This is where you verify your attendance.</p>
                </div>

                <div class="shrink-0 bg-[#E2E8F0] h-[1px] w-full"></div>

                <div class="flex flex-col justify-center items-center">
                    <p id="current-date" class="text-5xl mb-5 font-bold"></p>
                    <div class="flex gap-1">
                        <p id="current-hour" class="flex text-9xl font-extrabold w-52 h-36 bg-gray-200 border-gray rounded-2xl justify-center"></p>
                        <p id="current-minute" class="flex text-9xl font-extrabold w-52 h-36 bg-gray-200 border-gray rounded-2xl justify-center"></p>
                    </div>
                    @if($status === 'not_checked_in')

                    <form action="/check-in" method="POST">
                    @csrf
                    <button type="submit" id="check-in-button" class="flex mt-5 w-auto justify-center rounded-md font-semibold bg-blue-600 px-3 py-2.5 text-lg leading-6 text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">Check In</button>
                    </form>

                    @else

                    <form action="/check-out" method="POST">
                    @csrf
                    @method('PUT')
                    <button type="submit" id="check-out-button" class="flex mt-5 w-auto justify-center rounded-md font-semibold bg-blue-600 px-3 py-2.5 text-lg leading-6 text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">Check Out</button>
                    </form>

                    @endif
                </div>
            </div>
        </div>

        <!-- Input Schedule Section -->
        @if($hasSchedule)
        <div id="input-schedule-content" class="hidden flex-1 lg:max-w-2xl">
            <div class="space-y-6">
                <div class="">
                    <h3 class="text-lg font-medium">Input Schedule</h3>
                    <p class="text-sm text-[#595960]">This is where you upload and view your work schedule.</p>
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

                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-[#6A6A6A] whitespace-nowrap text-sm text-[#6A6A6A]">
                                        @foreach($schedules as $schedule)
                                <tr class="divide-x divide-[#6A6A6A]">
                                    <td class="px-6 py-4">{{ $schedule['day'] }}</td>
                                    <td class="px-6 py-4">
                                        {{-- @if($schedule->start_time === '00:00' && $schedule->end_time === '00:00')
                                            NO WORK SCHEDULE
                                        @else
                                            {{ $schedule->start_time }} - {{ $schedule->end_time }}
                                        @endif --}}
                                        {{$schedule['time']}}
                                    </td>
                                </tr>
                                @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex items-center justify-end">
                    <p class="font-medium mx-4">Work Hours: <span class="text-[#EF4444]">6 Hours</span></p>
                </div>
            </div>
        </div>

        @else
        <div id="input-schedule-content" class="hidden flex-1 lg:max-w-2xl">
            <div class="space-y-6">
                <div class="">
                    <h3 class="text-lg font-medium">Input Schedule</h3>
                    <p class="text-sm text-[#595960]">This is where you upload your work schedule.</p>
                </div>

                <div class="shrink-0 bg-[#E2E8F0] h-[1px] w-full"></div>

                <form class="flex flex-col mt-4" method="post">
                    @csrf
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
                                        <x-input-schedule-row day="Monday" />
                                        <x-input-schedule-row day="Tuesday" />
                                        <x-input-schedule-row day="Wednesday" />
                                        <x-input-schedule-row day="Thursday" />
                                        <x-input-schedule-row day="Friday" />
                                        <x-input-schedule-row day="Saturday" />
                                        <x-input-schedule-row day="Sunday" />
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center justify-end mt-4" id="empty-error"> </div>
                    <div class="flex items-center justify-end mt-4">
                        <p class="font-medium mx-4" id="total-work-hour">Work Hours: <span class="text-[#EF4444]" >0 Hours</span></p>
                        <button id="save-schedule" class="w-auto justify-center rounded-md font-semibold px-3 py-2 text-white shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600 bg-[#2563EB] hover:bg-[#2563EB]/90 disabled:hover:bg-gray-400">Save Schedule</button>
                    </div>
                </form>
            </div>
        </div>
        @endif

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
                    <p id='current-time' class="text-sm text-[#595960]">Today is {{ date("l, d F Y. H:i:s") }}</p>
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
                                        <tbody class="divide-y divide-[#6A6A6A] whitespace-nowrap text-sm text-[#6A6A6A]">
                                        @if (count($dataWeek) > 0)
                                        @foreach ($dataWeek as $index => $weeklyData)
                                            <tr class='divide-x divide-[#6A6A6A]'>
                                                <td class="px-6 py-4">{{ $index + 1 }}</td>
                                                <td class="px-6 py-4">{{ $weeklyData['date'] }}</td>
                                                <td class="px-6 py-4">{{ $weeklyData['check_in'] }}</td>
                                                <td class="px-6 py-4">{{ $weeklyData['check_out'] }}</td>
                                                <td class="px-6 py-4">{{ $weeklyData['total_hour'] }}</td>
                                            </tr>
                                        @endforeach
                                        @else
                                            <tr class='divide-x divide-[#6A6A6A]'>
                                                <td colspan="5">You have no attendance data for the week</td>
                                            </tr>
                                        @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p class="font-medium mt-3">Total Weekly Work Hours : <span class="{{$totalHourInWeek <= 20 ? 'text-red-600' : 'text-[#2563EB]'}}">{{$totalHourInWeek}}</span></p>
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
                                        <tbody class="divide-y divide-[#6A6A6A] whitespace-nowrap text-sm text-[#6A6A6A]">
                                            @if(count($dataMonth) > 0)
                                            @foreach ($dataMonth as $index => $monthlyData)
                                            <tr class='divide-x divide-[#6A6A6A]'>
                                                <td class="px-6 py-4">{{ $index + 1 }}</td>
                                                <td class="px-6 py-4">{{ $monthlyData['date']}}</td>
                                                <td class="px-6 py-4">{{ $monthlyData['check_in']}}</td>
                                                <td class="px-6 py-4">{{ $monthlyData['check_out'] }}</td>
                                                <td class="px-6 py-4">{{ $monthlyData['total_hour'] }}</td>
                                            </tr>
                                            @endforeach
                                            @else
                                            <tr class='divide-x divide-[#6A6A6A]'>
                                                <td colspan='5'>You have no attendance data for the month</td>
                                            </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p class="font-medium mt-3">Total Monthly Work Hours : <span class="{{$totalHourInMonth <= 80 ? 'text-red-600' : 'text-[#2563EB]'}}">{{$totalHourInMonth}}</span></p>
                </div>
            </div>
        </div>
@endsection
