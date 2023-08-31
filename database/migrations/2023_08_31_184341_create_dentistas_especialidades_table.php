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
            $table->unsignedInteger('especialidade_id')->nullable(false);
            $table->unsignedInteger('dentista_id')->nullable(false);
            $table->timestamps();
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
