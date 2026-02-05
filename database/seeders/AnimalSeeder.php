<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Animal;
use App\Models\Propietari;

class AnimalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $propietaris = Propietari::all();

        foreach ($propietaris as $propietari) {
            //cada propietario tendrá 2 animales
            Animal::factory()->count(2)->create(['id_persona' => $propietari->id]);
        }
    }
}
