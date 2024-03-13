<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ $title }}</title>

        @vite(['resources/css/app.css', 'resources/js/attendance/structure.js', 'resources/js/attendance/take-attendance.js', 'resources/js/attendance/view-report.js', 'resources/js/attendance/input-schedule.js'])

    </head>
    <body class="min-h-screen font-sans antialiased">
        <x-set-schedule />
        <livewire:toasts />
        <div>@include('components.authenticated-navbar')</div>

        <div class="hidden space-y-6 p-10 pb-16 md:block">
    <div class="space-y-0.5">
        <h2 class="text-2xl font-bold tracking-tight">Attendance</h2>
        <p class="text-[#595960]">Manage your work schedule and attendance here.</p>
    </div>

    <div class="shrink-0 bg-[#E2E8F0] h-[1px] w-full my-6"></div>

    <div class="flex flex-col space-y-8 lg:flex-row lg:space-x-12 lg:space-y-0">
        <aside class="-mx-4 lg:w-1/5">
            @include('components.sidebar')
        </aside>

        @yield('content')
    </div>
    @livewireScriptConfig
    </body>
</html>
