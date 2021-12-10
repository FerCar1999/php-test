<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMxgMateriasxgradoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mxg_materiasxgrado', function (Blueprint $table) {
            $table->id('mxg_id');
            $table->foreignId('mxg_id_grd')->references('grd_id')->on('grd_grado');
            $table->foreignId('mxg_id_mat')->references('mat_id')->on('mat_materia');
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
        Schema::dropIfExists('mxg_materiasxgrado');
    }
}
