<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AtendenteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    
        DB::table('atendentes')->insert([

            'nome' => 'Primeiro atendente',
            'cpf'  => '123123',
            'telefone' => '123456',
            'nascimento' => '2020-06-24',
            'senha' => bcrypt('senha')
        ]);

    }
}

 
