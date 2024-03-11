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
                                        <x-input-schedule-row day="monday" />
                                        <x-input-schedule-row day="tuesday" />
                                        <x-input-schedule-row day="wednesday" />
                                        <x-input-schedule-row day="thursday" />
                                        <x-input-schedule-row day="friday" />
                                        <x-input-schedule-row day="saturday" />
                                        <x-input-schedule-row day="sunday" />
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex items-center justify-end">
                    <p class="font-medium mx-4" id="total-work-hour">Work Hours: <span class="text-[#EF4444]" >0 Hours</span></p>
                    <button class="w-auto justify-center rounded-md font-semibold bg-blue-600 px-3 py-2  text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">Save Schedule</button>
                </div>                
            </div>
        </div>

        <div class="hidden modal" id="day-modal">
            <div class="left-0 top-0 fixed w-screen h-screen z-50">
                <div class="outside bg-black bg-opacity-40 backdrop-blur-sm h-full w-full absolute" id=""> </div>
                <div class="w-full h-full flex items-center justify-center z-10">
                    <div class="relative p-4 w-full max-w-2xl">
                        <div class="bg-white rounded-lg border-2 border-[#6A6A6A] py-4">
                            <!-- Modal header -->
                            <div class="flex items-center justify-between p-4 md:p-5 md:mx-4">
                                <h3 class="text-xl font-semibold text-black" id="day">
                                    
                                </h3>
                                <button type="button" class="modal-close bg-transparent hover:bg-gray-200 rounded-full text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="default-modal" id="">
                                    <svg stroke="currentColor" fill="black" stroke-width="2" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><path d="M256 48a208 208 0 1 1 0 416 208 208 0 1 1 0-416zm0 464A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM175 175c-9.4 9.4-9.4 24.6 0 33.9l47 47-47 47c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l47-47 47 47c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-47-47 47-47c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-47 47-47-47c-9.4-9.4-24.6-9.4-33.9 0z"></path></svg>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <form>
                                @csrf
                                <div class="flex justify-center items-center p-4 md:p-5 md:mx-4">
                                    <div class="flex justify-between w-full">
                                        <div class="flex-row w-full mr-4">
                                            <label for="start" class="flex my-2 text-lg">From Hour</label>
                                            <input type="time" id="start" class="rounded-lg border-2 border-[#6A6A6A] px-2 py-1 w-full">
                                        </div>
                                        <div class="flex-row w-full ml-4">
                                            <label for="end" class="flex my-2 text-lg">To Hour</label>
                                            <input type="time" id="end" class="rounded-lg border-2 border-[#6A6A6A] px-2 py-1 w-full">
                                        </div>
                                    </div>
                                </div>
                                <div id="error"> </div>
                            </form>
                            <!-- Modal footer -->
                            <div class="flex items-center justify-end p-4 md:p-5 md:mx-4">
                                <button class="confirm px-2.5 py-1.5 bg-[#2563EB] text-white rounded-md mt-3 text-xl hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">Confirm</button>
                            </div>
                        </div>
                    </div>
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

