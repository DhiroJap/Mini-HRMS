<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ $title }}</title>
        
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
    </head>
    <body class="min-h-screen font-sans antialiased">
        <!-- <livewire:toasts /> -->
        <div>@include('layout.authenticated-navbar')</div>
        @yield('content')
        <!-- @livewireScriptConfig -->
    </body>
</html>
