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
        'discount'
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

    protected function discountPercentage(): Attribute
    {
        return Attribute::make(
            get: fn () => isset($this->discountValue) ? "{$this->discountValue}%" : null
        );
    }

    /**
     * The discount that prevails must be that of the product, by category it is a generalized discount
     * while the product discount is something more specific.
     * 
     * Of course, this can be revised, but it was necessary to implement a flow
     */
    protected function discountValue(): Attribute
    {
        return Attribute::make(
            get: function () {
                if (!empty($this->discount)) {
                    return $this->discount;
                }

                if (!empty($this->category->discount)) {
                    return $this->category->discount;
                }

                return null;
            }
        );
    }

    protected function discountCalculated(): Attribute
    {
        return Attribute::make(
            get: function () {
                if (empty($this->discountValue)) {
                    return 0;
                }

                return number_format($this->price * ($this->discountValue / 100), 2);
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