<script src="https://unpkg.com/alpinejs"></script>
<script>
    // Load Attendance Time
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

    // Updating Day and Time
    function updateTime() {
        const element = document.getElementById("current-time");
        const now = new Date();
        const formattedTime = now.toLocaleString("en-ID", {
            weekday: 'long',
            day: '2-digit',
            month: 'long',
            year: 'numeric',
            hour: 'numeric',
            minute: '2-digit',
            second: '2-digit',
            hour12: true,
        });
        element.innerHTML = `Today is ${formattedTime}`;
    }

    updateTime();

    setInterval(updateTime, 1000);

    // Input Schedule Front End
    let schedule = {};
    
    document.addEventListener("alpine:init", () => {
        document.querySelectorAll("td[data-day]").forEach(td => {
            td.innerHTML = `00:00 AM - 00:00 AM (0 hr 0m)`;
        });

        let openModal = (day) => {
            document.getElementById("day-modal").classList.remove("hidden");
            document.body.style.overflow = "hidden";
            let modalBody = document.getElementById("day");
            switch (day) {
                case "monday":
                    modalBody.innerHTML = "Monday";
                    break;
                case "tuesday":
                    modalBody.innerHTML = "Tuesday";
                    break;
                case "wednesday":
                    modalBody.innerHTML = "Wednesday";
                    break;
                case "thursday":
                    modalBody.innerHTML = "Thursday";
                    break;
                case "friday":
                    modalBody.innerHTML = "Friday";
                    break;
                case "saturday":
                    modalBody.innerHTML = "Saturday";
                    break;
                case "sunday":
                    modalBody.innerHTML = "Sunday";
                    break;
            }
            
        };

        document.querySelectorAll("button[data-day]").forEach(button => {
            button.addEventListener("click", () => {
                let day = button.dataset.day;
                openModal(day);
            })
        });

        document.querySelector(".modal-close").addEventListener("click", () => {
            closeModal();
        });
        document.querySelector(".outside").addEventListener("click", () => {
            closeModal();
        });

        
    });

    document.querySelector(".confirm").addEventListener("click", () => {
        const start_hour_minute = document.getElementById("start").value.split(":");
        const end_hour_minute = document.getElementById("end").value.split(":");
    
        const start_hour = start_hour_minute[0];
        const start_minute = start_hour_minute[1];
    
        const end_hour = end_hour_minute[0];
        const end_minute = end_hour_minute[1];
    
        const start_time = new Date();
        const end_time = new Date();
    
        start_time.setHours(start_hour);
        start_time.setMinutes(start_minute);
    
        end_time.setHours(end_hour);
        end_time.setMinutes(end_minute);
        
        if(document.getElementById("start").value !== "" && document.getElementById("end") !== "") {
            const [total_hour, total_minute, total_work] = subtractTime(start_time, end_time);
            if(start_hour >= end_hour) {
                document.querySelector("#error").innerHTML = `<p class="px-4 md:px-5 md:mx-4 text-[#EF4444]">Invalid time range</p>`;
            }
            else {
                const set_time_result = `${changeTimeFormat(start_hour, start_minute)} - ${changeTimeFormat(end_hour, end_minute)} (${total_hour} hr ${total_minute}m)`;
            
                const day = document.getElementById('day').innerHTML.toLowerCase();

                schedule[day] = {
                    start: `${start_hour}:${start_minute}`,
                    end: `${end_hour}:${end_minute}`,
                    total_work: total_work,
                };
                
                totalWorkHour();
                closeModal();
                
                const targetTd = document.querySelector(`td[data-day="${day}"]`);
                targetTd.innerHTML = set_time_result;
            }
        }
        else {
            document.querySelector("#error").innerHTML = `<p class="px-4 md:px-5 md:mx-4 text-[#EF4444]">Must input time</p>`;
        }
    });

    function totalWorkHour() {
        let total_minute = 0;

        for(const day in schedule) {
            const{total_work} = schedule[day];
            total_minute = total_minute + total_work;
        }
    
        let total_hour = Math.floor(total_minute / 60);
        if(total_hour >= 20) {
            document.querySelector("#total-work-hour").innerHTML = `
                Work Hours: <span class="text-[#2563EB]" >${total_hour} Hours
            `;
        }
        else {
            document.querySelector("#total-work-hour").innerHTML = `
                Work Hours: <span class="text-[#EF4444]" >${total_hour} Hours
            `;
        }
    }
    

    function closeModal() {
        document.getElementById("day-modal").classList.add("hidden");
        document.getElementById('start').value = "";
        document.getElementById('end').value = "";
        document.querySelector("#error").innerHTML = ``;
        document.body.style.overflow = "auto";
    }

    function subtractTime(start_time, end_time) {
        let total_minute_start = (start_time.getHours() * 60) + start_time.getMinutes();
        let total_minute_end = (end_time.getHours() * 60) + end_time.getMinutes();

        let total_work = total_minute_end - total_minute_start;

        if(start_time.getHours() <= 12 && end_time.getHours() >= 13) {
            total_work = total_work - 60;
        }

        let hour = Math.floor(total_work / 60);
        let minute = total_work % 60;

        return [hour, minute, total_work];
    }

    function changeTimeFormat(total_hour, total_minute) {
        const ampm = total_hour >= 12 ? "PM" : "AM";

        total_hour = total_hour % 12;
        total_hour = total_hour === 0 ? 12 : total_hour;
        total_hour = total_hour < 10 ? '0' + total_hour : total_hour;

        return `${total_hour}:${total_minute} ${ampm}`;
    }

</script>
@endsection