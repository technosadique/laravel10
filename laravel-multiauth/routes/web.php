<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
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

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
	Route::get('/logout', [DashboardController::class, 'logout']);
	Route::get('/create', [DashboardController::class, 'create'])->name('create');
	Route::get('/invite', [DashboardController::class, 'invite'])->name('invite');
	Route::get('/generate_pdf', [DashboardController::class, 'generate_pdf'])->name('generate_pdf');
	Route::post('/store', [DashboardController::class, 'store'])->name('store');
	Route::post('/store_invite', [DashboardController::class, 'store_invite'])->name('store_invite');
	
});

require __DIR__.'/auth.php';