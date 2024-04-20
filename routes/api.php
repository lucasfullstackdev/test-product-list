<?php

use Illuminate\Support\Facades\Route;

Route::prefix('v1.0')->group(function () {
  Route::prefix('products')->group(function () {
    require __DIR__ . '/api/v1.0/products.php';
  });
});
