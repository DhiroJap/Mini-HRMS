@extends('layout.default')

@section('content')
<div class="hidden space-y-6 p-10 pb-16 md:block">
    <div class="space-y-0.5">
        <h2 class="text-2xl font-bold tracking-tight">Attendance</h2>
        <p class="text-[#595960]">Manage your work schedule and attendance here.</p>
    </div>

    <div class="shrink-0 bg-[#E2E8F0] h-[1px] w-full my-6"></div>

    <div class="flex flex-col space-y-8 lg:flex-row lg:space-x-12 lg:space-y-0">
        <aside class="-mx-4 lg:w-1/5">
            @include('layout.sidebar')
        </aside>
        <div class="flex-1 lg:max-w-2xl">
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
    </div>    
</div>

<script>
    window.addEventListener("load", () => {
  clock();
  function clock() {
    const today = new Date();

    // get time components
    const hours = today.getHours();
    const minutes = today.getMinutes();

    //add '0' to hour, minute & second when they are less 10
    const hour = hours < 10 ? "0" + hours : hours;
    const minute = minutes < 10 ? "0" + minutes : minutes;

    //make clock a 12-hour time clock
    const hourTime = hour > 24 ? hour - 24 : hour;

    // if (hour === 0) {
    //   hour = 12;
    // }
    //assigning 'am' or 'pm' to indicate time of the day
    const ampm = hour < 12 ? "AM" : "PM";

    // get date components
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

    //get current date and time
    const date = daysOfWeek[currentDayOfWeek] + ", " + day + " " + monthList[month] + " " + year;

    //print current date and time to the DOM
    document.getElementById("current-date").innerHTML = date;
    document.getElementById("current-hour").innerHTML = hourTime;
    document.getElementById("current-minute").innerHTML = minute;
    setTimeout(clock, 1000);
  }
});

const btn = document.getElementById('checkin');

// ✅ Change button text on click
btn.addEventListener('click', function handleClick() {
  const initialText = 'Check In';

  if (btn.textContent.toLowerCase().includes(initialText.toLowerCase())) {
    btn.textContent = 'Check Out';
  } 
  else {
    btn.textContent = initialText;
    }
});

</script>
@endsection