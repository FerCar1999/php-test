<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlmAlumnoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alm_alumno', function (Blueprint $table) {
            $table->id('alm_id');
            $table->string('alm_codigo', 100)->unique();
            $table->string('alm_nombre', 300);
            $table->integer('alm_edad', false, true);
            $table->string('alm_sexo', 100);
            $table->foreignId('alm_id_grd')->references('grd_id')->on('grd_grado');
            $table->string('alm_observacion', 300)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alm_alumno');
    }
}
