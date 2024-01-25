<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Enums\Product\ProductStatusEnum;
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
            'name' => [
                'ar' => fake()->sentence,
                'en' => fake()->sentence,
            ],
            'slug' => [
                'ar' => Str::slug(fake()->slug),
                'en' => Str::slug(fake()->slug),
            ],
            'description' => [
                'ar' => fake()->paragraph,
                'en' => fake()->paragraph,
            ],
            'price' => fake()->randomFloat(2, 10, 1000),
            'status' => ProductStatusEnum::random()->value,
        ];
    }
}
