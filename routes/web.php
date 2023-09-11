<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlaceController;

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
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::prefix('place')->group(function () {
    Route::get('', [PlaceController::class, 'index'])->name('place.index');
    Route::get('create', [PlaceController::class, 'create'])->name('place.create');
    Route::post('create', [PlaceController::class, 'store'])->name('place.store');
    Route::get('{id}', [PlaceController::class, 'show'])->name('place.show');


    Route::get('{id}/delete', [PlaceController::class, 'delete'])->name('place.delete');
    Route::post('{id}/delete', [PlaceController::class, 'destroy'])->name('place.destroy');
})->middleware(['auth', 'verified']);