<x-layout>

    <a class="btn btn-secondary" href="{{ route('/usuario') }}">Voltar</a>
    <br><br>
    <form>
        <button type="submit" class="btn btn-danger">Deletar</button>
    </form>
    <table>
        <tr>
            <td>Nome:</td>
            <td>{{ $usuario['nome'] }}</td>
        </tr>
        <tr>
            <td>Email:</td>
            <td>{{ $usuario['email'] }}</td>
        </tr>
        <tr>
            <td>Data de Nascimento:</td>
            <td>{{ $usuario['data_nascimento'] }}</td>
        </tr>
        <tr>
            <td>CPF:</td>
            <td>{{ $usuario['cpf'] }}</td>
        </tr>
    </table>
</x-layout>
