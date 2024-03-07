<nav class='sticky h-14 inset-x-0 top-0 z-30 w-full border-b border-gray-200 bg-white/75 backdrop-blur-lg transition-all'>
    <div class="mx-auto w-full max-w-screen-xl px-2.5 md:px-20">
        <div class="flex h-14 items-center justify-between border-b border-zinc-200">
            <h1 class="z-40 font-semibold">hrms.</h1>

            <!-- Kalau mau liat dropdown-nya keluarin aja dari auth-nya atau (@auth, @else, @endauth) dihapus -->
            @auth
                <!-- Dropdown Profile -->
                <div class="relative inline-block text-left">
                    <button type="button" class="sm:flex w-full justify-center items-center space-x-4" id="menu-button">
                        <p>Welcome, <span class="text-[#009ADB]">Dhiro Jap</span></p>
                        <div class="h-8 w-8 rounded-full bg-gray-200 border-solid border-gray-300 border-2"></div>
                    </button>

                    <!--
                        Dropdown menu, show/hide based on menu state.

                        Entering: "transition ease-out duration-100"
                        From: "transform opacity-0 scale-95"
                        To: "transform opacity-100 scale-100"
                        Leaving: "transition ease-in duration-75"
                        From: "transform opacity-100 scale-100"
                        To: "transform opacity-0 scale-95"
                    -->

                    <div class="absolute right-0 z-10 mt-2 w-56 origin-top-right divide-y-2 divide-[#E2E8F0] rounded-md bg-white focus:outline-none hidden border-2 border-[#E2E8F0]" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" id="menu-item" tabindex="-1">
                        <div class="py-1" role="none">
                            <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
                            <div class="block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-0">
                                <p class="text-black">Dhiro Jap</p>
                                <p class="text-[#6A6A6A]">dhiro.jap@binus.edu</p>
                            </div>
                        </div>
                        <div class="py-1" role="none">
                            <a href="/profile" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-2">
                                Profile
                            </a>
                            <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-3">
                                Attendance
                            </a>
                        </div>
                        <div class="py-1" role="none">
                            <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-4">
                                Logout
                            </a>
                        </div>
                    </div>
                </div>

            @else
                <div class="hidden items-center space-x-10 sm:flex">
                    <a href="/login" class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-[#FFFFFF] transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#2563EB] focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 h-9 px-3 {{ (Request::is('login') || Request::is('/')  ? 'bg-[#2563EB] text-[#F8FAFC] hover:bg-[#2563EB]/90' : 'hover:bg-[#F1F5F9] hover:text-[#0F172A]') }}">Login</a>
                    <a href="/register" class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-[#FFFFFF] transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#2563EB] focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 h-9 px-3 {{ (Request::is('register') ? 'bg-[#2563EB] text-[#F8FAFC] hover:bg-[#2563EB]/90' : 'hover:bg-[#F1F5F9] hover:text-[#0F172A]') }}">Register</a>
                </div>
            @endauth
            
        </div>
    </div>
</nav>

<!-- Dropdown script -->
<script>
    const menuButton = document.querySelector("#menu-button")
    const menuItem = document.querySelector("#menu-item")

    menuButton.addEventListener("click", () => {
        menuItem.classList.toggle("hidden");
    });
</script>
