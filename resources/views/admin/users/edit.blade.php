{{-- --------------------------------------------------------------------------------------------------------- --}}
{{-- USUÁRIO EDIT (EDITAR)  --}}
{{-- --------------------------------------------------------------------------------------------------------- --}}
@extends('admin.layouts.app')

@section('title', 'Usuário')

@section('barra')
    {{-- <h1>Detalhes do Suporte {{ $support->id }}</h1> --}}
    <div class="barra flex justify-between p-4">
        <div><h1>Editar Dúvida</h1></div>
        <div><a href="{{  route('usuario.index', ['page' => request()->page]) }}" class="voltar">Voltar</a></div>
    </div>
@endsection
@section('content')
{{-- ------------------------------------------------------------------------------------- --}}
    <form action="{{ route('usuario.update', $user->id) }}" method="POST">
        <!-- <input type="text" value="{{ csrf_token() }}" name="_token"> -->
        @method('PUT')
        @include('admin.users.partials.form',[
            'user' => $user
        ])
        <input name="page" type="hidden" value="{{ request()->page }}">
    </form>
@endsection