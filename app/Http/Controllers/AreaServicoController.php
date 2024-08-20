<?php

namespace App\Http\Controllers;
use App\Models\AreaServico\AreaServico;

use Illuminate\Http\Request;

class AreaServicoController extends Controller
{
    // FE-01: Listar áreas de serviço
    public function index()
    {
        $Areaservico = AreaServico::all();
        return view('areas-servico.index', compact('AreaServico'));
    }

    // Formulário de criação
    public function create()
{
    $managers = Employee::where('is_manager', true)->get();
    $employees = Employee::all();
    return view('areaservico.create', compact('managers', 'employees'));
}

    // FA-01: Visualizar uma área de serviço específica
    public function show($id)
    {
        $Areaservico = AreaServico::with(['tasks', 'employees'])->findOrFail($id);
        return view('areas-servico.show', compact('Areaservico'));
    }


    // FA-02: Criar uma nova área de serviço
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'manager_id' => 'required|exists:employees,id',
            'employee_ids' => 'required|array',
            'employee_ids.*' => 'exists:employees,id',
        ]);
    
        $Areaservico = new AreaServico();
        $Areaservico->name = $validatedData['name'];
        $Areaservico->manager_id = $validatedData['manager_id'];
        $Areaservico->save();
    
        // Associando funcionários
        $Areaservico->employees()->attach($validatedData['employee_ids']);
    
        return redirect()->route('areaservico.show', $Areaservico->id);
    }

     // Formulário de edição
     public function edit($id)
     {
         $Areaservico = AreaServico::findOrFail($id);
         return view('areaservico.edit', compact('Areaservico'));
     }

    // FA-03: Atualizar uma área de serviço
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $Areaservico = AreaServico::findOrFail($id);
        $Areaservico->update($validatedData);

        return redirect()->route('areaservico.index');
    }

    // FA-04: Apagar uma área de serviço
    public function destroy($id)
    {
        $Areaservico = ServiceArea::findOrFail($id);
        $Areaservico->delete();

        return redirect()->route('service-areas.index')->with('success', 'Área de serviço excluída com sucesso!');
    }
}
