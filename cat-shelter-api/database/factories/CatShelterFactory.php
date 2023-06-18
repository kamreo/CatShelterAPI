<?php

namespace Database\Factories;

use App\Models\CatShelter;
use Illuminate\Database\Eloquent\Factories\Factory;

class CatShelterFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CatShelter::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->company,
            'address' => $this->faker->address,
        ];
    }
}
