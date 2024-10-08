{{-- --------------------------------------------------------------------------------------------------------- --}}
{{-- EQUIPAMENTOS CREATE (CRIAR)  --}}
{{-- --------------------------------------------------------------------------------------------------------- --}}
@extends('admin.layouts.app')

@section('title', 'Suporte')

@section('barra')
    <div class="barra flex justify-between p-4">
        <div><h1>Novo Equipamento</h1></div>
        <div><a href="{{  route('equipamento.index', ['page' => request()->page]) }}" class="voltar"><i class="fa-solid fa-arrow-left"></i> Voltar</a></div>
    </div>
@endsection

@section('content')
{{-- ------------------------------------------------------------------------------------- --}}
    <form action="{{ route('equipamento.store') }}" method="POST">
        @php
        $form_crud = "cadastro";
        @endphp

        @include('admin.equipments.partials.form')
    </form>
{{-- ------------------------------------------------------------------------------------- --}}
@endsection