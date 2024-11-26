<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;

// Ruta para obtener los productos del menú
Route::get('/menu', [MenuController::class, 'getMenu']);
// Ruta para crear un pedido
Route::post('/orders', [OrderController::class, 'createOrder']);

Route::get('/test', function () {
    return 'API is working';
});
