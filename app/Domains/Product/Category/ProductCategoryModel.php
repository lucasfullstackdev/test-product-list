<?php

namespace App\Domains\Product\Category;

use App\Domains\Product\ProductModel;
use App\Models\SoftDeletesModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductCategoryModel extends SoftDeletesModel
{
    use HasFactory;

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
