@if ($group == "dashboard")
    <x-sidebar-button btn_name="Edit Profile" route="/profile" active="profile"/>
@else
    <x-sidebar-button btn_name="Take Attendance" route="/takeattendance" active="takeattendance"/>
    <x-sidebar-button btn_name="Input Schedule" route="/inputschedule" active="inputschedule"/>
    <x-sidebar-button btn_name="Report" route="/report" active="report"/>
@endif