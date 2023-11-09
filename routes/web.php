<?php

use App\Http\Controllers\Admin\ApartmentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


/* Route::get("/apartments", [ApartmentController::class, "index"])->name("apartments.index"); */

// Routes group for ADMIN
// admin.apartments.index, admin.apartments.show, admin.apartments.create, admin.apartments.edit, admin.apartments.update & admin.apartments.delete
Route::middleware('auth')
    ->prefix('admin')
    ->name('admin.')
    ->group(function(){
        Route::get('/apartments/{$slug}', [ApartmentController::class, 'show'])->name('apartments.show');
        Route::get('/apartments/{$slug}/edit', [ApartmentController::class, 'edit'])->name('apartments.edit');
        Route::resource('apartments', ApartmentController::class);
});
Route::get('example', function () {
    return view('example');
});
Route::get('tomtom', function () {
    return view('tomtom');
});
require __DIR__.'/auth.php';
