<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\VehiculesController;
use App\Http\Controllers\PlanetsController;
use App\Http\Controllers\PeopleController;

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


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/vehicles', [VehiculesController::class, 'getAll']);
Route::get('/vehicles/{id}', [VehiculesController::class, 'getById']);

Route::get('/people', [PeopleController::class, 'getAll']);
Route::get('/people/{id}', [PeopleController::class, 'getById']);

Route::get('/planets', [PlanetsController::class, 'getAll']);
Route::get('/planets/{id}', [PlanetsController::class, 'getById']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
