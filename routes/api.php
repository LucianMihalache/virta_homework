<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(\App\Http\Controllers\CompanyController::class)
    ->prefix('/company')
    ->group(function () {
        Route::get('/', 'index');
        Route::get('/{company}', 'show');
        Route::post('/', 'store');
        Route::put('/{company}', 'put');
        Route::patch('/{company}', 'patch');
        Route::delete('/{company}', 'delete');
    });

Route::controller(\App\Http\Controllers\StationController::class)
    ->prefix('/station')
    ->group(function () {
        Route::get('/', 'index');
        Route::get('/{station}', 'show');
        Route::post('/', 'store');
        Route::put('/{station}', 'put');
        Route::patch('/{station}', 'patch');
        Route::delete('/{station}', 'delete');

        Route::post('/distance', 'stations');
    });
