@extends('layout.default')

@section('content')
<div class="hidden space-y-6 p-10 pb-16 md:block">
    <div class="space-y-0.5">
        <h2 class="text-2xl font-bold tracking-tight">Profile</h2>
        <p class="text-[#595960]">Manage your account settings here.</p>
    </div>

    <div class="shrink-0 bg-[#E2E8F0] h-[1px] w-full my-6"></div>

    <div class="flex flex-col space-y-8 lg:flex-row lg:space-x-12 lg:space-y-0">
        <aside class="-mx-4 lg:w-1/5">
            @include('layout.sidebar')
        </aside>
        <div class="flex-1 lg:max-w-2xl">
            <div class="space-y-6">
                <div class="">
                    <h3 class="text-lg font-medium">Edit Profile</h3>
                    <p class="text-sm text-[#595960]">This is how your profile will be displayed.</p>
                </div>

                <div class="shrink-0 bg-[#E2E8F0] h-[1px] w-full"></div>

                <form action="" class="space-y-8">
                    <x-editprofile-input desc="This is your public display name." label="Username" id="username" placeholder="dhirojap" autocomplete="off" type="text" />
                    <x-editprofile-input desc="This is your public email." label="Email" id="email" placeholder="dhirojap@binus.edu" autocomplete="off" type="text" />
                    <x-editprofile-input desc="This is your birth first name." label="First Name" id="first_name" placeholder="Dhiro" autocomplete="off" type="text" />
                    <x-editprofile-input desc="This is your birth last name." label="Last Name" id="last_name" placeholder="Jap" autocomplete="off" type="text" />

                    <!-- Avatar (MASIH BINGUNG COYYY, BERAT INI WKWKWKWKW) -->
                    <div class="space-y-2">
                        <label for="avatar" id="avatar" class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70">Avatar</label>
                        <div class="h-40 w-40 rounded-full bg-gray-200 border-solid border-gray-300 border-2 mb-4"></div>
                        <p class="text-sm text-[#595960]">This is your public display avatar.</p>
                    </div>

                    <x-editprofile-input desc="This is your account password." label="Password" id="password" autocomplete="off" type="password" />
                </form>

                <button class="mt-2 inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-[#FFFFFF] transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#2563EB] focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-[#2563EB] text-[#F8FAFC] hover:bg-[#2563EB]/90 h-9 px-3">Update</button>
            </div>
        </div>
    </div>
</div>
@endsection