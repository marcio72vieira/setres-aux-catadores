<?php


use App\Http\Controllers\MainController;
use App\Http\Controllers\Admin\AssociadoController;
use App\Http\Controllers\Admin\ResiduoController;
use App\Http\Controllers\Admin\CompanhiaController;
use App\Http\Controllers\Admin\BairroController;
use App\Http\Controllers\Admin\PontocoletaController;
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
    //return view('welcome');
    return redirect()->route('admin.residuo.index');
});

Route::get('/front/login', [MainController::class, 'login'])->name('front.login');
Route::post('/front/check', [MainController::class, 'check'])->name('front.check');
Route::get('/front/logout', [MainController::class, 'logout'])->name('front.logout');


Route::prefix('admin')->name('admin.')->group(function() {
    Route::resource('residuo', ResiduoController::class);
    Route::resource('companhia', CompanhiaController::class);
    Route::resource('bairro', BairroController::class);
    Route::resource('associado', AssociadoController::class);
    Route::resource('pontocoleta', PontocoletaController::class);
});

