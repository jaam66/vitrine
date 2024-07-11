@extends('admin.layouts.app')

@section('title', 'Suporte')

@section('header')
<h1>Detalhes do Suporte {{ $support->id }}</h1>
@endsection

@section('content')
{{-- ------------------------------------------------------------------------------------- --}}
    <a href="{{ route('suporte.index') }}">Voltar</a>
    <hr>
    <ul>
        <li>Assunto: {{ $support->subject }}</li>
        <li>Status: {{ getStatusSupport($support->status) }}</li>
        <li>Descrição: {{ $support->body }}</li>
    </ul>
    <hr>
    {{-- <form action="{{ route('suporte.destroy', $support->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Deletar</button>
    </form> --}}
{{-- ------------------------------------------------------------------------------------- --}}
@endsection