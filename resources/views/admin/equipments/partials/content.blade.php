{{-- --------------------------------------------------------------------------------------------------------- --}}
{{-- EQUIPAMENTO CONTENT (CONTEÚDO) --}}
{{-- --------------------------------------------------------------------------------------------------------- --}}
<div class="flex flex-col mt-2 my-4">
    <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
            <div class="overflow-hidden border border-gray-200 md:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-[#797979] text-[#FFFFFF]">
                        <tr>
                            <th scope="col" class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right">
                                Descrição
                            </th>

                            <th scope="col" class="relative py-3.5 px-4">
                                Ações
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($equipments->items() as $equipment)
                        {{-- {{ $equipments->currentPage() }} --}}
                        {{-- {{ dd($support); }} --}}
                        {{-- INICIO DA TABELA --}}
                        <tr class="hover:bg-green-100 odd:bg-white even:bg-gray-100">
                            {{-- -------------- --}}
                            {{-- COLUNA DESCRIÇÃO --}}
                            {{-- -------------- --}}
                            <td class="px-4 py-2 text-sm font-medium whitespace-nowrap">
                                {{ $equipment->description }}
                            </td>
                            {{-- COLUNA VER --}}
                            <td class="flex justify-center px-4 py-2 text-sm whitespace-nowrap">
                                <a href="{{ route('suporte.show', [$equipment->id, 'page' => $equipments->currentPage()]) }}" class="acoes text-center">
                                    Detalhes
                                </a>
                                &nbsp;&nbsp;
                                <a href="{{ route('suporte.edit', [$equipment->id, 'page' => $equipments->currentPage()]) }}" class="acoes">
                                    Editar
                                </a>
                                <x-modal name="modalDelete{{ $equipment->id }}">
                                    <div class="p-0" >
                                        <div class="bg-[#006400] color-[#fff] text-xl p-4">
                                            <h3 class="text-[#ffffff]">Deletar </h3> 
                                        </div>
                                        <div class="text-lg p-3  max-h-96 overflow-y-auto">
                                            OS: {{ $equipment->description }}
                                            <br>
                                            Equipamento: {{ $equipment->description }}
                                            <br><br>
                                            Deseja deletar esta dúvida?
                                            <hr>
                                        </div>
                                        <div class="flex flex-row justify-between px-5">
                                            <div class="text-center py-2">
                                                <a href="" class="botaoModal">
                                                    Fechar
                                                </a>
                                            </div>
                                            <div class="text-center py-2">
                                                <form method="POST" action="{{ route('suporte.destroy', $equipment->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="" class="botaoModal" onclick="event.preventDefault(); this.closest('form').submit();">
                                                        Deletar
                                                    </a>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </x-modal>
                                &nbsp;&nbsp;
                                <a href="#" x-data x-on:click="$dispatch('open-modal','modalDelete{{ $equipment->id }}')" class="acoes_deletar">
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

