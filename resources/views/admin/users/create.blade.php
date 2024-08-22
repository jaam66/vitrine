{{-- --------------------------------------------------------------------------------------------------------- --}}
{{-- USUÁRIO CREATE (FORM CRIAR)  --}}
{{-- --------------------------------------------------------------------------------------------------------- --}}
@extends('admin.layouts.app')

@section('title', 'Usuário')

@section('barra')
    <div class="barra flex justify-between p-4">
        <div><h1>Novo Usuário</h1></div>
        <div><a href="{{  route('usuario.index', ['page' => request()->page]) }}" class="voltar"><i class="fa-solid fa-arrow-left"></i> Voltar</a></div>
    </div>
@endsection

@section('content')
{{-- ------------------------------------------------------------------------------------- --}}
    <form action="{{ route('usuario.store') }}" method="POST" onkeydown="if(event.key === 'Enter'){ event.preventDefault(); }">
        @php
        $form_crud = "cadastro";
        @endphp
        
        @include('admin.users.partials.form')
    </form>
{{-- ------------------------------------------------------------------------------------- --}}
@endsection