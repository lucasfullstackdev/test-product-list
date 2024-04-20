<?php

namespace App\Domains\Product;

use App\Domains\Product\Category\ProductCategoryModel;
use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'sku',
        'name',
        'category_id',
        'price',
    ];

    public function category()
    {
        return $this->belongsTo(ProductCategoryModel::class, 'category_id');
    }
}