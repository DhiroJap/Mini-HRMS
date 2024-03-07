@extends('layout.default')

@section('content')
<div class="flex flex-col min-h-screen items-center justify-center lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-lg">
        <form id="login-form" class="space-y-2">
            @csrf
            <div class="border-solid border-gray-300 border-2 rounded-lg">
                <label for="email" class="block text-sm font-normal leading-6 text-gray-400 px-2">Email Address</label>
                <div class="my-1">
                    <input id="email" name="email" type="text" autocomplete="off" class="block w-full border-none py-1 text-gray-900 shadow-sm placeholder:text-gray-400 focus:outline-none sm:text-md sm:leading-6 px-2">
                </div>
            </div>
            <div class="border-solid border-gray-300 border-2 rounded-lg">
                <label for="password" class="block text-sm font-normal leading-6 text-gray-400 px-2">Password</label>
                <div class="my-1">
                    <input id="password" name="password" type="password" autocomplete="off" class="block w-full border-none py-1 text-gray-900 shadow-sm placeholder:text-gray-400 focus:outline-none sm:text-md sm:leading-6 px-2">
                </div>
            </div>
            <div>
                <button id="login-button" class="flex w-full justify-center rounded-md font-semibold bg-blue-600 px-3 py-2.5 text-lg leading-6 text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">Login</button>
            </div>
        </form>

        <p class="mt-2 text-center text-sm text-gray-500">
            Don't have an account?
            <a href="/register" class="font-semibold leading-6 text-blue-600 hover:text-blue-500 underline decoration-2 underline-offset-4">Register</a>
        </p>
    </div>
</div>

@endsection