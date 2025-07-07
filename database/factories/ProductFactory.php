<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
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
            'name' => $this->faker->name(),
            'slug' => $this->faker->unique()->slug(),
            'status' => $this->faker->numberBetween(0, 1),
            'price' => $this->faker->numberBetween(100, 1000),
            'is_featured' => $this->faker->numberBetween(0, 1),
            'stock_no' => $this->faker->unique()->slug(),
            'description' => $this->faker->text(),
            'category_id' => Category::inRandomOrder()->value('id')
        ];
    }
}
