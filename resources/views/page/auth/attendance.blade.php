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
                                            <tr class="divide-x divide-[#6A6A6A]">
                                                <td class="px-6 py-4">1</td>
                                                <td class="px-6 py-4">Wednesday, 6 March 2024</td>
                                                <td class="px-6 py-4">09:53:40 AM </td>
                                                <td class="px-6 py-4">15:06:40 PM</td>
                                                <td class="px-6 py-4">5 Hours</td>
                                            </tr>
                                            <tr class="divide-x divide-[#6A6A6A]">
                                                <td class="px-6 py-4">1</td>
                                                <td class="px-6 py-4">Wednesday, 6 March 2024</td>
                                                <td class="px-6 py-4">09:53:40 AM </td>
                                                <td class="px-6 py-4">15:06:40 PM</td>
                                                <td class="px-6 py-4">5 Hours</td>
                                            </tr>
                                            <tr class="divide-x divide-[#6A6A6A]">
                                                <td class="px-6 py-4">1</td>
                                                <td class="px-6 py-4">Wednesday, 6 March 2024</td>
                                                <td class="px-6 py-4">09:53:40 AM </td>
                                                <td class="px-6 py-4">15:06:40 PM</td>
                                                <td class="px-6 py-4">5 Hours</td>
                                            </tr>
                                            <tr class="divide-x divide-[#6A6A6A]">
                                                <td class="px-6 py-4">1</td>
                                                <td class="px-6 py-4">Wednesday, 6 March 2024</td>
                                                <td class="px-6 py-4">09:53:40 AM </td>
                                                <td class="px-6 py-4">15:06:40 PM</td>
                                                <td class="px-6 py-4">5 Hours</td>
                                            </tr>
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
                                            <tr class="divide-x divide-[#6A6A6A]">
                                                <td class="px-6 py-4">1</td>
                                                <td class="px-6 py-4">Wednesday, 6 March 2024</td>
                                                <td class="px-6 py-4">09:53:40 AM </td>
                                                <td class="px-6 py-4">15:06:40 PM</td>
                                                <td class="px-6 py-4">5 Hours</td>
                                            </tr>
                                            <tr class="divide-x divide-[#6A6A6A]">
                                                <td class="px-6 py-4">1</td>
                                                <td class="px-6 py-4">Wednesday, 6 March 2024</td>
                                                <td class="px-6 py-4">09:53:40 AM </td>
                                                <td class="px-6 py-4">15:06:40 PM</td>
                                                <td class="px-6 py-4">5 Hours</td>
                                            </tr>
                                            <tr class="divide-x divide-[#6A6A6A]">
                                                <td class="px-6 py-4">1</td>
                                                <td class="px-6 py-4">Wednesday, 6 March 2024</td>
                                                <td class="px-6 py-4">09:53:40 AM </td>
                                                <td class="px-6 py-4">15:06:40 PM</td>
                                                <td class="px-6 py-4">5 Hours</td>
                                            </tr>
                                            <tr class="divide-x divide-[#6A6A6A]">
                                                <td class="px-6 py-4">1</td>
                                                <td class="px-6 py-4">Wednesday, 6 March 2024</td>
                                                <td class="px-6 py-4">09:53:40 AM </td>
                                                <td class="px-6 py-4">15:06:40 PM</td>
                                                <td class="px-6 py-4">5 Hours</td>
                                            </tr>
                                            <tr class="divide-x divide-[#6A6A6A]">
                                                <td class="px-6 py-4">1</td>
                                                <td class="px-6 py-4">Wednesday, 6 March 2024</td>
                                                <td class="px-6 py-4">09:53:40 AM </td>
                                                <td class="px-6 py-4">15:06:40 PM</td>
                                                <td class="px-6 py-4">5 Hours</td>
                                            </tr>
                                            <tr class="divide-x divide-[#6A6A6A]">
                                                <td class="px-6 py-4">1</td>
                                                <td class="px-6 py-4">Wednesday, 6 March 2024</td>
                                                <td class="px-6 py-4">09:53:40 AM </td>
                                                <td class="px-6 py-4">15:06:40 PM</td>
                                                <td class="px-6 py-4">5 Hours</td>
                                            </tr>
                                            <tr class="divide-x divide-[#6A6A6A]">
                                                <td class="px-6 py-4">1</td>
                                                <td class="px-6 py-4">Wednesday, 6 March 2024</td>
                                                <td class="px-6 py-4">09:53:40 AM </td>
                                                <td class="px-6 py-4">15:06:40 PM</td>
                                                <td class="px-6 py-4">5 Hours</td>
                                            </tr>
                                            <tr class="divide-x divide-[#6A6A6A]">
                                                <td class="px-6 py-4">1</td>
                                                <td class="px-6 py-4">Wednesday, 6 March 2024</td>
                                                <td class="px-6 py-4">09:53:40 AM </td>
                                                <td class="px-6 py-4">15:06:40 PM</td>
                                                <td class="px-6 py-4">5 Hours</td>
                                            </tr>
                                            <tr class="divide-x divide-[#6A6A6A]">
                                                <td class="px-6 py-4">1</td>
                                                <td class="px-6 py-4">Wednesday, 6 March 2024</td>
                                                <td class="px-6 py-4">09:53:40 AM </td>
                                                <td class="px-6 py-4">15:06:40 PM</td>
                                                <td class="px-6 py-4">5 Hours</td>
                                            </tr>
                                            <tr class="divide-x divide-[#6A6A6A]">
                                                <td class="px-6 py-4">1</td>
                                                <td class="px-6 py-4">Wednesday, 6 March 2024</td>
                                                <td class="px-6 py-4">09:53:40 AM </td>
                                                <td class="px-6 py-4">15:06:40 PM</td>
                                                <td class="px-6 py-4">5 Hours</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p class="font-medium">Total Weekly Work Hours : <span class="text-[#EF4444]">56 Hours</span></p>
                </div>
            </div>
        </div>

