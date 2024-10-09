@props(['formAction' => false])

<div>
    <!-- Main modal -->
    <div id="modal-estudantes">
        <div class="max-h-full w-100">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    @if (isset($title))
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            {{ $title }}
                        </h3>
                    @endif
                    <button type="button" wire:click="$dispatch('closeModal')"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="modal-estudantes">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>

                <!-- Modal body -->
                {{ $slot }}


            </div>
        </div>
    </div>
</div>
