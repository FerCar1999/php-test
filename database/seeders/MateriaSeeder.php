<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MateriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mat_materia')->insert(
            [
                ['mat_nombre' => 'Lenguaje'],
                ['mat_nombre' => 'Matemáticas'],
                ['mat_nombre' => 'Sociales'],
                ['mat_nombre' => 'Ciencias Salud y Medio Ambiente'],
                ['mat_nombre' => 'Informática'],
                ['mat_nombre' => 'Orientación para la vida']
            ]
        );
    }
}
