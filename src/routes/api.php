<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;


Route::apiResource('posts', PostController::class);

Route::apiResource('categories', CategoryController::class);

Route::apiResource('users', UserController::class);
