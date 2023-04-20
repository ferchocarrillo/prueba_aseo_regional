<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Rutas;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rutas>
 */
class RutasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [

        'codigo' => $this->faker->codigo()->randomElement([1, 10000]);
        'nombre' => $this->faker->nombre();

        ];
    }
}
