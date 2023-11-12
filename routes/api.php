<?php

use App\Http\Controllers\Api\ApartmentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// tutte le rotte saranno sempre /api/PathRotta
Route::get("apartments/", [ApartmentController::class, "index"]);
Route::get("selected/{slug}", [ApartmentController::class, "show"]);
Route::get("coordinates", [ApartmentController::class,"getPositions"]);
Route::get("searchApartament/{query}", [ApartmentController::class,"filter"]);
Route::get("postPosition/", [ApartmentController::class,"postPosition"]);
Route::post("saveCostumerIpAdress", [ApartmentController::class, "saveCostumerIpAdress"]);