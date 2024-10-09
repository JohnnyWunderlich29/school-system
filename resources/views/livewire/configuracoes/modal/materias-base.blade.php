@component('livewire.configuracoes.modal.modal-base', ['title' => $title])

        @if ($formAction)
            <form wire:submit="{{ $formAction }}@if ($formAction === 'atualizar') ({{ $id_materia }}) @endif"
                class="p-4 max-w-full mx-auto md:gap-x-10">
        @endif
        <div class="p-4 md:p-5">
            <div class="flex flex-col gap-x-7 md:flex-row">
                <div class="grid grid-cols-4 gap-3">
                    <div class="mb-5 col-span-4">
                        <label for="nome-materia" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nome da matéria</label>
                        <input type="text" id="nome-materia" wire:model.fill="nome_materia"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Português" value="{{ $materia->nome_materia ?? '' }}">
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal footer -->
        <div class="flex items-center p-4 col-span-2 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Salvar
            </button>
            <button type="button" wire:click="$dispatch('closeModal')"
                class="ms-3 text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancelar</button>
        </div>
        @if ($formAction)
            </form>
        @endif
@endcomponent
