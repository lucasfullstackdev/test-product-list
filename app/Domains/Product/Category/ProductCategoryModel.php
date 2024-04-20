<?php

namespace App\Domains\Product\Category;

use App\Domains\Product\ProductModel;
use App\Models\SoftDeletesModel;

class ProductCategoryModel extends SoftDeletesModel
{
    protected $table = 'products_category';

    protected $fillable = [
        'name',
        'discount',
    ];

    public function products()
    {
        return $this->hasMany(ProductModel::class, 'category_id');
    }
}
