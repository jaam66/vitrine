{{-- --------------------------------------------------------------------------------------------------------- --}}
{{-- USUÁRIO CONTENT (CONTEÚDO ) --}}
{{-- --------------------------------------------------------------------------------------------------------- --}}
<div class="content_div01">
    <div class="content_div02">
        <div class="content_div03">
            <div class="content_div04">
                <table class="content_table">
                    <thead class="content_thead">
                        <tr>
                            <th scope="col" class="content_cabecalho">
                                Nome
                            </th>

                            <th scope="col" class="content_cabecalho">
                                User Name
                            </th>

                            <th scope="col" class="content_cabecalho">
                                Administrador
                            </th>

                            <th scope="col" class="content_cabecalho">
                                E-mail
                            </th>

                            <th scope="col" class="content_cabecalho acoes_cabecalho">
                                Ações
                            </th>
                        </tr>
                    </thead>
                    <tbody class="content_tbody">
                        @foreach ($users->items() as $user)
                        {{-- {{ dd($users->currentPage()) }} --}}
                        {{-- {{ dd($user); }} --}}
                        {{-- INICIO DA TABELA --}}
                        <tr class="content_tbody_tr">
                            {{-- COLUNA NAME --}}
                            <td class="content_tbody_coluna">
                                {{ $user->name }}
                            </td>
                            {{-- ------------- --}}
                            {{-- COLUNA NAME USER --}}
                            {{-- ------------- --}}
                            <td class="content_tbody_coluna">
                                {{ $user->user_name }}
                            </td>
                            {{-- ------------- --}}
                            {{-- COLUNA ADMINISTRADOR --}}
                            {{-- ------------- --}}
                            <td class="content_tbody_coluna">
                                {{ getAdmin($user->admin) }}
                            </td>
                            {{-- ------------- --}}
                            {{-- COLUNA E-MAIL --}}
                            {{-- ------------- --}}
                            <td class="content_tbody_coluna">
                                {{ $user->email }}
                            </td>
                            {{-- COLUNA VER --}}
                            {{-- {{ dd($users->currentPage()) }} --}}
                            <td class="content_coluna_acoes">
                                <a href="{{ route('usuario.show', [$user->id, 'page' => $users->currentPage()]) }}" class="acoes">
                                    Detalhes
                                </a>
                                &nbsp;
                                <a href="{{ route('usuario.edit', [$user->id, 'page' => $users->currentPage()]) }}" class="acoes">
                                    Editar
                                </a>
                                <x-modal name="modalDelete{{ $user->id }}">
                                    <div class="p-0" >
                                        <div class="xmodal_div01">
                                            <h3 class="text-[#ffffff]">Deletar </h3> 
                                        </div>
                                        <div class="xmodal_div02">
                                            Nome: {{ $user->name }}
                                            <br>
                                            E-mail: {{ $user->email }}
                                            <br><br>
                                            Deseja deletar este usuário?
                                            <hr>
                                        </div>
                                        <div class="xmodal_div_deletar">
                                            <div class="text-center py-2">
                                                <a href="" class="botaoModal">
                                                    Fechar
                                                </a>
                                            </div>
                                            <div class="text-center py-2">
                                                <form method="POST" action="{{ route('usuario.destroy', $user->id) }}">
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
                                <a href="#" x-data x-on:click="$dispatch('open-modal','modalDelete{{ $user->id }}')" class="acoes_deletar">
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

