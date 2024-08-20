<x-layout>
    <div class="container">
        <h1>Criar Nova Área de Serviço</h1>
        <form action="{{ route('areaservico.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nome*</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <div class="form-group">
                <label for="manager_id">Gerente Responsável**</label>
                <select class="form-control" id="manager_id" name="manager_id" required>
                    @foreach($managers as $manager)
                        <option value="{{ $manager->id }}">{{ $manager->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="employee_ids">Funcionários*</label>
                <select multiple class="form-control" id="employee_ids" name="employee_ids[]" required>
                    @foreach($employees as $employee)
                        <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>

</x-layout>

