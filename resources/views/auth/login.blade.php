@extends('admin.layouts.pub')
{{-- diretiva section --}}
@section('barra')
    {{-- <h1>Detalhes do Suporte {{ $support->id }}</h1> --}}
    <div class="barra flex justify-between p-4">
        <div><h1>Fazer Login</h1></div>
    </div>
@endsection
@section('content')

{{-- ------------------------------------------------------------------------------------- --}}
    @include('partials.login')
{{-- ------------------------------------------------------------------------------------- --}}
@endsection
