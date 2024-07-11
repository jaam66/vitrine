@extends('admin.layouts.app')

@section('title', 'Suporte')

@section('header')
<h1>EDITAR Registro: {{ $support->id }}</h1>
@endsection
@section('content')
{{-- ------------------------------------------------------------------------------------- --}}
<br><br>
<a href="{{ route('suporte.index') }}">Voltar</a>
<x-alert/>
<br>
    <form action="{{ route('suporte.update', $support->id) }}" method="POST">
        <!-- <input type="text" value="{{ csrf_token() }}" name="_token"> -->
        @method('PUT')
        @include('admin.supports.partials.form',[
            'support' => $support
        ])
    </form>
@endsection