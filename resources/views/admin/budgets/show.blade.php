{{-- --------------------------------------------------------------------------------------------------------- --}}
{{-- EQUIPAMENTO SHOW (DETALHAR)  --}}
{{-- --------------------------------------------------------------------------------------------------------- --}}

@extends('admin.layouts.app')

@section('title', 'Suporte')

@section('barra')
    {{-- <h1>Detalhes do Suporte {{ $support->id }}</h1> --}}
    <div class="div_section_barra">
        <div><h1>Detalhes do Equipamento</h1></div>
        <div><a href="{{  route('equipamento.index', ['page' => request()->page]) }}" class="voltar"><i class="fa-solid fa-arrow-left"></i> Voltar</a></div>
    </div>
@endsection
@section('content')
    <div class="moldura_corpo">
    {{-- ------------------------------------------------------------------------------------- --}}
    <div>
        <label for="assunto">Assunto:</label>
        <input name="subject" type="text" placeholder="Assunto" value="{{ $equipment->description }}" disabled="disablede"
        class="content_show_input">
    </div>
     {{-- ------------------------------------------------------------------------------------- --}}
@endsection