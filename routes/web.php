<?php

use App\Http\Controllers\Admin\OptionController;
use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PropertyController as ControllersPropertyController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// $idRegx = '[0-9]+';
// $slugRegx = '[0-9a-z\-]+';

Route::get('/', [HomeController::class, 'index']);

Route::prefix('biens')->name('biens.')->controller(ControllersPropertyController::class)->group(function () {
    $idRegx = '[0-9]+';
    $slugRegx = '[0-9a-z\-]+';

    Route::get('/biens', 'index')->name('index');
    Route::get('/biens/{slug}-{property}', 'show')->name('show')->where([
        'property' => $idRegx,
        'slug' => $slugRegx,
    ]);
    Route::post('/bien/{property}/contact', 'contact')->name('contact')->where([
        'property' => $idRegx,
    ]);
});

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'doLogin']);
Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');

 
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::resource('property', PropertyController::class)->except('show');
    Route::resource('option', OptionController::class)->except('show');
});
