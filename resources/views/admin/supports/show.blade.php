@extends('admin.layouts.app')

@section('title', 'Detalhes do Suporte')

@section('hdr')
    {{-- <h1>Detalhes do Suporte {{ $support->id }}</h1> --}}
    <div class="flex justify-between p-4">
        <div><h1>Detalhes do Suporte</h1></div>
        <div><a href="{{  route('suporte.index', ['page' => request()->page]) }}" class="voltar">Voltar</a></div>
    </div>
@endsection

@section('content')
{{-- ------------------------------------------------------------------------------------- --}}
    <table class="tabela_show mt-6">
        <tr>
            <td class="font-bold">Assunto:</td>
            <td>{{ $support->subject }}</td>
        </tr>
        <tr>
            <td class="font-bold">Status:</td>
            <td>{{ getStatusSupport($support->status) }}</td>
        </tr>        <tr>
            <td class="font-bold">Dúvida:</td>
            <td>{{ $support->body }}</td>
        </tr>
    </table>

    {{-- <form action="{{ route('suporte.destroy', $support->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Deletar</button>
    </form> --}}
{{-- ------------------------------------------------------------------------------------- --}}
@endsection