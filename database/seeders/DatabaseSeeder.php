<?php

namespace Database\Seeders;

use App\Models\Alumno;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            GradoSeeder::class,
            MateriaSeeder::class,
            MateriaGradoSeeder::class
        ]);
        Alumno::factory(5)->create();
    }
}
