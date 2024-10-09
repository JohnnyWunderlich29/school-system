@component('livewire.configuracoes.modal.modal-base', ['title' => $title])
    @if ($formAction)
        <form wire:submit="{{ $formAction }}@if ($formAction === 'atualizar')({{ $id }}) @endif"
            class="p-4 max-w-full mx-auto md:gap-x-10">
            ID: {{ $id }}
    @endif
    <div class="p-4 md:p-5">
        <div class="flex flex-col gap-x-7 md:flex-row">
            <div class="grid grid-cols-4 gap-3">
                <div class="mb-5 col-span-4">
                    <label for="nome-completo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nome
                        da
                        sala</label>
                    <input type="text" id="nome-completo" wire:model.fill="nome_sala"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="1A" value="{{ $sala->nome_sala ?? '' }}">
                </div>
            </div>
        </div>
    </div>
    <fieldset>
        <legend class="sr-only">Checkbox variants</legend>
        @foreach ($materias as $chave => $materia)
            <div class="flex items-center mb-4">
                <input id="checkbox-2" type="checkbox" value="{{$materia['id']}}" wire:model.live="materiasRecebidas"
                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="checkbox-2" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300" >{{$materia['nome_materia']}}</label>
            </div>
        @endforeach
            
    </fieldset>

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
