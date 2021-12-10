<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MateriaGradoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mxg_materiasxgrado')->insert(
            [
                ['mxg_id_grd' => 1,'mxg_id_mat' => 1],
                ['mxg_id_grd' => 1,'mxg_id_mat' => 2],
                ['mxg_id_grd' => 1,'mxg_id_mat' => 3],

                ['mxg_id_grd' => 2,'mxg_id_mat' => 1],
                ['mxg_id_grd' => 2,'mxg_id_mat' => 2],
                
                ['mxg_id_grd' => 3,'mxg_id_mat' => 2],
                ['mxg_id_grd' => 3,'mxg_id_mat' => 3],

                ['mxg_id_grd' => 4,'mxg_id_mat' => 1],
                ['mxg_id_grd' => 4,'mxg_id_mat' => 2],
                ['mxg_id_grd' => 4,'mxg_id_mat' => 3],
                ['mxg_id_grd' => 4,'mxg_id_mat' => 4],

                ['mxg_id_grd' => 5,'mxg_id_mat' => 1],
                ['mxg_id_grd' => 5,'mxg_id_mat' => 2],
                ['mxg_id_grd' => 5,'mxg_id_mat' => 4],
                ['mxg_id_grd' => 5,'mxg_id_mat' => 5],
            ]
        );
    }
}
