<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Propietari;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Animal>
 */
class AnimalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $tipusAnimals = ['gos', 'gat', 'conill', 'rata'];

        return [
            'nom' => fake()->firstName(),
            'tipus' => fake()->randomElement($tipusAnimals),
            'pes' => fake()->randomFloat(2, 0.5, 50),
            'enfermetat' => fake()->word(),
            'comentaris' => fake()->sentence(),

            //por defecto crea un propietario si no se especifica
            'id_persona' => Propietari::factory(),
        ];
    }
}
