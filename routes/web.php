<?php

use App\Http\Controllers\Admin\ResiduoController;
use App\Http\Controllers\Admin\CompanhiaController;
use App\Http\Controllers\Admin\BairroController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->name('admin.')->group(function() {
    Route::resource('residuo', ResiduoController::class);
    Route::resource('companhia', CompanhiaController::class);
    Route::resource('bairro', BairroController::class);
});

