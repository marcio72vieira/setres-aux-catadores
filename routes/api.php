<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\AssociadoController;
use App\Models\Associado;

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


// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

/*
Route::name('api.')->group(function() {
    Route::apiResource('associado', AssociadoController::class);
});
*/

Route::post('auth/login', [AuthController::class, 'login']);
Route::post('auth/me', [AuthController::class, 'me'])->middleware(['apiJwt']);
Route::post('auth/logout', [AuthController::class, 'logout'])->middleware(['apiJwt']);


Route::get('associados', [AssociadoController::class, 'index']);
Route::get('associado/{id}', [AssociadoController::class, 'show'])->middleware(['apiJwt']);
//Route::get('associado/{qrcode}/dados', [AssociadoController::class, 'exibeassociado'])->middleware(['apiJwt']);
Route::get('associado/{qrcode}/eventos', [AssociadoController::class, 'exibeassociado']);


