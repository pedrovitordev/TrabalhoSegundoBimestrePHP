<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    use HasFactory;


    protected $fillable = [

        'nome',
        'cpf',
        'telefone',
        'nascimento',
        'crm',
        'especialidade',
        'senha'
    ];


    public function consultas()
    {

        return $this->belongsToMany(Consulta::class, 'medicos_consultas');
    }
}
