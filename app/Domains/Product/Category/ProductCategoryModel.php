<?php

namespace App\Domains\Product\Category;

use App\Domains\Product\ProductModel;
use Illuminate\Database\Eloquent\Model;

class ProductCategoryModel extends Model
{
    protected $table = 'products_category';

    protected $fillable = [
        'name',
    ];

    public function products()
    {
        return $this->hasMany(ProductModel::class, 'category_id');
    }
}