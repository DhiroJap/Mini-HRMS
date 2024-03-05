<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="min-h-screen font-sans antialiased">
        <!-- NavBar pindah ke folder component -->
        @include('component.navbar')

        <!-- Placeholder untuk content per page -->
        @yield('content')  
    </body>
</html>
