<div class=" grid grid-cols-4 p-5 gap-7">
    <div class="flex flex-col gap-3 col-span-4 sm:col-span-3">
        <div class="flex flex-row">
            <p class="text-4xl text-gray-900 dark:text-white">{{ $aluno->nome_completo }}</p>
            <button id="dropdownMenuIconButton" data-dropdown-toggle="dropdownDots"
                class="inline-flex items-center p-2 ml-3 text-sm font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-2 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                type="button">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                    viewBox="0 0 4 15">
                    <path
                        d="M3.5 1.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 6.041a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 5.959a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z" />
                </svg>
            </button>
            <div id="dropdownDots"
                class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-40 dark:bg-gray-700 dark:divide-gray-600">
                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownMenuIconButton">
                    <li>
                        <a class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white hover:cursor-pointer"
                            type="button" 
                            wire:click="$dispatch('openModal', { component: 'modal.modal-aluno', arguments:{ aluno: '{{ $aluno->id }}', formAction: '{{ $formAction }}', title: 'Editar Cadastro - {{ $aluno->nome_completo }}'}})">
                            Editar aluno</a>
                        <a href="#"
                            class="block px-4 py-2 text-red-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                            wire:click="excluir()"
                            >Excluir usuário</a>
                    </li>
                </ul>
            </div>
        </div>

        <p class="font-normal text-gray-500 dark:text-white">Número de identificação {{ $aluno->id }}</p>
        <div>
            <div class="flex flex-col mb-2 ml-3 gap-3">
                <div>
                    <p class="text-xl mb-2 font-semibold text-gray-900 dark:text-white">
                        Informações pessoais
                    </p>
                    <p class="text-base font-normal text-gray-500 dark:text-gray-400">
                        Contato Prioritário: {{ $aluno->contato }}
                    </p>
                    <p class="text-base font-normal text-gray-500 dark:text-gray-400">
                        Nome da Mãe: {{ $aluno->nome_mae }}
                    </p>
                    <p class="text-base font-normal text-gray-500 dark:text-gray-400">
                        Nome do Pai: {{ $aluno->nome_pai }}
                    </p>
                    <p class="text-base font-normal text-gray-500 dark:text-gray-400">
                        Data Nascimento: {{ date('d-m-Y', strtotime($aluno->data_nascimento)) }}
                    </p>
                    <p class="text-base font-normal text-gray-500 dark:text-gray-400">
                        Sala: {{ $aluno->alunos_salas ?  $aluno->alunos_salas->salas[0]->nome_sala : 'não existe' }}
                    </p>
                </div>
                
                <div>
                    <p class="text-xl mb-2 font-semibold text-gray-900 dark:text-white">
                        Endereço
                    </p>
                    @if($aluno->endereco)
                        <p class="text-base font-normal text-gray-500 dark:text-gray-400">
                            Cidade - {{ $aluno->endereco->cidade }} - {{ $aluno->endereco->cep }}
                            <p class="text-base font-normal text-gray-500 dark:text-gray-400">
                            Rua - {{ $aluno->endereco->rua }},
                            nº {{ $aluno->endereco->numero }}
                            </p>
                        </p>
                        <p class="text-base font-normal text-gray-500 dark:text-gray-400">
                            Bairro - {{ $aluno->endereco->bairro }}
                        </p>
                    @else
                        <p class="font-italic text-base font-normal text-gray-500 dark:text-gray-400">Sem registro de endereço.</p>
                    @endif
                </div>
                
                <div>
                    <p class="text-xl mb-2 font-semibold text-gray-900 dark:text-white">
                        Anotação sobre o aluno
                    </p>
                    <p class="text-base font-normal text-gray-500 dark:text-gray-400">
                        {{ $aluno->anotacoes }}
                    </p>
                </div>
            </div>
        </div>
        <div id="accordion-flush" data-accordion="collapse"
            data-active-classes="bg-blue-100 dark:bg-gray-800 text-blue-600 dark:text-white">
            <h2 id="accordion-flush-heading-1">
                <button type="button"
                    class="flex items-center justify-between w-full bg-gray-100 py-5 font-medium rtl:text-right text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400 gap-3 rounded-3"
                    data-accordion-target="#accordion-nota-aluno" aria-expanded="true"
                    aria-controls="accordion-nota-aluno">
                    <span class="ml-5">Boletim escolar 2023</span>
                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0 mr-5" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5 5 1 1 5" />
                    </svg>
                </button>
            </h2>
            <div id="accordion-nota-aluno" class="hidden" aria-labelledby="accordion-flush-heading-1">
                <div class="py-5 border-b border-gray-200 dark:border-gray-700">
                    <div class="col-span-4 overflow-hidden overflow-x-auto">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <caption class="text-xl mb-2 font-semibold text-gray-900 dark:text-white">
                            </caption>
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Disciplinas
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        1º bimestre
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        2º bimestre
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        3º bimestre
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        4º bimestre
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr
                                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <th scope="row"
                                        class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                        <div class="ps-3">
                                            <div class="text-base font-semibold">Português</div>
                                        </div>
                                    </th>
                                    <td class="px-6 py-4" contenteditable='true'>
                                        <div class="ps-3">
                                            <div class="text-base font-semibold" contenteditable='true'>6.2</div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4" contenteditable='true'>
                                        <div class="ps-3">
                                            <div class="text-base font-semibold" contenteditable='true'>6.3</div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4" contenteditable='true'>
                                        <div class="flex items-center">
                                            <div class="text-base font-semibold" contenteditable='true'>6.2</div>
                                    </td>
                                    <td class="px-6 py-4" contenteditable='true'>
                                        <div class="ps-3">
                                            <div class="text-base font-semibold" contenteditable='true'>6.2</div>
                                        </div>
                                    </td>
                                </tr>
                                <tr
                                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <th scope="row"
                                        class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                        <div class="ps-3">
                                            <div class="text-base font-semibold">Matemática</div>
                                        </div>
                                    </th>
                                    <td class="px-6 py-4" contenteditable='true'>
                                        <div class="ps-3">
                                            <div class="text-base font-semibold" contenteditable='true'>6.2</div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4" contenteditable='true'>
                                        <div class="ps-3">
                                            <div class="text-base font-semibold" contenteditable='true'>6.3</div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4" contenteditable='true'>
                                        <div class="flex items-center">
                                            <div class="text-base font-semibold" contenteditable='true'>6.2</div>
                                    </td>
                                    <td class="px-6 py-4" contenteditable='true'>
                                        <div class="ps-3">
                                            <div class="text-base font-semibold" contenteditable='true'>6.2</div>
                                        </div>
                                    </td>

                                </tr>
                                <tr
                                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <th scope="row"
                                        class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                        <div class="ps-3">
                                            <div class="text-base font-semibold">Literatura</div>
                                        </div>
                                    </th>
                                    <td class="px-6 py-4" contenteditable='true'>
                                        <div class="ps-3">
                                            <div class="text-base font-semibold" contenteditable='true'>6.2</div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4" contenteditable='true'>
                                        <div class="ps-3">
                                            <div class="text-base font-semibold" contenteditable='true'>6.3</div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4" contenteditable='true'>
                                        <div class="flex items-center">
                                            <div class="text-base font-semibold" contenteditable='true'>6.2</div>
                                    </td>
                                    <td class="px-6 py-4" contenteditable='true'>
                                        <div class="ps-3">
                                            <div class="text-base font-semibold" contenteditable='true'>6.2</div>
                                        </div>
                                    </td>
                                </tr>
                                <tr
                                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <th scope="row"
                                        class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                        <div class="ps-3">
                                            <div class="text-base font-semibold">Literatura</div>
                                        </div>
                                    </th>
                                    <td class="px-6 py-4" contenteditable='true'>
                                        <div class="ps-3">
                                            <div class="text-base font-semibold" contenteditable='true'>6.2</div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4" contenteditable='true'>
                                        <div class="ps-3">
                                            <div class="text-base font-semibold" contenteditable='true'>6.3</div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4" contenteditable='true'>
                                        <div class="flex items-center">
                                            <div class="text-base font-semibold" contenteditable='true'>6.2</div>
                                    </td>
                                    <td class="px-6 py-4" contenteditable='true'>
                                        <div class="ps-3">
                                            <div class="text-base font-semibold" contenteditable='true'>6.2</div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="flex flex-col mb-2 ml-3 gap-3">
                <div class="flex flex-row gap-4">
                    <p class="text-xl mb-2 font-semibold text-gray-900 dark:text-white">
                        Medidas disciplinares
                    </p>
                    <div>
                        <button type="button" data-modal-target="modal-estudantes" data-modal-toggle="modal-estudantes"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-1 focus:ring-blue-300 font-medium rounded-full px-3 py-1 me-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                            <span class="text-lg">+<span>
                        </button>
                    </div>
                    
                </div>
                <em class="font-italic text-gray-900">sem medidas disciplinares</em>
            </div>
        </div>
    </div>
    <div class="hidden col-span-1 p-5 overflow-hidden overflow-y-auto h-[800px] sm:block">
        <div class="flex gap-4 mb-5">
            <p class="text-xl font-semibold text-gray-900 dark:text-white ">
                Linha do tempo
            </p>
            <div>
                <button type="button" 
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-1 focus:ring-blue-300 font-medium rounded-full px-3 py-1 me-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
                    wire:click="$dispatch('openModal', { component: 'modal.modal-linha-do-tempo', arguments:{ usuario: 'usuario 1', formAction: 'salvar', tituloModal: 'Cadastrar novo tópico', id_aluno: {{ $aluno->id }} }})">
                    <span class="text-lg">+<span>
                </button>
            </div>

            <livewire:modal.modal-estudantes />
        </div>
        <ol class="relative border-s border-gray-200 dark:border-gray-700">
            @if($aluno->linhaDoTempo)
                @foreach ($aluno->linhaDoTempo->reverse() as $linha)
                <li class="mb-10 ms-6">
                    <span
                        class="absolute flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full -start-3 ring-8 ring-white dark:ring-gray-900 dark:bg-blue-900">
                        <svg class="w-2.5 h-2.5 text-blue-800 dark:text-blue-300" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                        </svg>
                    </span>
                    <h3 class="mb-1 text-lg font-semibold text-gray-900 dark:text-white">{{ $linha->titulo }}</h3>
                    <time class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">Atualizado em <span class="font-italic"> {{ $linha->created_at }} </span></time>
                    <p class="text-base font-normal text-gray-500 dark:text-gray-400">
                        {{ $linha->texto }}
                    </p>
                </li>                
                @endforeach
            @else
                <span class="font-italic text-gray-900">Sem linha do tempo</span>
            @endif
        </ol>
    </div>
</div>
