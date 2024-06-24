<?php

namespace Database\Factories;

use App\Models\Objet;
use Illuminate\Database\Eloquent\Factories\Factory;

class ObjetFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Objet::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nom' => $this->faker->jobTitle,
        ];
    }
}
