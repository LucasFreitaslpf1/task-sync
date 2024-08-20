<?php

namespace App\Models\Tarefa;

use App\Models\AreaServico\AreaServico;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarefa extends Model
{

    protected $fillable = [
        'titulo', 'descricao', 'deadline'
    ];

    public function AreasServico()
    {
        return $this->belongsTo(AreaServico::class);
    }

    public function employees()
    {
        return $this->belongsToMany(Employee::class);
    }
}
