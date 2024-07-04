<h1>EDITAR {{ $support->id }}</h1>

<a href="{{ route('suporte.index') }}">Voltar</a>
<br><br>
@if ($errors->any())
    @foreach ($errors->all() as $error)
        {{ $error }}
    @endforeach
@endif
<br>
<form action="{{ route('suporte.update', $support->id) }}" method="POST">
    <!-- <input type="text" value="{{ csrf_token() }}" name="_token"> -->
    @csrf
    @method('PUT')
    <input type="text" placeholder="Assunto" name="subject" value="{{ $support->subject }}">
    <textarea name="body" cols="30" rows="5" placeholder="Descrição">{{ $support->body }}</textarea>
    <button type="submit">Enviar</button>
</form>