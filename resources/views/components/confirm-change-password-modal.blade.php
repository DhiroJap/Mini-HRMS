<div id="confirm-change-password-modal" class="fixed z-50 inset-0 overflow-y-auto hidden">
    <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div id="background-overlay" class="fixed inset-0 bg-gray-500 opacity-75"></div>

        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
        <form id="confirm-change-password-form" class="w-full" action="{{ route('changePassword') }}" method="POST">
          @csrf
          @method('PUT')
          <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
            <div class="sm:flex sm:items-start">
              <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                <h3 class="text-lg font-medium text-gray-900" id="modal-title">Confirm Password</h3>
                <div class="flex flex-col mt-1 gap-2">
                    <p class="text-sm text-gray-500" id="modal-content">
                    Please enter your current password to proceed.
                    </p>
                    <input id="new-password-input-transferred" name="newPassword" class="hidden" />
                    <input id='confirm-change-password' name="currentPassword" class="h-10 w-full rounded-md border border-[#E5E5E5] bg-[#FFFFFF] px-3 py-2 text-sm ring-offset-[#FFFFFF] placeholder:text-[#737373] focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#2563EB] focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50" type="password">
                    <p id='confirm-change-password-error' class="text-sm font-medium text-red-600"></p>
                </div>
              </div>
            </div>
          </div>
          <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
            <button type="submit" id="confirm-change-password-button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-[#2563EB] text-base font-medium text-white hover:bg-[#2563EB]/90 focus:outline-none focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#2563EB] focus-visible:ring-offset-2 sm:ml-3 sm:w-auto sm:text-sm disabled:hover:bg-gray-400">
                Submit
              </button>
            <button id="cancel-confirm-change-password" type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#2563EB] sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
              Cancel
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
