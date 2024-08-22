{{-- --------------------------------------------------------------------------------------------------------- --}}
{{-- OS EDIT (FORM EDITAR)  --}}
{{-- --------------------------------------------------------------------------------------------------------- --}}
@extends('admin.layouts.app')

@section('title', 'Suporte')

@section('barra')
    {{-- <h1>Detalhes do Suporte {{ $support->id }}</h1> --}}
    <div class="barra flex justify-between p-4">
        <div><h1>Editar OS</h1></div>
        <div>
            <a href="{{  route('suporte.index', ['page' => request()->page]) }}" class="voltar"><i class="fa-solid fa-arrow-left"></i> Voltar</a></div>
    </div>
@endsection
@section('content')
{{-- ------------------------------------------------------------------------------------- --}}
    <form action="{{ route('suporte.update', $support->id) }}" method="POST">
        <!-- <input type="text" value="{{ csrf_token() }}" name="_token"> -->
        @php
        $form_crud = "editar";
        @endphp
        
        @method('PUT')
        @include('admin.supports.partials.form',[
            'support' => $support
        ])
        <input name="page" type="hidden" value="{{ request()->page }}">
    </form>
@endsection