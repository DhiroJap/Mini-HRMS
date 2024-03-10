@if ($group == "profile")
    <x-sidebar-button id="edit-profile-button" btn_name="Edit Profile" />
    <x-sidebar-button id="change-password-button" btn_name="Change Password" />
@else
    <x-sidebar-button id="take-attendance-button" btn_name="Take Attendance"/>
    <x-sidebar-button id="input-schedule-button" btn_name="Input Schedule" />
    <x-sidebar-button id="report-button" btn_name="Report" />
@endif
