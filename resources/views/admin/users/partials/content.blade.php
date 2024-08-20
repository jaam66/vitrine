{{-- --------------------------------------------------------------------------------------------------------- --}}
{{-- USUÁRIO CONTENT (CONTEÚDO ) --}}
{{-- --------------------------------------------------------------------------------------------------------- --}}
<div class="flex flex-col mt-2 my-4">
    <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
            <div class="overflow-hidden border border-gray-200 md:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-[#797979] text-[#FFFFFF]">
                        <tr>
                            <th scope="col" class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right">
                                Nome
                            </th>

                            <th scope="col" class="px-12 py-3.5 text-sm font-normal text-center rtl:text-right">
                                User Name
                            </th>

                            <th scope="col" class="px-12 py-3.5 text-sm font-normal text-center rtl:text-right">
                                Administrador
                            </th>

                            <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right">
                                E-mail
                            </th>

                            <th scope="col" class="relative py-3.5 px-4">
                                Ações
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($users->items() as $user)
                        {{-- {{ dd($users->currentPage()) }} --}}
                        {{-- {{ dd($user); }} --}}
                        {{-- INICIO DA TABELA --}}
                        <tr class="hover:bg-green-100 odd:bg-white even:bg-gray-100">
                            {{-- COLUNA NAME --}}
                            <td class="px-4 py-2">
                                {{ $user->name }}
                            </td>
                            {{-- ------------- --}}
                            {{-- COLUNA NAME USER --}}
                            {{-- ------------- --}}
                            <td class="text-center px-4 py-2">
                                {{ $user->user_name }}
                            </td>
                            {{-- ------------- --}}
                            {{-- COLUNA ADMINISTRADOR --}}
                            {{-- ------------- --}}
                            <td class="text-center px-4 py-2">
                                {{ getAdmin($user->admin) }}
                            </td>
                            {{-- ------------- --}}
                            {{-- COLUNA E-MAIL --}}
                            {{-- ------------- --}}
                            <td class="px-4 py-2">
                                {{ $user->email }}
                            </td>
                            {{-- COLUNA VER --}}
                            {{-- {{ dd($users->currentPage()) }} --}}
                            <td class="px-4 py-2 text-sm flex">
                                <a href="{{ route('usuario.show', [$user->id, 'page' => $users->currentPage()]) }}" class="acoes">
                                    Detalhes
                                </a>
                                &nbsp;
                                <a href="{{ route('usuario.edit', [$user->id, 'page' => $users->currentPage()]) }}" class="acoes">
                                    Editar
                                </a>
                                <x-modal name="modalDelete{{ $user->id }}">
                                    <div class="p-0" >
                                        <div class="bg-[#006400] color-[#fff] text-xl p-4">
                                            <h3 class="text-[#ffffff]">Deletar </h3> 
                                        </div>
                                        <div class="text-lg p-3  max-h-96 overflow-y-auto">
                                            Nome: {{ $user->name }}
                                            <br>
                                            E-mail: {{ $user->email }}
                                            <br><br>
                                            Deseja deletar este usuário?
                                            <hr>
                                        </div>
                                        <div class="flex flex-row justify-between px-5">
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
