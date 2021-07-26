<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PacienteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pacientes')->insert([

            'nome' => 'Primeiro paciente',
            'cpf'  => '123123',
            'telefone' => '123456',
            'nascimento' => '2020-06-24',
        ]);

    
    }
}

