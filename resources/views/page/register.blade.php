@extends('layout.default')

@section('content')
<div class ="flex flex-col min-h-screen items-center justify-center ">
    <div class="sm:mx-auto sm:w-full sm:max-w-lg">
        <form class="space-y-2" action="#" method="POST">
            @csrf
            <div class="border-solid border-gray-300 border-2 rounded-lg">
                <label for="email" class="block text-sm font-normal leading-6 text-gray-400 px-2">Email address</label>
                <div class="my-1">
                    <input id="email" name="email" type="email" autocomplete="off" required class="block w-full border-none py-1 text-gray-900 shadow-sm placeholder:text-gray-400 focus:outline-none sm:text-md sm:leading-6 px-2">
                </div>
            </div>
            <div class="flex flex-row gap-2 " >
                <div class="border-solid border-gray-300 border-2 rounded-lg basis-1/2">
                    <label for="firstName" class="block text-sm font-normal leading-6 text-gray-400 px-2">First Name</label>
                    <input id="firstName" name="firstName" type="text" autocomplete="off" required class="block w-full border-none py-1 text-gray-900 shadow-sm placeholder:text-gray-400 focus:outline-none sm:text-md sm:leading-6 px-2">
                </div>
                <div class="border-solid border-gray-300 border-2 rounded-lg basis-1/2">
                    <label for="firstName" class="block text-sm font-normal leading-6 text-gray-400 px-2">Last Name</label>
                    <input id="firstName" name="firstName" type="text" autocomplete="off" required class="block w-full border-none py-1 text-gray-900 shadow-sm placeholder:text-gray-400 focus:outline-none sm:text-md sm:leading-6 px-2">
                </div>
            </div>
            <div class="border-solid border-gray-300 border-2 rounded-lg">
                <label for="password" class="block text-sm font-normal leading-6 text-gray-400 px-2">Password</label>
                <div class="my-1">
                    <input id="password" name="password" type="password" autocomplete="off" required class="block w-full border-none py-1 text-gray-900 shadow-sm placeholder:text-gray-400 focus:outline-none sm:text-md sm:leading-6 px-2">
                </div>
            </div>
            <div>
                <button type="submit" class="flex w-full justify-center rounded-md font-semibold bg-blue-600 px-3 py-2.5 text-lg leading-6 text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">Register</button>
            </div>
        </form>


        <p class="mt-2 text-center text-sm text-gray-500">
            Already have an account?
            <a href="/login" class="font-semibold leading-6 text-blue-600 hover:text-blue-500 underline decoration-2 underline-offset-4">Login</a>
        </p>
        
    </div>
</div>
@stop