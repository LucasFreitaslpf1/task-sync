<?php
use App\Http\Controllers\UsuarioController;
?>


<x-layout>
    <a href="{{ route('usuario.create') }}" class="btn btn-success" role="button">Criar</a>
    <div class="card">
        <table>
            <th>Id</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Telefone</th>
            <th>CPF</th>
            <th>Data de Nascimento</th>
            <th>Ações
            <th>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user['id'] }}</td>
                        <td>{{ $user['nome'] }}</td>
                        <td>{{ $user['email'] }}</td>
                        <td> {{ $user['telefone'] }}</td>
                        <td> {{ $user['cpf'] }}</td>
                        <td>{{ $user['data_nascimento'] }}</td>
                        <td>
                            <a class="btn btn-primary btn-sm"
                                href="{{ route('usuario.update', ['usuario' => $user]) }}">Editar</a>
                            <br>
                            <a class="btn btn-info btn-sm"
                                href="{{ route('usuario.view', ['id' => $user['id']]) }}">Visualizar</a>
                            <form method="post" action="{{ route('usuario.destroy', ['usuario' => $user]) }}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm"
                                    onclick="confirm('Deseja excluir este usuário??')">Deletar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
        </table>
        {{ $users->links() }}
    </div>
</x-layout>
