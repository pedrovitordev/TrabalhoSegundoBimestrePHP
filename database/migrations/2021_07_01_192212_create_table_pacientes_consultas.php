<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablePacientesConsultas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes_consultas', function (Blueprint $table) {

            $table->unsignedBigInteger('paciente_id');
            $table->unsignedBigInteger('consulta_id');
            $table->foreign('paciente_id')->references('id')->on('pacientes');
            $table->foreign('consulta_id')->references('id')->on('consultas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pacientes_consultas');
    }
}
