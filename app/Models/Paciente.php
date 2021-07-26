<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;

    protected $fillable = [

        'nome',
        'cpf',
        'telefone',
        'nascimento'
    ];

    public function consulta()
    { 
        return $this->belongsToMany(Consulta::class,'pacientes_consultas');
    }
}
