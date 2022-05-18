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
    Route::get('name/{name}', [RestaurantController::class, 'showName']);
    Route::get('distance/{latitude}/{longitude}', [RestaurantController::class, 'showDistance']);
    Route::get('index/{freetext}', [RestaurantController::class, 'index']);
});

Route::resource('city', CityController::class)->only(['show']);

Route::resource('cuisine', CuisineController::class)->only(['show']);
