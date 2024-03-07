@if ($group == "dashboard")
    <x-sidebar-button btn_name="Edit Profile" route="/profile" :active="['key' => $active, 'value' => 'profile']"/>
@else
    <x-sidebar-button btn_name="Take Attendance" route="/takeattendance" :active="['key' => $active, 'value' => 'take attendance']"/>
    <x-sidebar-button btn_name="Input Schedule" route="/inputschedule" :active="['key' => $active, 'value' => 'input schedule']"/>
    <x-sidebar-button btn_name="Report" route="/report" :active="['key' => $active, 'value' => 'report']"/>
@endif