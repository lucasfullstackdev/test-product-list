<?php

namespace Database\Factories\Domains\Product;

use App\Domains\Product\Category\ProductCategoryModel;
use App\Domains\Product\ProductModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductModelFactory extends Factory
{
    protected $model = ProductModel::class;

    public function definition(): array
    {
        return [
            'sku' => $this->faker->unique()->uuid,
            'name' => $this->faker->unique()->name,
            'price' => $this->faker->randomFloat(2, 0, 10000),
            'category_id' => ProductCategoryModel::query()->inRandomOrder()->first()->id, // Category_id must by one of the existing category
            'discount' => $this->faker->boolean(70) ? $this->faker->numberBetween(0, 100) : 0
        ];
    }
}
