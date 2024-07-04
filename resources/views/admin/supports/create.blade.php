<h1>Novo Suporte</h1>

<a href="{{ route('suporte.index') }}">Voltar</a>
<br><br>
@if ($errors->any())
    @foreach ($errors->all() as $error)
        {{ $error }}
    @endforeach
@endif
<br>
<form action="{{ route('suporte.store') }}" method="POST">
    <!-- <input type="text" value="{{ csrf_token() }}" name="_token"> -->
     @csrf()
    <input type="text" value="{{ old('subject') }}" placeholder="Assunto" name="subject">
    <textarea name="body" cols="30" rows="5" placeholder="Descrição">{{ old('body') }}</textarea>
    <button type="submit">Enviar</button>
</form>