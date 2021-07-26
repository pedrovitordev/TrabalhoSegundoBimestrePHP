<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableMedicosConsultas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicos_consultas', function (Blueprint $table) {

            $table->unsignedBigInteger('medico_id');
            $table->unsignedBigInteger('consulta_id');
            $table->foreign('medico_id')->references('id')->on('medicos');
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
        Schema::dropIfExists('medicos_consultas');
    }
}
