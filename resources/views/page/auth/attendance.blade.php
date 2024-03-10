@extends('layout.attendance-layout')

@section('content')
        <div id="take-attendance-content" class="flex-1 lg:max-w-2xl">
            <div class="space-y-6">
                <div>
                    <h3 class="text-lg font-medium">Take attandance</h3></div>
                    <p class="text-sm text-[#595960]">This is where you verify your attendance.</p>
                </div>
                
                <div class="shrink-0 bg-[#E2E8F0] h-[1px] w-full"></div>

                <div class="flex flex-col justify-center items-center">
                    <p id="current-date" class="text-5xl mb-5 font-bold">  </p>
                    <div class="flex gap-1">
                        <p id="current-hour" class="flex text-9xl font-extrabold w-52 h-36 bg-gray-200 border-gray rounded-2xl justify-center">  </p>
                        <p id="current-minute" class="flex text-9xl font-extrabold w-52 h-36 bg-gray-200 border-gray rounded-2xl justify-center"> </p>
                    </div>
                    <form action="/attendance" id="attendanceForm">
                        @csrf
                        <input type="hidden" id="currentTime" name="check_in">
                        <input type="hidden" id="currentDate" name="date">
                        <button onclick="currTime()" id="checkin" class="flex mt-5 w-auto justify-center rounded-md font-semibold bg-blue-600 px-3 py-2.5 text-lg leading-6 text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">Check in</button>
                        
                    </form>  
                    <form action="/attendance" id="attendanceForm">
                        @csrf
                        <input type="hidden" id="attId" name="attendance_id">
                        <input type="hidden" id="currentCheckOut" name="check_out">
                        <button onclick="currOut()" id="checkout" class="hidden flex mt-5 w-auto justify-center rounded-md font-semibold bg-blue-600 px-3 py-2.5 text-lg leading-6 text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">Check out</button>
                    </form>
                
            </div>
        </div>

        <div id="input-schedule-content" class="hidden flex-1 lg:max-w-2xl">
            <h1>input schedule</h1>
        </div>

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

    const reports = {!! json_encode($reports) !!};
    console.log(reports);
    if(reports['check_in'] === reports['check_out'])
    {
        const checkInBtn = document.getElementById("checkin");
        const checkOutBtn = document.getElementById("checkout");
    
        checkInBtn.classList.add("hidden");
        checkOutBtn.classList.remove("hidden");   
    }

    // const checkOutBtn = document.getElementById('checkout');
    // checkOutBtn.addEventListener('click', checkOut);

    // function checkOut()
    // {
    //     var d = new Date();
    //     var timeValue = d.toLocaleTimeString();
    // }

// function currTime() {
//     // Get the current date and time
//     var d = new Date();
//     var timeValue = d.toLocaleTimeString(); // Get current time
//     var monthList = [
//         "January", "February", "March", "April", "May", "June",
//         "July", "August", "September", "October", "November", "December"
//     ];
//     var month = monthList[d.getMonth()];
//     var year = d.getFullYear();
//     var day = d.getDate();
//     var dateValue = year + "-" + month + "-" + day; // Get current date

//     // Set the values to the hidden input fields
//     document.getElementById("currentTime").value = timeValue;
//     document.getElementById("currentDate").value = dateValue;
//     // const checkInBtn = document.getElementById("checkin");
//     // const checkOutBtn = document.getElementById("checkout");
    
//     // checkInBtn.classList.add("hidden");
//     // checkOutBtn.classList.remove("hidden");

//     // Submit the form
//     document.getElementById("attendanceForm").submit();
//     // event.preventdefault();  
// }



const checkInBtn = document.getElementById('checkin');
checkInBtn.addEventListener('click', checkIn);

function checkIn() {
    var d = new Date();
    var timeValue = d.toLocaleTimeString();
    var monthList = [
        "January", "February", "March", "April", "May", "June",
        "July", "August", "September", "October", "November", "December"
    ];
    var month = monthList[d.getMonth()];
    var year = d.getFullYear();
    var day = d.getDate();
    var dateValue = year + "-" + month + "-" + day;
    document.getElementById("currentTime").value = timeValue;
    document.getElementById("currentDate").value = dateValue;

    axios.post('http://127.0.0.1:8000/api/attendance/checkin', {
        check_in: timeValue,
        check_out: timeValue,
        date : dateValue
        }, {
            headers : {
                'Content-Type' : 'application/json'
            }
        })
    .then(response => {
        // Handle response if needed
        console.log(response.data);
    })
    .catch(error => {
        // Handle error if needed
        console.error(error);
    });
}

function currOut()
{
    var d = new Date();
    var timeValue = d.toLocaleTimeString();
    document.getElementById("attId").value = reports['attendance_id'];
    document.getElementById("currentCheckOut").value = timeValue;
    axios.post('http://127.0.0.1:8000/api/attendance/checkout', {
        attendance_id: reports['attendance_id'],
        check_out: timeValue
    })
}


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

</script>
@endsection