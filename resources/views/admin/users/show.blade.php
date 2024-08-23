{{-- --------------------------------------------------------------------------------------------------------- --}}
{{-- USUÁRIO SHOW (DETALHAR)  --}}
{{-- --------------------------------------------------------------------------------------------------------- --}}
@extends('admin.layouts.app')

@section('title', 'Detalhes do Suporte')

@section('barra')
    {{-- <h1>Detalhes do Suporte {{ $support->id }}</h1> --}}
    <div class="div_section_barra">
        <div><h1>Usuário</h1></div>
        <div><a href="{{  route('usuario.index', ['page' => request()->page]) }}" class="voltar"><i class="fa-solid fa-arrow-left"></i> Voltar</a></div>
    </div>
@endsection
@section('content')
    <div class="moldura_corpo">
    {{-- ------------------------------------------------------------------------------------- --}}

    <div>
        <label class="content_show_label" for="nome">Nome:</label>
        <input name="name" type="text" value="{{ $user->name }}" disabled="disablede"
        class="content_show_input">
    </div>
    <div>
        <label class="content_show_label" for="email">E-mail:</label>
        <input name="email" type="text" value="{{ $user->email }}" disabled="disablede"
        class="content_show_input">
    </div>    <div>
        <label class="content_show_label" for="user_nome">Nome Usuário:</label>
        <input name="user_name" type="text" value="{{ $user->user_name }}" disabled="disablede"
        class="content_show_input">
    </div>    <div>
        <label class="content_show_label" for="admin">Administrador:</label>
        <input name="admin" type="text" value="{{ getAdmin($user->admin) }}" disabled="disablede"
        class="content_show_input">
    </div>
@endsection