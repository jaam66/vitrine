<div class="flex flex-col mt-2 my-4">
    <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
            <div class="overflow-hidden border border-gray-200 dark:border-gray-700 md:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead class="bg-[#797979] text-[#FFFFFF]">
                        <tr>
                            <th scope="col" class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right">
                                Assunto
                            </th>

                            <th scope="col" class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right">
                                Status
                            </th>

                            <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right">
                                Dúvida
                            </th>

                            <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right">
                                Usuário
                            </th>

                            <th scope="col" class="relative py-3.5 px-4">
                                Ações
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($supports->items() as $support)
                        {{-- {{ dd($support); }} --}}
                        {{-- INICIO DA TABELA --}}
                        <tr class="hover:bg-green-100 odd:bg-white even:bg-gray-100">
                            {{-- COLUNA SUBJECT --}}
                            <td class="px-4 py-2 text-sm font-medium whitespace-nowrap">
                                {{ $support->subject }}
                            </td>
                            {{-- COLUNA STATUS --}}
                            <td class="px-12 py-2 text-sm font-medium whitespace-nowrap">
                                <x-status-support :status="$support->status"></x-status-support>
                            </td>
                            {{-- COLUNA DÚVIDA --}}
                            <td class="px-4 py-2">
                                <x-modal name="modalTexto{{ $support->id }}">
                                    <div class="p-0" >
                                        <div class="bg-[#006400] color-[#fff] text-xl p-4">
                                            <h3 class="text-[#ffffff]">DÚVIDA DE: {{ $support->name }}</h3> 
                                        </div>
                                        <div class="text-2xl p-2  max-h-96 overflow-y-auto">
                                            {{ $support->body }}
                                        </div>
                                        <a href="">FECHAR</a>
                                    </div>
                                </x-modal>
                                {{ getLimitTexto($support->body,20) }}
                                &nbsp;&nbsp;
                                <a href="#" x-data x-on:click="$dispatch('open-modal','modalTexto{{ $support->id }}')" class="acoes_modal_texto">
                                    <i class="fa-sharp-duotone fa-solid fa-comment-dots"></i>
                                </a>
                            </td>
                            {{-- COLUNA USUÁRIO --}}
                            <td class="px-4 py-2 text-sm whitespace-nowrap">
                                <div class="flex items-center text-center">
                                    {{-- {{ $support['user']['name'] }} --}}
                                    {{ $support->name }}
                                </div>
                            </td>
                            {{-- COLUNA VER --}}
                            <td class="px-4 py-2 text-sm whitespace-nowrap flex">
                                <a href="{{ route('suporte.show', [$support->id, 'page' => $supports->currentPage()]) }}" class="acoes">
                                    Detalhes
                                </a>
                                &nbsp;
                                <a href="{{ route('suporte.edit', [$support->id, 'page' => $supports->currentPage()]) }}" class="acoes">
                                    Editar
                                </a>
                                <a href="{{ route('suporte.destroy', $support->id) }}" class="acoes_deletar">
                                    Deletar
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

