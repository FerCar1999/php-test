<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GradoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('grd_grado')->insert(
            [
                ['grd_nombre' => 'Séptimo Grado'],
                ['grd_nombre' => 'Octavo Grado'],
                ['grd_nombre' => 'Noveno Grado'],
                ['grd_nombre' => 'Primer Año Bachillerato'],
                ['grd_nombre' => 'Segundo Año Bachillerato'],
                ['grd_nombre' => 'Tercer Año Bachillerato']
            ]
        );
    }
}
