<h1>Listagem dos Suportes</h1>

<a href="{{ route('suporte.create') }}">Novo Suporte</a>

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
            <td>{{ $support->status }}</td>
            <td>{{ $support->body }}</td>
            <td>
                <a href="{{ route('suporte.show', $support->id) }}">Detalhes</a>
                <a href="{{ route('suporte.edit', $support->id) }}">Editar</a>
                <a href="{{ route('suporte.delete', $support->id) }}">Deletar</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>


