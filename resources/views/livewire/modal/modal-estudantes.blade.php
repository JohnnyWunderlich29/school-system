<div>
    <!-- Main modal -->
    <div id="modal-estudantes" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-[1000px] max-w-8xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Cadastro de alunos
                    </h3>
                    <button type="button"
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
                <form wire:submit="salvar" class="p-4 max-w-[900px] mx-auto md:gap-x-10">
                    <div>
                        <div class="flex flex-col gap-x-7 md:flex-row">
                            <div class="grid grid-cols-4 gap-2">
                                <div class="text-xl col-span-4 font-semibold text-gray-900 dark:text-white">Dados
                                    pessoais</div>
                                <div class="mb-5 col-span-4">
                                    <label for="nome-completo"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nome completo</label>
                                    <input type="text" id="nome-completo" wire:model="nome_completo"
                                        name="nome_completo"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="José da Silva" required>
                                        <div>@error('nome_completo') {{ $message }} @enderror</div>
                                </div>
                                <div class="mb-5 col-span-2">
                                    <label for="contato"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contato
                                        telefonico</label>
                                    <input type="text" id="contato" x-mask="(99) 9 9999-9999" wire:model="contato"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </div>
                                <div class="mb-5 col-span-2">
                                    <label for="data_nascimento"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Data Nascimeto</label>
                                    <input type="date" id="data_nascimento" wire:model="data_nascimento"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </div>
                                <div class="mb-5 col-span-2">
                                    <label for="cep"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">CEP</label>
                                    <input type="text" id="cep" wire:model="endereco"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="99999-999" x-mask="99999-999" required>
                                </div>
                                <div class="mb-5 col-span-2">
                                    <label for="rua"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rua</label>
                                    <input type="text" id="endreco" wire:model="rua"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </div>
                                <div class="mb-5 col-span-1">
                                    <label for="numero"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Número</label>
                                    <input type="text" id="rua" wire:model="numero"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        required>
                                </div>
                                <div class="mb-5 col-span-1">
                                    <label for="bairro"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bairro</label>
                                    <input type="text" id="endreco" wire:model="bairro"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </div>

                            </div>
                            <div class="grid grid-cols-3 gap-3 w-[40%]">
                                <div class="text-xl col-span-3 font-semibold text-gray-900 dark:text-white">Dado escolar
                                </div>
                                <div class="mb-5 col-span-3">
                                    <label for="turma"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                        Turma</label>
                                    <select id="turma"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                                        <option>2º ano fundamental - A</option>
                                        <option>3º - C</option>
                                        <option>5º - D</option>
                                        <option>1º ano ensino médio - A</option>
                                    </select>
                                </div>
                                <div class="mb-5 col-span-3">
                                    <label for="turma"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                        Anotações</label>
                                    <livewire:editor.editor-de-texto receberString='anotacoes'/>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div
                        class="flex items-center p-4 col-span-2 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                        <button data-modal-hide="modal-estudantes" type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Salvar
                        </button>
                        <button data-modal-hide="modal-estudantes" type="button"
                            class="ms-3 text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
