@extends('admin.layouts.app')

@section('title', 'Suporte')

@section('barra')
    {{-- <h1>Detalhes do Suporte {{ $support->id }}</h1> --}}
    <div class="barra flex justify-between p-4">
        <div><h1>Editar Dúvida</h1></div>
        <div><a href="{{  route('suporte.list', ['page' => request()->page]) }}" class="voltar">Voltar</a></div>
    </div>
@endsection
@section('content')
{{-- ------------------------------------------------------------------------------------- --}}
    <form action="{{ route('suporte.update', $support->id) }}" method="POST">
        <!-- <input type="text" value="{{ csrf_token() }}" name="_token"> -->
        @method('PUT')
        @include('admin.supports.partials.form',[
            'support' => $support
        ])
    </form>
@endsection