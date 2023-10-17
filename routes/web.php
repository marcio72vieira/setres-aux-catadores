<?php


use App\Http\Controllers\MainController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AssociadoController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ResiduoController;
use App\Http\Controllers\Admin\CompanhiaController;
use App\Http\Controllers\Admin\BairroController;
use App\Http\Controllers\Admin\MunicipioController;
use App\Http\Controllers\Admin\PontocoletaController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
    Route::resource('dashboard', DashboardController::class)->middleware(['auth']);
    Route::get('ajaxgetCompanhiasMunicipio',[DashboardController::class,'ajaxgetCompanhiasMunicipio'])->name('ajaxgetCompanhiasMunicipio');    // Rota Ajax para tabela Dados das Companhias do Município
    Route::resource('residuo', ResiduoController::class)->middleware(['auth']);
    Route::resource('bairro', BairroController::class)->middleware(['auth']);
    Route::resource('municipio', MunicipioController::class)->middleware(['auth']);
    Route::resource('companhia', CompanhiaController::class)->middleware(['auth']);
    Route::resource('associado', AssociadoController::class)->middleware(['auth']);
    Route::get('ajaxgetAssociados',[AssociadoController::class,'ajaxgetAssociados'])->name('ajaxgetAssociados');    // Rota Ajax para datatable com paginação dinâmica
    Route::resource('pontocoleta', PontocoletaController::class)->middleware(['auth']);
    Route::resource('user', UserController::class)->middleware(['auth']);

    Route::put('/user/{id}/updateprofile', [UserController::class, 'updateprofile'])->name('user.updateprofile')->middleware(['auth']);
});


// Retrato
Route::get('admin/associado/{id}/retrato', [AssociadoController::class, 'retrato'])->name('admin.associado.retrato')->middleware(['auth']);
Route::match(['get', 'post'], 'ajax-canvas-upload', [AssociadoController::class, 'salvaretrato']);



// RELATÓRIOS RESÍDUOS
Route::get('admin/residuo/pdf/relatorioresiduo', [ResiduoController::class, 'relatorioresiduo'])->name('admin.residuo.relatorio')->middleware(['auth']);
Route::get('admin/residuo/excel/relatorioresiduo', [ResiduoController::class, 'relatorioresiduoexcel'])->name('admin.residuo.relatorioexcel')->middleware(['auth']);
Route::get('admin/residuo/csv/relatorioresiduo', [ResiduoController::class, 'relatorioresiduocsv'])->name('admin.residuo.relatoriocsv')->middleware(['auth']);

// RELATÓRIOS BAIRROS
Route::get('admin/bairro/pdf/relatoriobairro', [BairroController::class, 'relatoriobairro'])->name('admin.bairro.relatorio')->middleware(['auth']);
Route::get('admin/bairro/excel/relatoriobairro', [BairroController::class, 'relatoriobairroexcel'])->name('admin.bairro.relatorioexcel')->middleware(['auth']);
Route::get('admin/bairro/csv/relatoriobairro', [BairroController::class, 'relatoriobairrocsv'])->name('admin.bairro.relatoriocsv')->middleware(['auth']);

// RELATÓRIOS MUNICÍPIOS
Route::get('admin/municipio/pdf/{id}/relatorioassociadosmunicipio', [MunicipioController::class, 'relatorioassociadosmunicipio'])->name('admin.municipio.relatorioassociadosmunicipio')->middleware(['auth']);
Route::get('admin/municipio/pdf/relatoriomunicipio', [MunicipioController::class, 'relatoriomunicipio'])->name('admin.municipio.relatorio')->middleware(['auth']);
Route::get('admin/municipio/excel/relatoriomunicipio', [MunicipioController::class, 'relatoriomunicipioexcel'])->name('admin.municipio.relatorioexcel')->middleware(['auth']);
Route::get('admin/municipio/csv/relatoriomunicipio', [MunicipioController::class, 'relatoriomunicipiocsv'])->name('admin.municipio.relatoriocsv')->middleware(['auth']);

