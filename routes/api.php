<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\UsersController;
use App\Http\Controllers\Api\v1\NotarialController;
use App\Http\Controllers\Api\v1\ReferencesController;
use App\Http\Controllers\Api\v1\JusticeController;
use App\Http\Controllers\Api\v1\PodrazdelController;
use App\Http\Controllers\Api\v1\MeasuresController;
use App\Http\Controllers\Api\v1\TerritorialController;
use App\Http\Controllers\Api\v1\PodrazdelListController;
use App\Http\Controllers\Api\v1\UserRef;
use App\Http\Controllers\Api\v1\UserRefController;
use GuzzleHttp\Middleware;

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

Route::resource('user', UsersController::class);
Route::post('/register', [UsersController::class,"store"]);
Route::post('/login', [UsersController::class,"login"]);

// Route::resource('notarial', NotarialController::class);
// Route::resource('territorial', TerritorialController::class);
// Route::resource('justice', JusticeController::class);

Route::resource('userref', UserRef::class);
Route::resource('references', ReferencesController::class);

Route::get('export', [ReferencesController::class,"referencesExport"]);

Route::resource('podrazdel', PodrazdelController::class);
Route::resource('measures', MeasuresController::class);

Route::resource('podrazdelList', PodrazdelListController::class);
