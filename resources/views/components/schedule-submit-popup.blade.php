@props(['id', 'day', 'close_btn_id', 'close_outside_id', 'form_submit', 'start', 'end', 'confirm'])

<div class="hidden modal" id="{{ $id }}">
    <div class="left-0 top-0 fixed w-screen h-screen z-50">
        <div class="bg-black bg-opacity-40 backdrop-blur-sm h-full w-full absolute" id="{{ $close_outside_id }}"> </div>
        <div class="w-full h-full flex items-center justify-center z-10">
            <div class="relative p-4 w-full max-w-2xl">
                <div class="bg-white rounded-lg border-2 border-[#6A6A6A] py-4">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 md:mx-4">
                        <h3 class="text-xl font-semibold text-black">
                            {{ $day }}
                        </h3>
                        <button type="button" class="bg-transparent hover:bg-gray-200 rounded-full text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="default-modal" id="{{ $close_btn_id }}">
                            <svg stroke="currentColor" fill="black" stroke-width="2" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><path d="M256 48a208 208 0 1 1 0 416 208 208 0 1 1 0-416zm0 464A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM175 175c-9.4 9.4-9.4 24.6 0 33.9l47 47-47 47c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l47-47 47 47c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-47-47 47-47c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-47 47-47-47c-9.4-9.4-24.6-9.4-33.9 0z"></path></svg>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <form>
                        @csrf
                        <div class="flex justify-center items-center p-4 md:p-5 md:mx-4">
                            <div id="error"> </div>
                            <div class="flex justify-between w-full">
                                <div class="flex-row w-full mr-4">
                                    <label for="{{ $start }}" class="flex my-2 text-lg">From Hour</label>
                                    <input type="time" id="{{ $start }}" class="rounded-lg border-2 border-[#6A6A6A] px-2 py-1 w-full">
                                </div>
                                <div class="flex-row w-full ml-4">
                                    <label for="{{ $end }}" class="flex my-2 text-lg">To Hour</label>
                                    <input type="time" id="{{ $end }}" class="rounded-lg border-2 border-[#6A6A6A] px-2 py-1 w-full">
                                </div>
                            </div>
                        </div>
                        <div id="{{ $form_submit }}"> </div>
                    </form>
                    <!-- Modal footer -->
                    <div class="flex items-center justify-end p-4 md:p-5 md:mx-4">
                        <button class="px-2.5 py-1.5 bg-[#2563EB] text-white rounded-md mt-3 text-xl hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600" id="{{ $confirm }}">Confirm</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
