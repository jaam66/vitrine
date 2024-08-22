@extends('admin.layouts.app')

@section('title', 'Detalhes do Suporte')

@section('barra')
    {{-- <h1>Detalhes do Suporte {{ $support->id }}</h1> --}}
    <div class="barra flex justify-between p-4">
        <div><h1>Detalhes da OS</h1></div>
        <div><a href="{{  route('suporte.index', ['page' => request()->page]) }}" class="voltar"><i class="fa-solid fa-arrow-left"></i> Voltar</a></div>
    </div>
@endsection
@section('content')
    <div class="moldura_corpo">
    {{-- ------------------------------------------------------------------------------------- --}}
    <div>
        <label for="assunto">Assunto:</label>
        <input name="subject" type="text" placeholder="Assunto" value="{{ $support->subject }}" disabled="disablede"
        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
    </div>
    <div>
        <label for="remetente">Remetente:</label>
        <input name="sender" type="text" value="{{ $support->sender }}" disabled="disablede"
        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
    </div>
    <div>
        <label for="equipamento">Equipamento:</label>
        <input name="equipment" type="text" value="{{ $equipment->description }}" disabled="disablede"
        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
    </div>
    <div>
        <label for="assunto">Texto:</label>
        <textarea name="body" cols="30" rows="5" placeholder="Descrição" disabled="disblede" 
        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">{{ $support->body }}</textarea>
    </div>
    {{-- ------------------------------------------------------------------------------------- --}}
@endsection