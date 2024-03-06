<nav class="flex flex-col">
    @if ( $active == "Dashboard" )
        <a href="" class="text-xl font-semibold">Profile</a>
    @elseif ( $title == "Attendance" )
        <a href="">Input Schedule</a>
        <a href="">Report</a>
        <a href="">Take Attendance</a>
    @endif
</nav>