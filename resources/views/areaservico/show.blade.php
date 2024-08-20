
<x-layout>
    <div class="container">
        <h1>Detalhes da Área de Serviço</h1>
        
        <div>
            <h2>{{ $serviceArea->name }}</h2>
            <p>{{ $serviceArea->description }}</p>
        </div>

        <h3>Tarefas</h3>
        <ul>
            @foreach($serviceArea->tasks as $tarefa)
                <li>{{ $tarefa->name }}</li>
            @endforeach
        </ul>

        <a href="#" class="btn btn-success">Adicionar Tarefa</a>

        <h3>Funcionários</h3>
        <ul>
            @foreach($serviceArea->employees as $employee)
                <li>
                    {{ $employee->name }}
                    <form action="#" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="btn btn-danger">Remover</button>
                    </form>
                </li>
            @endforeach
        </ul>

        <a href="#" class="btn btn-primary">Adicionar Funcionário</a>

        <h3>Gerenciar Funcionários nas Tarefas</h3>
        <ul>
            @foreach($serviceArea->tasks as $tarefa)
                <li>
                    <h4>{{ $tarefa->name }}</h4>
                    <p>Funcionários atribuídos:</p>
                    <ul>
                        @foreach($tarefa->employees as $employee)
                            <li>
                                {{ $employee->name }}
                                <form action="#" method="POST" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-warning">Remover da Tarefa</button>
                                </form>
                            </li>
                        @endforeach
                    </ul>
                    <form action="#" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="btn btn-success">Associar Funcionário</button>
                    </form>
                </li>
            @endforeach
        </ul>

        <a href="{{ route('service-areas.index') }}" class="btn btn-secondary">Voltar</a>
    </div>

</x-layout>