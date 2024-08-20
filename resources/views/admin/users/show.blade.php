{{-- --------------------------------------------------------------------------------------------------------- --}}
{{-- USUÁRIO SHOW  --}}
{{-- --------------------------------------------------------------------------------------------------------- --}}
@extends('admin.layouts.app')

@section('title', 'Detalhes do Suporte')

@section('barra')
    {{-- <h1>Detalhes do Suporte {{ $support->id }}</h1> --}}
    <div class="barra flex justify-between p-4">
        <div><h1>Detalhes da Dúvida</h1></div>
        <div><a href="{{  route('suporte.index', ['page' => request()->page]) }}" class="voltar">Voltar</a></div>
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
        <label for="nome">Nome:</label>
        <input name="name" type="text" value="{{ $user->name }}" disabled="disablede"
        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
    </div>
@endsection