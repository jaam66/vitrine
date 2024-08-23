{{-- --------------------------------------------------------------------------------------------------------- --}}
{{-- USUÁRIO HEADER (CABEÇALHO)  --}}
{{-- --------------------------------------------------------------------------------------------------------- --}}
<div class="barra flex justify-between p-3">
    <div class="flex">
        <div class="flex items-center gap-x-3">
            <a href="{{ route('usuario.index') }}" class="header_link_list">
                <span>Usuários</span>
                <i class="fa-solid fa-list"></i>
            </a>
            <span class="total_cadastrado rounded-full">{{ $users->total() }} usuários</span>
        </div>
        &nbsp;&nbsp;&nbsp;
        <div class="flex">
            <a href="{{ route('usuario.create') }}" class="header_link_cadastra">
                <span>Novo Usuário</span>
                <i class="fa-regular fa-square-plus"></i>
            </a>
        </div>
    </div>
    <div class="flex items-center">
        <span class="absolute">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mx-3 text-gray-400">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
            </svg>
        </span>
    
        <form action="{{ route('usuario.index') }}" method="get">
            <input name="filter" type="text" placeholder="Procurar" class="header_listagem_pesquisa" value="">
        </form>
    </div>
</div>