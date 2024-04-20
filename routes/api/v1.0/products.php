<?php

use App\Domains\Product\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('', [ProductController::class, 'all']);
Route::get('{id}', [ProductController::class, 'find']);
