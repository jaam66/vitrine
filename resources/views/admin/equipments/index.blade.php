@extends('admin.layouts.app')

@section('title', 'Suporte')

@section('barra')
    @include('admin.equipments.partials.header')
@endsection

{{-- diretiva section --}}
@section('content')
{{-- ------------------------------------------------------------------------------------- --}}
    @include('admin.equipments.partials.content')
    <br>
    {{ $equipments->links() }}
{{-- ------------------------------------------------------------------------------------- --}}
@endsection
