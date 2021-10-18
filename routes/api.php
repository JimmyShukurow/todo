<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;

// $router = new Route();

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('items', App\Http\Controllers\ItemController::class);
