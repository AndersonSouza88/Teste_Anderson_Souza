<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDentistasEspecialidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dentistas_especialidades', function (Blueprint $table) {
            $table->unsignedBigInteger('dentista_id');
            $table->unsignedBigInteger('especialidade_id');
            $table->timestamps();

            $table->foreign('dentista_id')->references('id')->on('dentistas')->onDelete('cascade');
            $table->foreign('especialidade_id')->references('id')->on('especialidades')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dentistas_especialidades');
    }
}
