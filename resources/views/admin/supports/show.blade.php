<h1>Detalhes do Suporte {{ $support->id }}</h1>

<a href="{{ route('suporte.index') }}">Voltar</a>

<ul>
    <li>Assunto: {{ $support->subject }}</li>
    <li>Status: {{ $support->status }}</li>
    <li>Descrição: {{ $support->body }}</li>
</ul>

<form action="{{ route('suporte.destroy', $support->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">Deletar</button>
</form>