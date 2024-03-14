@extends('layout.default')

@section('content')
<div class="flex flex-col min-h-screen items-center justify-center px-4 sm:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-lg">
        <form class="space-y-2" action="/register" method="POST" id="register-form">
            @csrf
            <div class="border-solid border-gray-300 border-2 rounded-lg">
                <label for="email" class="block text-sm font-normal leading-6 text-gray-400 px-2">Email address</label>
                <div class="my-1">
                    <input id="register-email" name="email" type="text" autocomplete="off" class="block w-full border-none py-1 text-gray-900 shadow-sm placeholder:text-gray-400 focus:outline-none sm:text-md sm:leading-6 px-2">
                    <p id="register-email-error" class="text-sm font-medium text-red-600 px-2"></p>
                </div>
            </div>
            <div class="flex flex-row gap-2 " >
                <div class="border-solid border-gray-300 border-2 rounded-lg basis-1/2">
                    <label for="firstName" class="block text-sm font-normal leading-6 text-gray-400 px-2">First Name</label>
                    <input id="register-first-name" name="first_name" type="text" autocomplete="off" class="block w-full border-none py-1 text-gray-900 shadow-sm placeholder:text-gray-400 focus:outline-none sm:text-md sm:leading-6 px-2">
                    <p id="register-first-name-error" class="text-sm font-medium text-red-600 px-2"></p>
                </div>
                <div class="border-solid border-gray-300 border-2 rounded-lg basis-1/2">
                    <label for="lastName" class="block text-sm font-normal leading-6 text-gray-400 px-2">Last Name</label>
                    <input id="register-last-name" name="last_name" type="text" autocomplete="off" class="block w-full border-none py-1 text-gray-900 shadow-sm placeholder:text-gray-400 focus:outline-none sm:text-md sm:leading-6 px-2">
                    <p id="register-last-name-error" class="text-sm font-medium text-red-600 px-2"></p>
                </div>
            </div>
            <div class="border-solid border-gray-300 border-2 rounded-lg">
                <label for="password" class="block text-sm font-normal leading-6 text-gray-400 px-2">Password</label>
                <div class="my-1">
                    <input id="register-password" name="password" type="password" autocomplete="off" class="block w-full border-none py-1 text-gray-900 shadow-sm placeholder:text-gray-400 focus:outline-none sm:text-md sm:leading-6 px-2">
                    <p id="register-password-error" class="text-sm font-medium text-red-600 px-2"></p>
                </div>
            </div>
            <div class="border-solid border-gray-300 border-2 rounded-lg">
                <label for="confirmPassword" class="block text-sm font-normal leading-6 text-gray-400 px-2">Confirm Password</label>
                <div class="my-1">
                    <input id="register-confirm-password" name="confirm_password" type="password" autocomplete="off" class="block w-full border-none py-1 text-gray-900 shadow-sm placeholder:text-gray-400 focus:outline-none sm:text-md sm:leading-6 px-2">
                    <p id="register-confirm-password-error" class="text-sm font-medium text-red-600 px-2"></p>
                </div>
            </div>
            <div>
                <button id="register-button" type="submit" class="flex w-full justify-center rounded-md font-semibold bg-blue-600 px-3 py-2.5 text-lg leading-6 text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">Register</button>
            </div>
        </form>


        <p class="mt-2 text-center text-sm text-gray-500">
            Already have an account?
            <a href="/login" class="font-semibold leading-6 text-blue-600 hover:text-blue-500 underline decoration-2 underline-offset-4">Login</a>
        </p>
        
    </div>
</div>
@endsection