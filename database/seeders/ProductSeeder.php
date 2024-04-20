<?php

namespace Database\Seeders;

use App\Domains\Product\ProductModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductModel::factory()->count(1000)->create();
    }
}
