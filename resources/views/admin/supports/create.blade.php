@extends('admin.layouts.app')

@section('title', 'Suporte')

@section('barra')
    {{-- <h1>Detalhes do Suporte {{ $support->id }}</h1> --}}
    <div class="barra flex justify-between p-4">
        <div><h1>Nova Dúvida</h1></div>
        <div><a href="{{  route('suporte.index', ['page' => request()->page]) }}" class="voltar">Voltar</a></div>
    </div>
@endsection

@section('content')
{{-- ------------------------------------------------------------------------------------- --}}
    <form action="{{ route('suporte.store') }}" method="POST">
        @include('admin.supports.partials.form')
    </form>
{{-- ------------------------------------------------------------------------------------- --}}
@endsection