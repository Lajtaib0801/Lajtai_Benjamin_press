<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category' => Category::all()->random()->id,
            'customer_name' => $this->faker->name(),
            'deadline' => $this->faker->date(),
            'quantity' => $this->faker->randomNumber(),
            'publisher_name' => $this->faker->name(),
        ];
    }
}