<script>
  window.addEventListener("load", () => {
  clock();
  function clock() {
    const today = new Date();


    const hours = today.getHours();
    const minutes = today.getMinutes();

    const hour = hours < 10 ? "0" + hours : hours;
    const minute = minutes < 10 ? "0" + minutes : minutes;

    const hourTime = hour > 24 ? hour - 24 : hour;

    const ampm = hour < 12 ? "AM" : "PM";

    const month = today.getMonth();
    const year = today.getFullYear();
    const day = today.getDate();
    const currentDayOfWeek = today.getDay();
    
    const daysOfWeek = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
    
    const monthList = [
      "January",
      "February",
      "March",
      "April",
      "May",
      "June",
      "July",
      "August",
      "September",
      "October",
      "November",
      "December"
    ];

    const date = daysOfWeek[currentDayOfWeek] + ", " + day + " " + monthList[month] + " " + year;

    document.getElementById("current-date").innerHTML = date;
    document.getElementById("current-hour").innerHTML = hourTime;
    document.getElementById("current-minute").innerHTML = minute;
    setTimeout(clock, 1000);
  }
});

    const btn = document.getElementById('checkin');

    btn.addEventListener('click', function handleClick() {
      const initialText = 'Check In';

      if (btn.textContent.toLowerCase().includes(initialText.toLowerCase())) {
        btn.textContent = 'Check Out';
      } 
      else {
        btn.textContent = initialText;
      }
    });

    // Schedule Time Input Pop Up
    const schedule_1 = document.querySelector("#edit-schedule-1");
    const schedule_2 = document.querySelector("#edit-schedule-2");
    const schedule_3 = document.querySelector("#edit-schedule-3");
    const schedule_4 = document.querySelector("#edit-schedule-4");
    const schedule_5 = document.querySelector("#edit-schedule-5");
    const schedule_6 = document.querySelector("#edit-schedule-6");
    const schedule_7 = document.querySelector("#edit-schedule-7");

    const time_1 = document.querySelector("#edit-time-1");
    const time_2 = document.querySelector("#edit-time-2");
    const time_3 = document.querySelector("#edit-time-3");
    const time_4 = document.querySelector("#edit-time-4");
    const time_5 = document.querySelector("#edit-time-5");
    const time_6 = document.querySelector("#edit-time-6");
    const time_7 = document.querySelector("#edit-time-7");

    schedule_1.addEventListener("click", () => {
        time_1.classList.remove("hidden");
        document.body.style.overflow = "hidden";
    });

    schedule_2.addEventListener("click", () => {
        time_2.classList.remove("hidden");
        document.body.style.overflow = "hidden";
    });
    
    schedule_3.addEventListener("click", () => {
        time_3.classList.remove("hidden");
        document.body.style.overflow = "hidden";
    });

    schedule_4.addEventListener("click", () => {
        time_4.classList.remove("hidden");
        document.body.style.overflow = "hidden";
    });

    schedule_5.addEventListener("click", () => {
        time_5.classList.remove("hidden");
        document.body.style.overflow = "hidden";
    });

    schedule_6.addEventListener("click", () => {
        time_6.classList.remove("hidden");
        document.body.style.overflow = "hidden";
    });

    schedule_7.addEventListener("click", () => {
        time_7.classList.remove("hidden");
        document.body.style.overflow = "hidden";
    });
    
    function close() {
        time_1.classList.add("hidden");
        time_2.classList.add("hidden");
        time_3.classList.add("hidden");
        time_4.classList.add("hidden");
        time_5.classList.add("hidden");
        time_6.classList.add("hidden");
        time_7.classList.add("hidden");
        document.body.style.overflow = "auto";
    }

    const closeBtn = document.querySelector("#close-btn");
    closeBtn.addEventListener("click", () => {
        close();
    });



    document.addEventListener("click", (event) => {
        if (!isInside(event.target, time_1) && !isInside(event.target, schedule_1)) {
            close();
        }
        if (event.target === time_1 && !time_1.contains(event.target)) {
            close();
        }
        if (event.target === time_2 && !time_2.contains(event.target)) {
            close();
        }
        if (event.target === time_3 && !time_3.contains(event.target)) {
            close();
        }
        if (event.target === time_4 && !time_4.contains(event.target)) {
            close();
        }
        if (event.target === time_5 && !time_5.contains(event.target)) {
            close();
        }
        if (event.target === time_6 && !time_6.contains(event.target)) {
            close();
        }
        if (event.target === time_7 && !time_7.contains(event.target)) {
            close();
        }
    });

</script>
@endsection