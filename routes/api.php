<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CuisineController;
use App\Http\Controllers\RestaurantController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'restaurant'], function () {
    Route::get('name/{name}', [RestaurantController::class, 'show']);
    Route::get('distance/{latitude}/{longitude}', [RestaurantController::class, 'showDistance']);
    Route::get('freetext/{freetext}', [RestaurantController::class, 'index']);
});

Route::get('city/{name}', [CityController::class, 'show']);

Route::get('cuisine/{name}', [CuisineController::class, 'show']);
