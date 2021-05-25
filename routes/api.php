<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\UsersController;
use App\Http\Controllers\Api\v1\NotarialController;
use App\Http\Controllers\Api\v1\ObracheniasController;
use App\Http\Controllers\Api\v1\OrganiMinustController;
use App\Http\Controllers\Api\v1\PodrazdelController;
use App\Http\Controllers\Api\v1\PrinyatieMerController;
use App\Http\Controllers\Api\v1\TerritorialController;

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
Route::resource('notarial', NotarialController::class);
Route::resource('obrachenia', ObracheniasController::class);
Route::resource('organiMinust', OrganiMinustController::class);
Route::resource('podrazdel', PodrazdelController::class);
Route::resource('prinyatieMer', PrinyatieMerController::class);
Route::resource('territorialOrgan', TerritorialController::class);
