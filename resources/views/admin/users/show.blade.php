{{-- --------------------------------------------------------------------------------------------------------- --}}
{{-- USUÁRIO SHOW (DETALHAR)  --}}
{{-- --------------------------------------------------------------------------------------------------------- --}}
@extends('admin.layouts.app')

@section('title', 'Detalhes do Suporte')

@section('barra')
    {{-- <h1>Detalhes do Suporte {{ $support->id }}</h1> --}}
    <div class="barra flex justify-between p-4">
        <div><h1>Usuário</h1></div>
        <div><a href="{{  route('usuario.index', ['page' => request()->page]) }}" class="voltar"><i class="fa-solid fa-arrow-left"></i> Voltar</a></div>
    </div>
@endsection
@section('content')
    <div class="moldura_corpo">
    {{-- ------------------------------------------------------------------------------------- --}}

    <div>
        <label for="nome">Nome:</label>
        <input name="name" type="text" value="{{ $user->name }}" disabled="disablede"
        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
    </div>
    <div>
        <label for="email">E-mail:</label>
        <input name="email" type="text" value="{{ $user->email }}" disabled="disablede"
        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
    </div>    <div>
        <label for="user_nome">Nome Usuário:</label>
        <input name="user_name" type="text" value="{{ $user->user_name }}" disabled="disablede"
        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
    </div>    <div>
        <label for="admin">Administrador:</label>
        <input name="admin" type="text" value="{{ getAdmin($user->admin) }}" disabled="disablede"
        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
    </div>
@endsection