<div class="hidden" id="confirm-input-schedule-modal">
    <div class="left-0 top-0 fixed w-screen h-screen z-50 bg-black bg-opacity-40 backdrop-blur-sm">
        <div class="w-full h-full flex items-center justify-center z-10">
            <div class="relative p-4 w-full max-w-2xl">
                <div class="bg-white rounded-lg border-2 border-[#6A6A6A] py-4">
                    <div class="flex flex-col items-center justify-between px-4 py-2 md:px-5 md:py-3 md:mx-4">
                        <svg stroke="#EF4444" fill="#EF4444" stroke-width="0" viewBox="0 0 256 256" height="150px" width="150px" xmlns="http://www.w3.org/2000/svg"><path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm0,192a88,88,0,1,1,88-88A88.1,88.1,0,0,1,128,216Zm-8-80V80a8,8,0,0,1,16,0v56a8,8,0,0,1-16,0Zm20,36a12,12,0,1,1-12-12A12,12,0,0,1,140,172Z"></path></svg>
                        <p class="text-xl font-medium mt-2 text-center">You can only input your schedule once!</p>
                        <p class="text-lg text-gray-500 mt-2 text-center">Are you sure you want to continue?</p>
                    </div>

                    <div class="flex items-center justify-around">
                        <form id="confirm-schedule-form" action="/schedule" method="POST">
                            @csrf
                            <button id='confirm-schedule-form-button' type="submit" class="px-6 sm:px-8 py-2.5 bg-[#2563EB] hover:bg-[#2563EB]/90 cursor-pointer text-white rounded-md mt-3 text-lg focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600 font-medium" id="yes">Confirm</button>
                        </form>
                        <button id="cancel-confirm-schedule-form-button" class="px-6 sm:px-8 py-2.5 bg-[#EF4444] text-white rounded-md mt-3 text-lg hover:bg-[#EF4444]/90 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600 font-medium" id="no">Cancel</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
