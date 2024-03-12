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
                    <p id="current-date" class="text-5xl mb-5 font-bold">  </p>
                    <div class="flex gap-1">
                        <p id="current-hour" class="flex text-9xl font-extrabold w-52 h-36 bg-gray-200 border-gray rounded-2xl justify-center">  </p>
                        <p id="current-minute" class="flex text-9xl font-extrabold w-52 h-36 bg-gray-200 border-gray rounded-2xl justify-center"> </p>
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
                                        <tr class="divide-x divide-[#6A6A6A]">
                                            <td class="px-6 py-4">Monday</td>
                                            <td class="px-6 py-4">00:00 AM - 00:00 AM (0 hr 0m)</td>
                                            <td class="px-6 py-4 flex items-center justify-center">
                                                <button id="edit-schedule-1">
                                                    <svg stroke="currentColor" fill="#2563EB" stroke-width="0" viewBox="0 0 24 24" height="32" width="32" xmlns="http://www.w3.org/2000/svg" ><path fill="none" d="M0 0h24v24H0z"></path><path d="M3 10h11v2H3v-2zm0-2h11V6H3v2zm0 8h7v-2H3v2zm15.01-3.13.71-.71a.996.996 0 0 1 1.41 0l.71.71c.39.39.39 1.02 0 1.41l-.71.71-2.12-2.12zm-.71.71-5.3 5.3V21h2.12l5.3-5.3-2.12-2.12z"></path></svg>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr class="divide-x divide-[#6A6A6A]">
                                            <td class="px-6 py-4">Tuesday</td>
                                            <td class="px-6 py-4">00:00 AM - 00:00 AM (0 hr 0m)</td>
                                            <td class="px-6 py-4 flex items-center justify-center">
                                                <svg stroke="currentColor" fill="#2563EB" stroke-width="0" viewBox="0 0 24 24" height="32" width="32" xmlns="http://www.w3.org/2000/svg" id="edit-schedule-2"><path fill="none" d="M0 0h24v24H0z"></path><path d="M3 10h11v2H3v-2zm0-2h11V6H3v2zm0 8h7v-2H3v2zm15.01-3.13.71-.71a.996.996 0 0 1 1.41 0l.71.71c.39.39.39 1.02 0 1.41l-.71.71-2.12-2.12zm-.71.71-5.3 5.3V21h2.12l5.3-5.3-2.12-2.12z"></path></svg>
                                            </td>
                                        </tr>
                                        <tr class="divide-x divide-[#6A6A6A]">
                                            <td class="px-6 py-4">Wednesday</td>
                                            <td class="px-6 py-4">00:00 AM - 00:00 AM (0 hr 0m)</td>
                                            <td class="px-6 py-4 flex items-center justify-center">
                                                <svg stroke="currentColor" fill="#2563EB" stroke-width="0" viewBox="0 0 24 24" height="32" width="32" xmlns="http://www.w3.org/2000/svg" id="edit-schedule-3"><path fill="none" d="M0 0h24v24H0z"></path><path d="M3 10h11v2H3v-2zm0-2h11V6H3v2zm0 8h7v-2H3v2zm15.01-3.13.71-.71a.996.996 0 0 1 1.41 0l.71.71c.39.39.39 1.02 0 1.41l-.71.71-2.12-2.12zm-.71.71-5.3 5.3V21h2.12l5.3-5.3-2.12-2.12z"></path></svg>
                                            </td>
                                        </tr>
                                        <tr class="divide-x divide-[#6A6A6A]">
                                            <td class="px-6 py-4">Thursday</td>
                                            <td class="px-6 py-4">00:00 AM - 00:00 AM (0 hr 0m)</td>
                                            <td class="px-6 py-4 flex items-center justify-center">
                                                <svg stroke="currentColor" fill="#2563EB" stroke-width="0" viewBox="0 0 24 24" height="32" width="32" xmlns="http://www.w3.org/2000/svg" id="edit-schedule-4"><path fill="none" d="M0 0h24v24H0z"></path><path d="M3 10h11v2H3v-2zm0-2h11V6H3v2zm0 8h7v-2H3v2zm15.01-3.13.71-.71a.996.996 0 0 1 1.41 0l.71.71c.39.39.39 1.02 0 1.41l-.71.71-2.12-2.12zm-.71.71-5.3 5.3V21h2.12l5.3-5.3-2.12-2.12z"></path></svg>
                                            </td>
                                        </tr>
                                        <tr class="divide-x divide-[#6A6A6A]">
                                            <td class="px-6 py-4">Friday</td>
                                            <td class="px-6 py-4">00:00 AM - 00:00 AM (0 hr 0m)</td>
                                            <td class="px-6 py-4 flex items-center justify-center">
                                                <svg stroke="currentColor" fill="#2563EB" stroke-width="0" viewBox="0 0 24 24" height="32" width="32" xmlns="http://www.w3.org/2000/svg" id="edit-schedule-5"><path fill="none" d="M0 0h24v24H0z"></path><path d="M3 10h11v2H3v-2zm0-2h11V6H3v2zm0 8h7v-2H3v2zm15.01-3.13.71-.71a.996.996 0 0 1 1.41 0l.71.71c.39.39.39 1.02 0 1.41l-.71.71-2.12-2.12zm-.71.71-5.3 5.3V21h2.12l5.3-5.3-2.12-2.12z"></path></svg>
                                            </td>
                                        </tr>
                                        <tr class="divide-x divide-[#6A6A6A]">
                                            <td class="px-6 py-4">Saturday</td>
                                            <td class="px-6 py-4">00:00 AM - 00:00 AM (0 hr 0m)</td>
                                            <td class="px-6 py-4 flex items-center justify-center">
                                                <svg stroke="currentColor" fill="#2563EB" stroke-width="0" viewBox="0 0 24 24" height="32" width="32" xmlns="http://www.w3.org/2000/svg" id="edit-schedule-6"><path fill="none" d="M0 0h24v24H0z"></path><path d="M3 10h11v2H3v-2zm0-2h11V6H3v2zm0 8h7v-2H3v2zm15.01-3.13.71-.71a.996.996 0 0 1 1.41 0l.71.71c.39.39.39 1.02 0 1.41l-.71.71-2.12-2.12zm-.71.71-5.3 5.3V21h2.12l5.3-5.3-2.12-2.12z"></path></svg>
                                            </td>
                                        </tr>
                                        <tr class="divide-x divide-[#6A6A6A]">
                                            <td class="px-6 py-4">Sunday</td>
                                            <td class="px-6 py-4">00:00 AM - 00:00 AM (0 hr 0m)</td>
                                            <td class="px-6 py-4 flex items-center justify-center">
                                                <svg stroke="currentColor" fill="#2563EB" stroke-width="0" viewBox="0 0 24 24" height="32" width="32" xmlns="http://www.w3.org/2000/svg" id="edit-schedule-7"><path fill="none" d="M0 0h24v24H0z"></path><path d="M3 10h11v2H3v-2zm0-2h11V6H3v2zm0 8h7v-2H3v2zm15.01-3.13.71-.71a.996.996 0 0 1 1.41 0l.71.71c.39.39.39 1.02 0 1.41l-.71.71-2.12-2.12zm-.71.71-5.3 5.3V21h2.12l5.3-5.3-2.12-2.12z"></path></svg>
                                            </td>
                                        </tr>
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

            <x-schedule-submit-popup id="edit-time-1" date="Monday" />
            <x-schedule-submit-popup id="edit-time-2" date="Tuesday" />
            <x-schedule-submit-popup id="edit-time-3" date="Wednesday" />
            <x-schedule-submit-popup id="edit-time-4" date="Thursday" />
            <x-schedule-submit-popup id="edit-time-5" date="Friday" />
            <x-schedule-submit-popup id="edit-time-6" date="Saturday" />
            <x-schedule-submit-popup id="edit-time-7" date="Sunday" />

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
                    <p class="text-sm text-[#595960]">Today is {{ date("l, d F Y. h:i A") }}</p>
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
                                            {{-- Data here --}}
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p class="font-medium">Total Weekly Work Hours : <span class="text-[#2563EB]">21 Hours</span></p>
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
                                           {{-- Data Here --}}
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p class="font-medium">Total Weekly Work Hours : <span class="text-[#EF4444]">{{--Data Here--}}</span></p>
                </div>
            </div>
        </div>
@endsection
