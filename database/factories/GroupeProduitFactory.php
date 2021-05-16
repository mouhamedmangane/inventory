<?php

namespace Database\Factories;

use App\Models\GroupeProduit;
use Illuminate\Database\Eloquent\Factories\Factory;

class GroupeProduitFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = GroupeProduit::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'groupe_name' => $this->faker->unique()->name,
        ];
    }
}
