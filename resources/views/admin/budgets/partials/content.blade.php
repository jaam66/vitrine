{{-- --------------------------------------------------------------------------------------------------------- --}}
{{-- EQUIPAMENTO CONTENT (CONTEÚDO) --}}
{{-- --------------------------------------------------------------------------------------------------------- --}}
<div class="content_div01">
    <div class="content_div02">
        <div class="content_div03">
            <div class="content_div04">
                <table class="content_table">
                    <thead class="content_thead">
                        <tr>
                            <th scope="col" class="content_cabecalho">
                                Descrição
                            </th>

                            <th scope="col" class="content_cabecalho acoes_cabecalho w-1/6">
                                Ações
                            </th>
                        </tr>
                    </thead>
                    <tbody class="content_tbody">
                        @foreach ($equipments->items() as $equipment)
                            @php
                            $suporte_encontrado = \App\Models\Equipment::buscaSuporte($equipment->id);
                            $suporte_OS = \App\Models\Equipment::buscaOS($equipment->id);
                            @endphp
                            {{-- {{ "# ".$suporte_encontrado . " -> " .  $suporte_OS . " "}} --}}
                            {{-- INICIO DA TABELA --}}
                            <tr class="content_tbody_tr">
                                {{-- -------------- --}}
                                {{-- COLUNA DESCRIÇÃO --}}
                                {{-- -------------- --}}
                                <td class="content_tbody_coluna">
                                    {{ $equipment->description }}
                                </td>
                                {{-- COLUNA VER --}}
                                <td class="content_coluna_acoes">
                                    <a href="{{ route('equipamento.show', [$equipment->id, 'page' => $equipments->currentPage()]) }}" class="acoes text-center">
                                        Detalhes
                                    </a>
                                    &nbsp;&nbsp;
                                    <a href="{{ route('equipamento.edit', [$equipment->id, 'page' => $equipments->currentPage()]) }}" class="acoes">
                                        Editar
                                    </a>
                                    {{-- MODAL DO DELETAR ATIVO --}}
                                    <x-modal name="modalDeleteAtivo{{ $equipment->id }}">
                                        <div class="p-0" >
                                            <div class="xmodal_div01">
                                                <h3 class="text-[#ffffff]">Deletar </h3> 
                                            </div>
                                            <div class="xmodal_div02">
                                                Equipamento: {{ $equipment->description }}
                                                <br><br>
                                                Deseja deletar este equipamento?
                                                <hr>
                                            </div>
                                            <div class="xmodal_div_deletar">
                                                <div class="text-center py-2">
                                                    <a href="" class="botaoModal">
                                                        Fechar
                                                    </a>
                                                </div>
                                                <div class="text-center py-2">
                                                    <form method="POST" action="{{ route('equipamento.destroy', $equipment->id) }}">
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
                                    {{-- ------------------------ --}}
                                    {{-- MODAL DO DELETAR INATIVO --}}
                                    {{-- ------------------------ --}}
                                    <x-modal name="modalDeleteInativo{{ $equipment->id }}">
                                        <div class="p-0" >
                                            <div class="xmodal_div01">
                                                <h3 class="text-[#ffffff]">Deletar </h3> 
                                            </div>
                                            <div class="xmodal_div02">
                                                O equipamento "{{ $equipment->description }}" não pode ser deletado pois está sendo referenciado na 
                                                {{ $suporte_OS }}
                                                <br>
                                                <hr>
                                            </div>
                                            <div class="xmodal_div_fechar">
                                                <div class="text-center py-2">
                                                    <a href="" class="botaoModal">
                                                        Fechar
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </x-modal>
                                    &nbsp;&nbsp;
                                    @if($suporte_encontrado == "F")
                                        <a href="#" x-data x-on:click="$dispatch('open-modal','modalDeleteAtivo{{ $equipment->id }}')" class="acoes_deletar">
                                            Deletar
                                        </a>
                                    @else
                                        <a href="#" x-data x-on:click="$dispatch('open-modal','modalDeleteInativo{{ $equipment->id }}')" class="acoes_deletar">
                                            Deletar
                                        </a>
                                    
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

