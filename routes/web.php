<?php

use App\Http\Controllers\ActorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\MoviesController;
use App\Http\Controllers\TvController;

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



Route::get('/', [IndexController::class, 'index']);

Route::get('/movies/{id}', [MoviesController::class, 'show']);
Route::get('/movies', [MoviesController::class, 'index']);
Route::get('/tv/{id}', [TvController::class, 'show']);
Route::get('/tv', [TvController::class, 'index']);
Route::get('/actors/{id}', [ActorController::class, 'show']);
Route::get('/actors', [ActorController::class, 'index']);
