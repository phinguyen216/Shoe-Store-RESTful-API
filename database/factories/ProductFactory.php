<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
{
    return [
        'name' => $this->faker->words(3, true),
        'brand_id' => \App\Models\Brand::inRandomOrder()->first()->id,
        'description' => $this->faker->sentence(),
        'price' => $this->faker->numberBetween(1000000, 5000000),
        'stock' => $this->faker->numberBetween(1, 50),
    ];
}
}
