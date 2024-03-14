@extends('layout.profile-layout')

@section('content')
<div id="edit-profile-content" class="flex-1 lg:max-w-lg">
    <div class="space-y-6">
        <div class="">
            <h3 class="text-lg font-medium">Edit Profile</h3>
            <p class="text-sm text-[#595960]">This is how your profile will be displayed.</p>
        </div>
    
        <div class="shrink-0 bg-[#E2E8F0] h-[1px] w-full"></div>
    
        <form id="edit-form-profile" action="{{route('updateProfile')}}" method="POST" class="space-y-8" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <x-editprofile-input desc="This is your public display name." name="username" label="Username" input_id='edit-username' error_id="edit-username-error" placeholder="{{$user->username}}" autocomplete="off" type="text" />
            <x-editprofile-input desc="This is your public email." name="email" label="Email" input_id="edit-email" error_id="edit-email-error" placeholder="{{$user->email}}" autocomplete="off" type="text" />
            <x-editprofile-input desc="This is your birth first name." name="first_name" label="First Name" input_id="edit-first-name" error_id="edit-first-name-error" placeholder="{{$user->first_name}}" autocomplete="off" type="text" />
            <x-editprofile-input desc="This is your birth last name." name="last_name" label="Last Name" input_id="edit-last-name" error_id="edit-last-name-error" placeholder="{{$user->last_name}}" autocomplete="off" type="text" />
    
            <!-- <div class="space-y-2">
                <label for="avatar" id="avatar" class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70">Avatar</label>
                <div class="flex items-center">
                    <div class="shrink-0 h-28 w-28 rounded-full bg-gray-200 border-solid border-gray-300 border-2 mb-4 flex items-end justify-center relative overflow-hidden mr-4">
                        <img src="images/{{$user->avatar}}" class="object-cover w-full h-full rounded-full border-0">
                        <div class="absolute bg-black bg-opacity-40 w-full h-full rounded-full flex flex-col justify-center items-center hover:opacity-100 transition-opacity xl:opacity-0">
                            <svg stroke="white" fill="currentColor" stroke-width="0" viewBox="0 0 512 512" height="35px" width="35px" xmlns="http://www.w3.org/2000/svg" class=""><path fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="m350.54 148.68-26.62-42.06C318.31 100.08 310.62 96 302 96h-92c-8.62 0-16.31 4.08-21.92 10.62l-26.62 42.06C155.85 155.23 148.62 160 140 160H80a32 32 0 0 0-32 32v192a32 32 0 0 0 32 32h352a32 32 0 0 0 32-32V192a32 32 0 0 0-32-32h-59c-8.65 0-16.85-4.77-22.46-11.32z"></path><path fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M124 158v-22h-24v22m235.76 127.22v-13.31a80 80 0 0 0-131-61.6M176 258.78v13.31a80 80 0 0 0 130.73 61.8"></path><path fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="m196 272-20-20-20 20m200 0-20 20-20-20"></path></svg>
                            <p class="text-xs text-white text-center">Click to change picture</p>
                            <input type="file" id="edit-avatar" name="avatar" class="h-full w-full rounded-full opacity-0 absolute" />
                        </div>
                        
                    </div>
                <div class="flex flex-col"></div>
                </div>
                <p class="text-sm text-[#595960]">This is your public display avatar.</p>
                <p id="edit-avatar-error" class="text-sm font-medium text-red-600"></p>
            </div> -->
            <div class="space-y-2">
                <label for="avatar" id="avatar" class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70">Avatar</label>
                <div class="sm:flex items-center block">
                    <div class="shrink-0 h-28 w-28 rounded-full bg-gray-200 border-solid border-gray-300 border-2 mb-4 flex items-center justify-center relative overflow-hidden mr-4">
                        <img src="images/{{$user->avatar}}" class="object-cover w-full h-full rounded-full border-0">
                    </div>
                    <div class="flex flex-col">
                        <input type="file" id="edit-avatar" name="avatar" class="mb-2 text-sm" />
                    </div>
                </div>
                <p class="text-sm text-[#595960]">This is your public display avatar.</p>
                <p id="edit-avatar-error" class="text-sm font-medium text-red-600"></p>
            </div>
            <button id="edit-button-profile" type="submit" class="mt-2 inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-[#FFFFFF] transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#2563EB] focus-visible:ring-offset-2 bg-[#2563EB] text-[#F8FAFC] hover:bg-[#2563EB]/90 h-10 px-4 disabled:hover:bg-gray-400">Update</button>
        </form>
    </div>
</div>

<div id="change-password-content" class="hidden flex-1 lg:max-w-2xl">
    <div class="space-y-6">
        <div>
            <h3 class="text-lg font-medium">Change Password</h3>
            <p class="text-sm text-[#595960]">This is where you change your account password.</p>
        </div>

        <div class="shrink-0 bg-[#E2E8F0] h-[1px] w-full"></div>

        <form action="{{route('changePassword')}}" method="POST" class="space-y-4" >
            @csrf
            @method('PUT')
            <x-editprofile-input name="new_password" input_id='change-password' error_id='change-password-error' desc="This will be your new account password." label="Password" id="password" autocomplete="off" type="password" />
            <button id="change-password-form-button" class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-[#FFFFFF] transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#2563EB] focus-visible:ring-offset-2 bg-[#2563EB] text-[#F8FAFC] hover:bg-[#2563EB]/90 h-9 px-3 disabled:hover:bg-gray-400">Update</button>
        </form>
    </div>
</div>

@endsection
