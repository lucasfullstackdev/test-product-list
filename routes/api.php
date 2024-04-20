<?php

use Illuminate\Support\Facades\Route;

Route::prefix('products')->group(function () {
  require __DIR__ . '/api/v1.0/products.php';
});
