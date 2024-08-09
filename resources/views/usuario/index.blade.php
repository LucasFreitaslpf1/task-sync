<x-layout>
    <a href="{{ route('usuario.create') }}" class="btn" role="button">Criar</a>
    <div class="card">
        <table>
            <th>Nome</th>
            <th>Email</th>
            <th>Telefone</th>
            <th>CPF</th>
            <th>Data de Nascimento</th>
            <th>Ações
            <th>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user['nome'] }}</td>
                        <td>{{ $user['email'] }}</td>
                        <td> {{ $user['telefone'] }}</td>
                        <td> {{ $user['cpf'] }}</td>
                        <td>{{ $user['data_nascimento'] }}</td>
                        <td>
                            <a href="{{ route('usuario.update', ['usuario' => $user]) }}">Editar</a>
                            <a href="{{ route('usuario.view', ['id' => $user['id']]) }}">Visualizar</a>
                        </td>
                    </tr>
                @endforeach
        </table>
        {{ $users->links() }}
    </div>
</x-layout>
