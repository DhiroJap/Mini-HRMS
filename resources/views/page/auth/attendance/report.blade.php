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
                                        <thead class="bg-[#2563EB] font-medium text-black">
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
                                        <thead class="bg-[#2563EB] font-medium text-black">
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
    </div>
</div>
@endsection