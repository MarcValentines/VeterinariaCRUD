<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Animal;
use App\Models\Propietari;
use Faker\Factory as Faker;

class AnimalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $tipusAnimals = ['gos', 'gat', 'conill', 'rata'];

        $propietaris = Propietari::all();

        foreach ($propietaris as $propietari) {
            //cada propietari te 2 animales
            for ($i = 0; $i < 2; $i++) {
                Animal::create([
                    'nom' => $faker->firstName,
                    'tipus' => $tipusAnimals[array_rand($tipusAnimals)],
                    'pes' => $faker->randomFloat(2, 0.5, 50), //pes entre 0.5 y 50kg
                    'enfermetat' => $faker->word,
                    'comentaris' => $faker->sentence,
                    'id_persona' => $propietari->id,
                ]);
            }
        }
    }
}