// RELATÓRIOS COMPANHIAS
Route::get('admin/companhia/pdf/relatoriocompanhia', [CompanhiaController::class, 'relatoriocompanhia'])->name('admin.companhia.relatorio')->middleware(['auth']);
Route::get('admin/companhia/excel/relatoriocompanhia', [CompanhiaController::class, 'relatoriocompanhiaexcel'])->name('admin.companhia.relatorioexcel')->middleware(['auth']);
Route::get('admin/companhia/csv/relatoriocompanhia', [CompanhiaController::class, 'relatoriocompanhiacsv'])->name('admin.companhia.relatoriocsv')->middleware(['auth']);
Route::get('admin/companhia/pdf/{id}/ficha', [CompanhiaController::class, 'ficha'])->name('admin.companhia.ficha')->middleware(['auth']);


// RELATÓRIOS PONTOSCOLETA
Route::get('admin/pontocoleta/pdf/relatoriopontocoleta', [PontocoletaController::class, 'relatoriopontocoleta'])->name('admin.pontocoleta.relatorio')->middleware(['auth']);
Route::get('admin/pontocoleta/excel/relatoriopontocoleta', [PontocoletaController::class, 'relatoriopontocoletaexcel'])->name('admin.pontocoleta.relatorioexcel')->middleware(['auth']);
Route::get('admin/pontocoleta/csv/relatoriopontocoleta', [PontocoletaController::class, 'relatoriopontocoletacsv'])->name('admin.pontocoleta.relatoriocsv')->middleware(['auth']);


// RELATÓRIOS ASSOCIADOS
Route::get('admin/associado/pdf/relatorioassociado', [AssociadoController::class, 'relatorioassociado'])->name('admin.associado.relatorio')->middleware(['auth']);
Route::get('admin/associado/excel/relatorioassociado', [AssociadoController::class, 'relatorioassociadoexcel'])->name('admin.associado.relatorioexcel')->middleware(['auth']);
Route::get('admin/associado/csv/relatorioassociado', [AssociadoController::class, 'relatorioassociadocsv'])->name('admin.associado.relatoriocsv')->middleware(['auth']);
Route::get('admin/associado/excel/relatorioassociadodois', [AssociadoController::class, 'relatorioassociadoexceldois'])->name('admin.associado.relatorioexceldois')->middleware(['auth']);
Route::get('admin/associado/csv/relatorioassociadocsvtable', [AssociadoController::class, 'relatorioassociadocsvtable'])->name('admin.associado.relatoriocsvtable')->middleware(['auth']);
Route::get('admin/associado/pdf/{id}/fichaassociado', [AssociadoController::class, 'ficha'])->name('admin.associado.ficha')->middleware(['auth']);


// ROTA PARA CONSULTAR ASSOCIADO PELO QRCODE
Route::get('admin/associado/consultaqr/{idqrcode}', [AssociadoController::class, 'consultaAssociadoIdqrcode'])->name('admin.associado.consultaAssociadoIdqrcode');


// BAIXANDO ARQUIVOS
Route::get('admin/associado/donwloadfile/{id}/baixararquivos', [AssociadoController::class, 'baixararquivos'])->name('admin.associado.baixararquivos')->middleware(['auth']);
Route::get('admin/associado/downloadfolder/zipdownload', [AssociadoController::class, 'zipdownload'])->name('admin.associado.zipdownload')->middleware(['auth']);



// RELATÓRIOS DASHBOARD
Route::get('admin/dashboard/pdf/relatoriodashboard', [DashboardController::class, 'relatoriodashboard'])->name('admin.dashboard.relatoriodashboard')->middleware(['auth']);
Route::get('admin/dashboard/pdf/{id}/relatoriomunicipioindividual', [DashboardController::class, 'relatoriomunicipioindividual'])->name('admin.dashboard.relatoriomunicipioindividual')->middleware(['auth']);
//Route::get('admin/dashboard/pdf/{id?}/relatoriomunicipiogeral', [DashboardController::class, 'relatoriomunicipiogeral'])->name('admin.dashboard.relatoriomunicipiogeral')->middleware(['auth']);

