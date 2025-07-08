<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductImage>
 */
class ProductImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'image' => 'https://placehold.co/600x400/FF5733/FFFFFF?text=Product+Image'
                . $this->faker->safeHexColor()
                . '/white?text='
                . urlencode($this->faker->word()),
            'product_id' => Product::inRandomOrder()->value('id'),
            'is_primary' => $this->faker->numberBetween(0, 1),
        ];
    }
}
