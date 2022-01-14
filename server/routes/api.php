<?php

use App\Http\Controllers\LandController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('lands', [LandController::class, 'index']);
Route::get('lands/{id}', [LandController::class, 'detail']);
Route::post('lands', [LandController::class, 'create']);
Route::post('lands/{id}', [LandController::class, 'edit']);
Route::delete('lands/{id}', [LandController::class, 'delete']);