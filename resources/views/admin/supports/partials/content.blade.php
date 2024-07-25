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
                            <td class="px-4 py-2 text-sm whitespace-nowrap">
                                {{ $support->body }}
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
                                <a href="{{ route('suporte.edit', $support->id) }}" class="acoes">
                                    Editar
                                </a>
                                <a href="{{ route('suporte.edit', $support->id) }}" class="acoes_deletar">
                                    Editar
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