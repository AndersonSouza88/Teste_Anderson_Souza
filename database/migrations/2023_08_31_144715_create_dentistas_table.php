<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDentistasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dentistas', function (Blueprint $table) {
            $table->increments('id')->nullable(false);
            $table->string('name',100)->nullable(false);
            $table->string('email',100)->nullable(false);
            $table->integer('cro')->unique()->nullable(false);
            $table->char('cro_uf',2)->nullable(false);
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
        Schema::dropIfExists('dentistas');
    }
}
