<?php

use App\Http\Controllers\Api\OptionController;
use App\Http\Controllers\Api\PropertyController;
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

Route::prefix('biens')->controller(PropertyController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/{property}', 'show');
});

Route::prefix('options')->controller(OptionController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/{option}', 'show');
    Route::post('/create', 'store');
    Route::put('/{option}', 'update');
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
