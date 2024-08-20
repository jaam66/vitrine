{{-- --------------------------------------------------------------------------------------------------------- --}}
{{-- USUÁRIO CREATE (CRIAR)  --}}
{{-- --------------------------------------------------------------------------------------------------------- --}}
@extends('admin.layouts.app')

@section('title', 'Usuário')

@section('barra')
    <div class="barra flex justify-between p-4">
        <div><h1>Novo Usuário</h1></div>
        <div><a href="{{  route('usuario.index', ['page' => request()->page]) }}" class="voltar">Voltar</a></div>
    </div>
@endsection

@section('content')
{{-- ------------------------------------------------------------------------------------- --}}
    <form action="{{ route('usuario.store') }}" method="POST" onkeydown="if(event.key === 'Enter'){ event.preventDefault(); }">
        @include('admin.users.partials.form')
    </form>
{{-- ------------------------------------------------------------------------------------- --}}
@endsection