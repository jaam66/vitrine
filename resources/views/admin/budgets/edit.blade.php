{{-- --------------------------------------------------------------------------------------------------------- --}}
{{-- EQUIPAMENTO EDIT (FORM EDITAR)  --}}
{{-- --------------------------------------------------------------------------------------------------------- --}}
@extends('admin.layouts.app')

@section('title', 'Suporte')

@section('barra')
    {{-- <h1>Detalhes do Suporte {{ $support->id }}</h1> --}}
    <div class="barra flex justify-between p-4">
        <div><h1>Editar Equipamento</h1></div>
        <div>
            <a href="{{  route('equipamento.index', ['page' => request()->page]) }}" class="voltar"><i class="fa-solid fa-arrow-left"></i> Voltar</a></div>
    </div>
@endsection
@section('content')
{{-- ------------------------------------------------------------------------------------- --}}
    <form action="{{ route('equipamento.update', $equipment->id) }}" method="POST">
        @php
        $form_crud = "editar";
        @endphp
        
        @method('PUT')
        @include('admin.equipments.partials.form',[
            'equipment' => $equipment
        ])
        <input name="page" type="hidden" value="{{ request()->page }}">
    </form>
@endsection