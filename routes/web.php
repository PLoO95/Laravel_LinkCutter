<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controller\LinkController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();

Route::get('/', [App\Http\Controllers\LinkController::class, 'create']);
Route::get('/link', [App\Http\Controllers\LinkController::class, 'index']);
Route::get('/link/{id}', [App\Http\Controllers\LinkController::class, 'open']);
Route::post('/link', [App\Http\Controllers\LinkController::class, 'store']);
Route::delete('/link/{id}', [App\Http\Controllers\LinkController::class, 'delete']);
