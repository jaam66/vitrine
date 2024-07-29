@extends('admin.layouts.app')

@section('title', 'Suporte')

@section('header')
<h1>Novo Suporte</h1>
@endsection

@section('content')
{{-- ------------------------------------------------------------------------------------- --}}
    <a href="{{ route('suporte.index') }}">Voltar</a>
    <br>
    <form action="{{ route('suporte.store') }}" method="POST">
        @include('admin.supports.partials.form')
    </form>
{{-- ------------------------------------------------------------------------------------- --}}
@endsection