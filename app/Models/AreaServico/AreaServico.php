<?php

namespace App\Models\AreaServico;

use App\Models\Tarefa\Tarefa;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AreaServico extends Model
{
    protected $fillable = ['name', 'description'];
    public function tarefas()
    {
        return $this->hasMany(Tarefa::class);
    }

    public function funcionarios()
    {
        return $this->belongsToMany(Funcionario::class);
    }

    public function gerente()
    {
        return $this->belongsTo(Funcionario::class, 'gerente_id');
    }
    
}
