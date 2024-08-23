{{-- --------------------------------------------------------------------------------------------------------- --}}
{{-- OS SHOW (DETALHAR)  --}}
{{-- --------------------------------------------------------------------------------------------------------- --}}
@extends('admin.layouts.app')

@section('title', 'Detalhes do Suporte')

@section('barra')
    {{-- <h1>Detalhes do Suporte {{ $support->id }}</h1> --}}
    <div class="div_section_barra">
        <div><h1>Detalhes da OS</h1></div>
        <div><a href="{{  route('suporte.index', ['page' => request()->page]) }}" class="voltar"><i class="fa-solid fa-arrow-left"></i> Voltar</a></div>
    </div>
@endsection
@section('content')
    <div class="moldura_corpo">
    {{-- ------------------------------------------------------------------------------------- --}}
    <div>
        <label class="content_show_label" for="assunto">Assunto:</label>
        <input name="subject" type="text" placeholder="Assunto" value="{{ $support->subject }}" disabled="disablede"
        class="content_show_input">
    </div>
    <div>
        <label class="content_show_label" for="remetente">Remetente:</label>
        <input name="sender" type="text" value="{{ $support->sender }}" disabled="disablede"
        class="content_show_input">
    </div>
    <div>
        <label class="content_show_label" for="equipamento">Equipamento:</label>
        <input name="equipment" type="text" value="{{ $equipment->description }}" disabled="disablede"
        class="content_show_input">
    </div>
    <div>
        <label class="content_show_label" for="assunto">Texto*:</label>
        <textarea name="body" cols="30" rows="5" placeholder="Descrição" disabled="disblede" 
        class="content_show_input">{{ $support->body }}</textarea>
    </div>
    {{-- ------------------------------------------------------------------------------------- --}}
@endsection