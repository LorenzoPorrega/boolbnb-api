<?php

use App\Http\Controllers\Admin\ApartmentController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\SponsorshipController;
use App\Http\Controllers\Api\MessageController as ApiMessageController;
use App\Models\Message;
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
    Route::get('/admin/profile', [ProfileController::class, 'edit'])->name('admin.profile.edit');
    Route::patch('/admin/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/admin/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
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

        // sezione sponsorship
        Route::get("/sponsorship/{slug}", [SponsorshipController::class, 'show'])->name('sponsorship.show');
        Route::resource('sponsorship', ApartmentController::class);
        Route::post('/sponsorship/sponsored', [SponsorshipController::class, "sponsored"])->name('sponsorship.sponsored');

        // sezione messaggi 
        Route::get("/messages/{slug}", [MessageController::class, 'show'])->name('message.show');

    });

Route::get('example', function () {
    return view('example');
});

Route::get('tomtom', function () {
    return view('tomtom');
});

Route::get("mails/new_message", function () {
    return new App\Mail\NewMessage();
});

require __DIR__.'/auth.php';

// Rotte create solo per test grafiche emails
// vedi rotta localhost:1:8000/mails/NewMessage
// Route::get("/emails/NewMessage", function() {
//     return new App\Mail\NewMessage();
// });
// // vedi rotta localhost:1:8000/mails/NewMessageReceived
// Route::get("/emails/NewMessageReceived", function() {
//     return new App\Mail\NewMessageReceived();
// });
