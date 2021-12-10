<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AlumnoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'alm_codigo' => $this->faker->numberBetween(20220000, 20229999),
            'alm_nombre' => $this->faker->name('male'),
            'alm_edad' => $this->faker->numberBetween(10, 17),
            'alm_sexo' => 'Masculino',
            'alm_id_grd' => $this->faker->numberBetween(1, 6),
            'alm_observacion' => $this->faker->text(300),
        ];
    }
}
