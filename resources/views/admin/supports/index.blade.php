@extends('admin.layouts.app')

@section('title', 'Suporte')

@section('header')
<h1>LISTAGEM DOS SUPORTES</h1>
@endsection
{{-- diretiva section --}}
@section('content')
{{-- ------------------------------------------------------------------------------------- --}}

<table>
    <thead>
        <th>assunto</th>
        <th>status</th>
        <th>descrição</th>
        <th></th>
        </thead>
        <tbody>
            @foreach ($supports as $support)
            <tr>
                <td>{{ $support->subject }}</td>
                <td>{{ getStatusSupport($support->status) }}</td>
                <td>{{ $support->body }}</td>
                <td>
                    <a href="{{ route('suporte.show', $support->id) }}">Detalhes</a> | 
                    <a href="{{ route('suporte.edit', $support->id) }}">Editar</a> | 
                    <a href="{{ route('suporte.delete', $support->id) }}">Deletar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <br>
{{ $supports->links() }}
{{-- ------------------------------------------------------------------------------------- --}}
<a href="{{ route('suporte.create') }}">Novo Suporte</a>
@endsection
