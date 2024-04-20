<?php

namespace App\Domains\Product;

use App\Domains\Product\Category\ProductCategoryModel;
use App\Models\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

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

    protected function categoryName(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->category->name
        );
    }

    protected function discountCalculated(): Attribute
    {
        return Attribute::make(
            get: function () {
                if ($this->category->discount === 0) {
                    return 0;
                }

                return number_format($this->price * ($this->category->discount / 100), 2);
            }
        );
    }

    protected function priceCalculated(): Attribute
    {
        return Attribute::make(
            get: fn () => number_format($this->price - $this->discountCalculated, 2)
        );
    }
}
