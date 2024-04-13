<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Biscuit>
 */
class BiscuitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name" => $this->faker->name(),
            "img" => $this->faker->image("public/storage/biscuits", fullPath: false),
            "ingredients" => $this->faker->text(),
            "calories" => $this->faker->text(),
        ];
    }
}
