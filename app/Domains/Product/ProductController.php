<?php

namespace App\Domains\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\ListProducts;

class ProductController extends Controller
{

  public function __construct(private ProductService $productService)
  {
  }

  public function all(ListProducts $request)
  {
    return Response()->json($this->productService->all($request));
  }
}
