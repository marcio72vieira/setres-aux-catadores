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
    return redirect()->route('admin.residuo.index');
});

Route::get('/front/login', [MainController::class, 'login'])->name('front.login');
Route::post('/front/check', [MainController::class, 'check'])->name('front.check');
Route::get('/front/logout', [MainController::class, 'logout'])->name('front.logout');


Route::prefix('admin')->name('admin.')->group(function() {
    Route::resource('residuo', ResiduoController::class)->middleware(['auth']);
    Route::resource('companhia', CompanhiaController::class)->middleware(['auth']);
    Route::resource('bairro', BairroController::class)->middleware(['auth']);
    Route::resource('associado', AssociadoController::class)->middleware(['auth']);
    Route::resource('pontocoleta', PontocoletaController::class)->middleware(['auth']);
});

// Retrato
Route::get('admin/associado/{id}/retrato', [AssociadoController::class, 'retrato'])->name('admin.associado.retrato')->middleware(['auth']);
Route::match(['get', 'post'], 'ajax-canvas-upload', [AssociadoController::class, 'salvaretrato']);



// RELATÓRIOS RESÍDUOS
// Relatórios PDF
Route::get('admin/residuo/pdf/relatorioresiduo', [ResiduoController::class, 'relatorioresiduo'])->name('admin.residuo.relatorio')->middleware(['auth']);
Route::get('admin/residuo/excel/relatorioresiduo', [ResiduoController::class, 'relatorioresiduoexcel'])->name('admin.residuo.relatorioexcel')->middleware(['auth']);
Route::get('admin/residuo/csv/relatorioresiduo', [ResiduoController::class, 'relatorioresiduocsv'])->name('admin.residuo.relatoriocsv')->middleware(['auth']);

