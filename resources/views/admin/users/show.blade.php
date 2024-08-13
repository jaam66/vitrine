{{-- --------------------------------------------------------------------------------------------------------- --}}
{{-- USUÁRIO SHOW  --}}
{{-- --------------------------------------------------------------------------------------------------------- --}}
@extends('admin.layouts.app')

@section('title', 'Detalhes do Suporte')

@section('barra')
    {{-- <h1>Detalhes do Suporte {{ $support->id }}</h1> --}}
    <div class="barra flex justify-between p-4">
        <div><h1>Detalhes da Dúvida</h1></div>
        <div><a href="{{  route('suporte.index', ['page' => request()->page]) }}" class="voltar">Voltar</a></div>
    </div>
@endsection
@section('content')
    <div class="moldura_corpo">
    {{-- ------------------------------------------------------------------------------------- --}}

    <div>
        <label for="assunto">Assunto*:</label>
        <input name="subject" type="text" placeholder="Assunto" value="{{ $support->subject ?? old('subject') }}" disabled="disblede"
        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
        @error('subject')
        <div class="text-red-500">{{ $message }}</div>
    @enderror
    </div>
    <label for="assunto">Texto*:</label>
    <textarea name="body" cols="30" rows="5" placeholder="Descrição" disabled="disblede" 
    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">{{ $support->body ?? old('body') }}</textarea>
        {{-- <form action="{{ route('suporte.destroy', $support->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Deletar</button>
        </form> --}}
    {{-- ------------------------------------------------------------------------------------- --}}
    </div>
@endsection