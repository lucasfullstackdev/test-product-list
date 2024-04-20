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
      'price' => $product->priceCalculated,
    ];
  }
}
