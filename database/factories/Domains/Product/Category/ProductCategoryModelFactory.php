<?php

namespace Database\Factories\Domains\Product\Category;

use App\Domains\Product\Category\ProductCategoryModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductCategoryModelFactory extends Factory
{
    protected $model = ProductCategoryModel::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->name,
            'discount' => $this->faker->boolean(30) ? $this->faker->numberBetween(0, 100) : 0
        ];
    }
}
