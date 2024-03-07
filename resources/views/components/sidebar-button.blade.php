@props(['btn_name', 'route', 'active'])

<nav class="flex space-x-2 lg:flex-col lg:space-x-0 lg:space-y-1">
    <a href="{{ $route }}" {{ $attributes->merge(['class' => "inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-[#FFFFFF] transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#020817] focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 hover:bg-[#F1F5F9] hover:text-[#0F172A] h-10 px-4 py-2 " . ($active['key'] === $active['value'] ? "bg-[#F1F5F9] hover:bg-[#F1F5F9]" : "hover:bg-transparent hover:underline")]) }} >{{ $btn_name }}</a>
</nav>