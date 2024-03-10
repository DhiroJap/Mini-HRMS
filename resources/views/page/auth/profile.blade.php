@extends('layout.profile-layout')

@section('content')
<div id="edit-profile-content" class="flex-1 lg:max-w-2xl">
            <div class="space-y-6">
                <div class="">
                    <h3 class="text-lg font-medium">Edit Profile</h3>
                    <p class="text-sm text-[#595960]">This is how your profile will be displayed.</p>
                </div>

                <div class="shrink-0 bg-[#E2E8F0] h-[1px] w-full"></div>

                <form id="edit-form-profile" action="{{route('profile.update')}}" method="POST" class="space-y-8" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <x-editprofile-input desc="This is your public display name." name="username" label="Username" input_id='edit-username' error_id="edit-username-error" placeholder="{{$user->username}}" autocomplete="off" type="text" />
                    <x-editprofile-input desc="This is your public email." name="email" label="Email" input_id="edit-email" error_id="edit-email-error" placeholder="{{$user->email}}" autocomplete="off" type="text" />
                    <x-editprofile-input desc="This is your birth first name." name="first_name" label="First Name" input_id="edit-first-name" error_id="edit-first-name-error" placeholder="{{$user->first_name}}" autocomplete="off" type="text" />
                    <x-editprofile-input desc="This is your birth last name." name="last_name" label="Last Name" input_id="edit-last-name" error_id="edit-last-name-error" placeholder="{{$user->last_name}}" autocomplete="off" type="text" />

                    <div class="space-y-2">
                        <label for="avatar" id="avatar" class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70">Avatar</label>
                        <div class="flex items-center">
                            <div class="h-40 w-40 rounded-full bg-gray-200 border-solid border-gray-300 border-2 mb-4 flex items-center justify-center relative overflow-hidden mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="8rem" height="8rem" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user absolute stroke-gray-400"></svg>
                                <img src="images/{{$user->avatar}}" alt="" class="w-full h-auto object-cover rounded-full border-0 absolute">
                            </div>
                        <div class="flex flex-col">
                        <input type="file" id="edit-avatar" name="avatar" class="mb-2" />
                    </div>
                </div>
                <p class="text-sm text-[#595960]">This is your public display avatar.</p>
                <p id="edit-avatar-error" class="text-sm font-medium text-red-600"></p>
            </div>  
                <button id="edit-button-profile" type="submit" class="mt-2 inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-[#FFFFFF] transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#2563EB] focus-visible:ring-offset-2 bg-[#2563EB] text-[#F8FAFC] hover:bg-[#2563EB]/90 h-9 px-3 disabled:hover:bg-gray-400">Update</button>
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

        <form action="" class="space-y-8" >
            @csrf
            <x-editprofile-input input_id='edit-password' error_id='edit-password-error' desc="This is your account password." label="Password" id="password" autocomplete="off" type="password" />
            <button class="mt-2 inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-[#FFFFFF] transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#2563EB] focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-[#2563EB] text-[#F8FAFC] hover:bg-[#2563EB]/90 h-9 px-3">Update</button>
        </form>
    </div>
</div>
@endsection
