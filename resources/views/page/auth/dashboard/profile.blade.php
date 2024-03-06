@extends('layout.layout')

@section('content')
<div class="lg:px-8 mx-24 my-12">
    <!-- Buat kasih tau lagi di menu apa (reusable)-->
    @include('layout.headergroup')
</div>
<div class="flex min-h-screen items-start justify-start lg:px-8 mx-24 my-12">
    <!-- Sidebar (reusable) -->
    @include('layout.sidebar')
    <form class="mx-32 w-full">
        <!-- Untuk nunjukkin lagi di page apa di menu tersebut (reusable) -->
        @include("layout.headerpage")
        <!-- Username -->
        <div class="mb-4">
            <h3 class="mb-4 font-semibold">Username</h3>
            <input id="username" name="username" type="username" autocomplete="off" class="w-full border-solid border-gray-300 border-2 rounded-md px-4 py-0.5 text-gray-400 mb-4">
            <h3>This is your public display name.</h3>
        </div>
        <!-- E-mail -->
        <div class="mb-4">
            <h3 class="mb-4 font-semibold">Email</h3>
            <input id="email" name="email" type="email" autocomplete="off" class="w-full border-solid border-gray-300 border-2 rounded-md px-4 py-0.5 text-gray-400 mb-4">
            <h3>This is your public display email.</h3>
        </div>
        <!-- First Name -->
        <div class="mb-4">
            <h3 class="mb-4 font-semibold">First Name</h3>
            <input id="firstname" name="firstname" type="firstname" autocomplete="off" class="w-full border-solid border-gray-300 border-2 rounded-md px-4 py-0.5 text-gray-400 mb-4">
            <h3>This is your birth first name.</h3>
        </div>
        <!-- Last Name -->
        <div class="mb-4">
            <h3 class="mb-4 font-semibold">Last Name</h3>
            <input id="lastname" name="lastname" type="lastname" autocomplete="off" class="w-full border-solid border-gray-300 border-2 rounded-md px-4 py-0.5 text-gray-400 mb-4">
            <h3>This is your birth last name.</h3>
        </div>
        <!-- Avatar -->
        <div class="mb-4">
            <h3 class="mb-4 font-semibold">Avatar</h3>
            <div class="h-40 w-40 rounded-full bg-gray-200 border-solid border-gray-300 border-2 mb-4"></div>
            <h3>This is your public display avatar.</h3>
        </div>
        <!-- Password -->
        <div class="mb-4">
            <h3 class="mb-4 font-semibold">Password</h3>
            <input id="password" name="password" type="password" autocomplete="off" class="w-full border-solid border-gray-300 border-2 rounded-md px-4 py-0.5 mb-4">
            <h3>This is your account password.</h3>
        </div>
        <div class="mb-4">
            <button class="px-8 py-2 bg-blue-500 text-white font-medium rounded-lg">Update</button>
        </div>
    </form>
</div>

@endsection