<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Etudiant;
use App\Models\Ville;


class EtudiantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "nom" => $this->faker->name(),
            "adresse" => $this->faker->streetAddress(),
            "phone" => $this->faker->phoneNumber(),
            "email" => $this->faker->email(),
            "date_naissance" => $this->faker->dateTimeBetween("-100 years", "now"),
            "ville_id" => Ville::all()->random()->id
        ];
    }
}
