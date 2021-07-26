<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    use HasFactory;


    protected $fillable = [

        
            'data',
            'hora',
            'motivo',
            'historico'

    ];


    public function medicos()
    {

        return $this->belongsTo(Medico::class,'medicos_consultas');
    }

    public function pacientes()
    {

        return $this->belongsTo(Paciente::class,'pacientes_consultas');
    }
}
