{{-- --------------------------------------------------------------------------------------------------------- --}}
{{-- OS CONTENT (CONTEÚDO) --}}
{{-- --------------------------------------------------------------------------------------------------------- --}}
<div class="content_div01">
    <div class="content_div02">
        <div class="content_div03">
            <div class="content_div04">
                <table class="content_table">
                    <thead class="content_thead">
                        <tr>
                            <th scope="col" class="content_cabecalho">
                                OS
                            </th>

                            <th scope="col" class="content_cabecalho">
                                Remetente
                            </th>

                            <th scope="col" class="content_cabecalho">
                                Assunto
                            </th>

                            <th scope="col" class="content_cabecalho">
                                Equipamento
                            </th>

                            <th scope="col" class="content_cabecalho">
                                Dúvida
                            </th>

                            <th scope="col" class="content_cabecalho acoes_cabecalho">
                                Ações
                            </th>
                        </tr>
                    </thead>
                    <tbody class="content_tbody">
                        @foreach ($supports->items() as $support)
                        {{-- {{ $supports->currentPage() }} --}}
                        {{-- {{ dd($support); }} --}}
                        {{-- INICIO DA TABELA --}}
                        <tr class="content_tbody_tr">
                            {{-- -------------- --}}
                            {{-- COLUNA OS --}}
                            {{-- -------------- --}}
                            <td class="content_tbody_coluna">
                                {{ $support->os }}
                            </td>
                            {{-- -------------- --}}
                            {{-- COLUNA SENDER --}}
                            {{-- -------------- --}}
                            <td class="content_tbody_coluna">
                                {{ $support->sender }}
                            </td>
                            {{-- -------------- --}}
                            {{-- COLUNA SUBJECT --}}
                            {{-- -------------- --}}
                            <td class="content_tbody_coluna">
                                {{ $support->subject }}
                            </td>
                            {{-- -------------- --}}
                            {{-- COLUNA EQUIPMENTS --}}
                            {{-- -------------- --}}
                            <td class="content_tbody_coluna">
                                {{ $support->description }}
                            </td>
                            {{-- ------------- --}}
                            {{-- COLUNA OS --}}
                            {{-- ------------- --}}
                            <td class="px-4 py-2">
                                <x-modal name="modalTexto{{ $support->id }}">
                                    <div class="p-0" >
                                        <div class="xmodal_div01">
                                            <h3 class="text-[#ffffff]">DÚVIDA DE: {{ $support->sender }}</h3> 
                                        </div>
                                        <div class="xmodal_div02">
                                            {{ $support->body }}
                                            <hr>
                                        </div>
                                        <div class="xmodal_div_fechar">
                                            <a href="" class="botaoModal">FECHAR</a>
                                        </div>
                                    </div>
                                </x-modal>
                                {{ getLimitTexto($support->body,20) }}
                                &nbsp;&nbsp;
                                <a href="#" x-data x-on:click="$dispatch('open-modal','modalTexto{{ $support->id }}')" class="modal_exibe_texto">
                                    <i class="fa-sharp-duotone fa-solid fa-comment-dots"></i>
                                </a>
                            </td>
                            {{-- COLUNA VER --}}
                            <td class="content_coluna_acoes">
                                <a href="{{ route('suporte.show', [$support->id, 'page' => $supports->currentPage()]) }}" class="acoes">
                                    Detalhes
                                </a>
                                &nbsp;
                                <a href="{{ route('suporte.edit', [$support->id, 'page' => $supports->currentPage()]) }}" class="acoes">
                                    Editar
                                </a>
                                <x-modal name="modalDelete{{ $support->id }}">
                                    <div class="p-0" >
                                        <div class="xmodal_div01">
                                            <h3 class="text-[#ffffff]">Deletar </h3> 
                                        </div>
                                        <div class="xmodal_div02">
                                            OS: {{ $support->os }}
                                            <br>
                                            Equipamento: {{ $support->description }}
                                            <br>
                                            Assunto: {{ $support->subject }}
                                            <br><br>
                                            Deseja deletar esta dúvida?
                                            <hr>
                                        </div>
                                        <div class="xmodal_div_deletar">
                                            <div class="text-center py-2">
                                                <a href="" class="botaoModal">
                                                    Fechar
                                                </a>
                                            </div>
                                            <div class="text-center py-2">
                                                <form method="POST" action="{{ route('suporte.destroy', $support->id) }}">
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
                                &nbsp;
                                <a href="#" x-data x-on:click="$dispatch('open-modal','modalDelete{{ $support->id }}')" class="acoes_deletar">
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

