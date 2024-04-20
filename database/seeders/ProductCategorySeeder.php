<?php

namespace Database\Seeders;

use App\Domains\Product\Category\ProductCategoryModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductCategoryModel::factory()->count(50)->create();
    }
}
