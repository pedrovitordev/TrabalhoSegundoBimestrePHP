<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MedicoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('medicos')->insert([

            'nome' => 'Primeiro medico',
            'cpf'  => '123123',
            'telefone' => '123456',
            'nascimento' => '2020-06-24',
            'crm' => 'teste',
            'especialidade' => 'testeteste',
            'senha' => bcrypt('senha')
        ]);
        


    }
}


