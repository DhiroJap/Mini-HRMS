<nav class='sticky h-14 inset-x-0 top-0 z-30 w-full border-b border-gray-200 bg-white/75 backdrop-blur-lg transition-all'>
    <div class="mx-auto w-full max-w-screen-xl px-2.5 md:px-20">
        <div class="flex h-14 items-center justify-between border-b border-zinc-200">
            <a href="/attendance" class="z-40 font-semibold">hrms.</a>

            <div class="hidden items-center space-x-10 sm:flex">
                <a href="/login" class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-[#FFFFFF] transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#2563EB] focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 h-9 px-3 {{ (Request::is('login') || Request::is('/')  ? 'bg-[#2563EB] text-[#F8FAFC] hover:bg-[#2563EB]/90' : 'hover:bg-[#F1F5F9] hover:text-[#0F172A]') }}">Login</a>
                <a href="/register" class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-[#FFFFFF] transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#2563EB] focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 h-9 px-3 {{ (Request::is('register') ? 'bg-[#2563EB] text-[#F8FAFC] hover:bg-[#2563EB]/90' : 'hover:bg-[#F1F5F9] hover:text-[#0F172A]') }}">Register</a>
            </div>
            
        </div>
    </div>
</nav>
