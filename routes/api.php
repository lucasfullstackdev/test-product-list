<?php

use Illuminate\Support\Facades\Route;

Route::prefix('products')->group(fn () => require __DIR__ . '/api/v1.0/products.php');
