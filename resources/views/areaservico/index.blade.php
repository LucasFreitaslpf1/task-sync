<x-layout>
    <div class="container">
        <h1>Áreas de Serviço</h1>
        <a href="{{ route('areas-servico.create') }}" class="btn btn-primary">Criar Nova Área de Serviço</a>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($AreasServico as $area)
                    <tr>
                        <td>{{ $area->name }}</td>
                        <td>{{ $area->description }}</td>
                        <td>
                            <a href="{{ route('areaservico.edit', $area->id) }}" class="btn btn-warning">Editar</a>
                            <h1>Adicionar Funcionário à Área de Serviço: {{ $serviceArea->name }}</h1>

                            <form action="{{ route('areaservico.add-func', $serviceArea->id) }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="employee_id">Selecione o Funcionário:</label>
                                    <select class="form-control" id="employee_id" name="employee_id" required>
                                        @foreach($employees as $employee)
                                            <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Adicionar Funcionário</button>
                            </form>

                            <form action="{{ route('areaservico.destroy', $area->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Excluir</button>
                            </form>
                            
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>
