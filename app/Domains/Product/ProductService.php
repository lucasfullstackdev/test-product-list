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
    // Adding the condition to filter by category
    if (!empty($request->category)) {
      return ProductModel::whereHas('category', function ($query) use ($request) {
        $query->where('name', 'like', "%$request->category%");
      })->paginate();
    }

    // If you do not have other filters, return all products
    return ProductModel::paginate();
  }

  /**
   * Prepares data to be returned
   */
  private function prepToReturn($products)
  {
    $products->setCollection(
      $products->getCollection()->map(fn ($product) => $this->prepProductInfo($product))
    );

    return $products;
  }

  private function prepProductInfo($product)
  {
    return [
      'sku' => $product->sku,
      'name' => $product->name,
      'category' => $product->categoryName,
      'price' => [
        'original' => $product->price,
        'final' => $product->priceCalculated,
        'discount_percentage' => $product->discountPercentage,
        'currency' => 'USD'
      ]
    ];
  }
}
