<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Post;


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

Route::get('/', [Post::class,'index']);
Route::get('create', [Post::class,'create']);
Route::get('generate_pdf', [Post::class,'generate_pdf']);
Route::get('generate_csv', [Post::class,'generate_csv']);
Route::get('download_csv', [Post::class,'download_csv']);
Route::get('edit/{id}', [Post::class,'edit']);
Route::get('delete/{id}', [Post::class,'destroy']);
Route::post('update',[Post::class,'update']);
Route::post('store', [Post::class,'store']);