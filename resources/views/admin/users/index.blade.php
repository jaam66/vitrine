@extends('admin.layouts.app')

@section('title', 'Usuário')

@section('barra')
    @include('admin.users.partials.header')
@endsection

{{-- diretiva section --}}
@section('content')
{{-- ------------------------------------------------------------------------------------- --}}
    @include('admin.users.partials.content')
    <br>
    {{ $users->links() }}
{{-- ------------------------------------------------------------------------------------- --}}
@endsection
