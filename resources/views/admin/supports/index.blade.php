<h1>Listagem dos Suportes</h1>

<table>
    <thead>
        <th>assunto</th>
        <th>status</th>
        <th>descrição</th>
        <th></th>
    </thead>
    <tbody>
        @foreach ($supports as $suppoort)
        <tr>
            <td>{{ $supports->subject }}</td>
            <td>{{ $supports->status }}</td>
            <td>{{ $supports->body }}</td>
            <td>
                >
            </td>
        </tr>
        @endforeach
    </tbody>
</table>


