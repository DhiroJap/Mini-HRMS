@props(['id', 'date'])

<div class="hidden modal" id="{{ $id }}">
    <div tabindex="-1" class="bg-black bg-opacity-40 fixed flex z-50 justify-center items-center w-full md:inset-0">
        <div class="relative p-4 w-full max-w-xl max-h-ful">
            <!-- Modal content -->
            <div class=" bg-white rounded-lg border-2 border-[#6A6A6A]">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 md:mx-4">
                    <h3 class="text-xl font-semibold text-black">
                        {{ $date }}
                    </h3>
                    <div>
                        <button type="button" class="bg-transparent hover:bg-gray-200 rounded-full text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="default-modal" id="close-btn">
                            <svg stroke="currentColor" fill="black" stroke-width="2" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><path d="M256 48a208 208 0 1 1 0 416 208 208 0 1 1 0-416zm0 464A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM175 175c-9.4 9.4-9.4 24.6 0 33.9l47 47-47 47c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l47-47 47 47c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-47-47 47-47c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-47 47-47-47c-9.4-9.4-24.6-9.4-33.9 0z"></path></svg>
                        </button>
                    </div>
                </div>
                <!-- Modal body -->
                <form class="flex justify-center items-center p-4 md:p-5 md:mx-4">
                    <div class="flex justify-between w-full">
                        <div class="flex-row">
                            <label for="start-time" class="flex my-2 text-lg">From Hour</label>
                            <input type="time" id="start-time" class="rounded-lg border-2 border-[#6A6A6A] px-2 py-1">
                        </div>
                        <div class="flex-row">
                            <label for="end-time" class="flex my-2 text-lg">To Hour</label>
                            <input type="time" id="end-time" class="rounded-lg border-2 border-[#6A6A6A] px-2 py-1">
                        </div>
                    </div>
                </form>
                <!-- Modal footer -->
                <div class="flex items-center justify-end p-4 md:p-5 md:mx-4">
                    <button class="px-2.5 py-1.5 bg-[#2563EB] text-white rounded-md mt-3 text-xl">Confirm</button>
                </div>
            </div>
        </div>
    </div>
</div>
