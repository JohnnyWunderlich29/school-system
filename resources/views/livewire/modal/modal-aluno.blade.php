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
                @if ($formAction)
                    <form
                        wire:submit="{{ $formAction }}@if ($formAction === 'atualizar') ({{ $aluno->id }}) @endif"
                        class="p-4 max-w-full mx-auto md:gap-x-10">
                @endif
                <div class="p-4 md:p-5">
                    <div class="flex flex-col gap-x-7 md:flex-row">
                        <div class="grid grid-cols-4 gap-3">
                            <div class="text-xl col-span-4 font-semibold text-gray-900 dark:text-white">Dados
                                pessoais</div>
                            <div class="mb-5 col-span-4">
                                <label for="nome-completo"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nome do Aluno
                                    completo</label>
                                <input type="text" id="nome-completo" wire:model.fill="nome_completo"
                                    @if (isset($aluno)) value="{{ $aluno->nome_completo ?? '' }}" @endif
                                    name="nome_completo"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="José da Silva" >
                            </div>
                            <div class="mb-5 col-span-2">
                                <label for="nome_mãe"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nome
                                    Mãe</label>
                                <input type="text" id="nome_mãe" wire:model.fill="nome_mae"
                                    @if (isset($aluno)) value="{{ $aluno->nome_mae ?? '' }}" @endif
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    >
                                <div class="text-red-600">
                                    @error('nome_mae')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-5 col-span-2">
                                <label for="nome_pai"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nome
                                    pai</label>
                                <input type="text" id="nome_pai" wire:model.fill="nome_pai"
                                    @if (isset($aluno)) value="{{ $aluno->nome_pai ?? '' }}" @endif
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    >
                                <div class="text-red-600">
                                    @error('nome_pai')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-5 col-span-1">
                                <label for="contato"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contato
                                    telefônico</label>
                                <input type="text" id="contato" x-mask="(99) 9 9999-9999" wire:model.fill="contato"
                                    @if (isset($aluno)) value="{{ $aluno->contato ?? '' }}" @endif
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    >
                                <div class="text-red-600">
                                    @error('contato')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-5 col-span-1">
                                <label for="data_nascimento"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Data Nascimeto</label>
                                <input type="date" id="data_nascimento" wire:model.fill="data_nascimento"
                                    @if (isset($aluno)) value="{{  $aluno->data_nascimento }}" @endif
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            </div>
                            <div class="text-xl col-span-4 font-semibold text-gray-900 dark:text-white">Endereço</div>
                            <div class="mb-5 col-span-1">
                                <label for="cep"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">CEP</label>
                                <input type="text" id="cep" wire:model.fill="cep"
                                    @if (isset($aluno)) value="{{ $aluno->endereco->cep ?? '' }}" @endif
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="99999-999" x-mask="99999-999" />
                                <div class="text-red-600">
                                    @error('cep')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-5 col-span-2">
                                <label for="cidade"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cidade</label>
                                <input type="text" id="cidade" wire:model.fill="cidade"
                                    @if (isset($aluno)) value="{{ $aluno->endereco->cidade ?? '' }}" @endif
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <div class="text-red-600">
                                    @error('cidade')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-5 col-span-2">
                                <label for="rua"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rua</label>
                                <input type="text" id="rua" wire:model.fill="rua"
                                    @if (isset($aluno)) value="{{ $aluno->endereco->rua ?? '' }}" @endif
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <div class="text-red-600">
                                    @error('rua')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-5 col-span-1">
                                <label for="numero"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Número</label>
                                <input type="text" id="numero" wire:model.fill="numero"
                                    @if (isset($aluno)) value="{{ $aluno->endereco->numero ?? '' }}" @endif
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <div class="text-red-600">
                                    @error('numero')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-5 col-span-1">
                                <label for="bairro"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bairro</label>
                                <input type="text" id="bairro" wire:model.fill="bairro"
                                    @if (isset($aluno)) value="{{ $aluno->endereco->bairro ?? '' }}" @endif
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <div class="text-red-600">
                                    @error('bairro')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-3 gap-3 w-[40%]">
                            <div class="text-xl col-span-3 font-semibold text-gray-900 dark:text-white">Dado escolar</div>
                            <div class="mb-5 col-span-3">
                                <label for="turma"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Turma</label>
                                <select id="turma"
                                    wire:model.fill='sala_aluno'
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    @if(isset($salas))
                                        @foreach ($salas as $sala)
                                            @if(isset($aluno->alunos_salas))
                                                @if ($aluno->alunos_salas->salas[0]->nome_sala == $sala->nome_sala)
                                                    <option class="font-bold" value="{{ $sala->id }}" selected>{{ $aluno->alunos_salas->salas[0]->nome_sala}}</option>
                                                @else
                                                    <option value="{{ $sala->id }}">{{ $sala->nome_sala}}</option>
                                                @endif
                                            @else
                                                <option value="{{ $sala->id }}">{{ $sala->nome_sala}}</option>
                                            @endif
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            
                            <div class="mb-5 col-span-3">
                                <div class="w-full mb-4 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-700 dark:border-gray-600">
                                    <div class="flex items-center justify-between px-3 py-2 border-b dark:border-gray-600">
                                        <div
                                            class="flex flex-wrap items-center divide-gray-200 sm:divide-x sm:rtl:divide-x-reverse dark:divide-gray-600">
                                            <div class="flex items-center space-x-1 rtl:space-x-reverse sm:pe-4">
                                                <button type="button"
                                                    class="p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                                                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                        viewBox="0 0 20 20">
                                                        <path
                                                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM13.5 6a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm-7 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm3.5 9.5A5.5 5.5 0 0 1 4.6 11h10.81A5.5 5.5 0 0 1 10 15.5Z" />
                                                    </svg>
                                                    <span class="sr-only">Adicionar Emoji</span>
                                                </button>
                                            </div>
                                        </div>
                                        <div id="tooltip-fullscreen" role="tooltip"
                                            class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                            Show full screen
                                            <div class="tooltip-arrow" data-popper-arrow></div>
                                        </div>
                                    </div>
                                    <div class="px-4 py-2 bg-white rounded-b-lg dark:bg-gray-800">
                                        <label for="editor" class="sr-only">Anotações</label>
                                        <textarea id="editor" rows="8" wire:model.fill='anotacoes'
                                            class="block w-full px-0 text-sm text-gray-800 bg-white border-0 dark:bg-gray-800 focus:ring-0 dark:text-white dark:placeholder-gray-400"
                                            placeholder="Escreva aqui..." >{{ $aluno ? $aluno->anotacoes : $anotacoes  }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal footer -->
                <div
                    class="flex items-center p-4 col-span-2 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
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
            </div>
        </div>
    </div>
</div>
