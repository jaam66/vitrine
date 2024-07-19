@extends('admin.layouts.app')

@section('title', 'Suporte')

@section('barra')
    @include('admin.supports.partials.header')
@endsection

{{-- diretiva section --}}
@section('content')
{{-- ------------------------------------------------------------------------------------- --}}
    @include('admin.supports.partials.content')
    <br>
    {{ $supports->links() }}
{{-- ------------------------------------------------------------------------------------- --}}
@endsection
