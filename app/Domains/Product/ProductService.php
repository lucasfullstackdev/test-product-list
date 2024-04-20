<?php

namespace App\Domains\Product;

use App\Http\Requests\ListProducts;

class ProductService
{
  public function all(ListProducts $request)
  {
    return $this->prepToReturn(
      $this->getProducts($request)
    );
  }

  private function getProducts(ListProducts $request)
  {
    if (empty($request->all())) {
    }

    return ProductModel::all();
  }

  private function prepToReturn($products)
  {
    return $products->map(function ($product) {
      return [
        'sku' => $product->sku,
        'name' => $product->name,
        'category' => $product->categoryName,
        'price' => $product->priceCalculated,
      ];
    });
  }
}
