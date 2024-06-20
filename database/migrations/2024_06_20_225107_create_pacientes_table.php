<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->integer('idade');
            $table->string('sexo');
            $table->text('sintomas');
            $table->text('pressaoArterial');
            $table->text('temperatura');
            $table->text('glicemia');
            $table->text('saturacao');
            $table->text('batimentosCardiacos');
            $table->string('email');
            $table->string('tipoPaciente');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pacientes');
    }
};
