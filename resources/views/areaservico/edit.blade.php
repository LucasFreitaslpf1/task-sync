<x-layout>
        <div class="container">
        <h1>Editar Área de Serviço</h1>
        <form action="{{ route('areaservico.update', $Areaservico->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Nome*</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $serviceArea->name }}" required>
            </div>

            <div class="form-group">
                <label for="manager_id">Gerente Responsável*</label>
                <select class="form-control" id="manager_id" name="manager_id" required>
                    @foreach($managers as $manager)
                        <option value="{{ $manager->id }}" {{ $serviceArea->manager_id == $manager->id ? 'selected' : '' }}>
                            {{ $manager->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="employee_ids">Funcionários*</label>
                <select multiple class="form-control" id="employee_ids" name="employee_ids[]" required>
                    @foreach($employees as $employee)
                        <option value="{{ $employee->id }}" {{ in_array($employee->id, $serviceArea->employees->pluck('id')->toArray()) ? 'selected' : '' }}>
                            {{ $employee->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>

