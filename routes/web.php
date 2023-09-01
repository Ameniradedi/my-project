<?php

use Illuminate\Support\Facades\Route;


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

Route::get('/', function () {
  return view('index');
});

Route::get('/login', function () {
  return view('layouts.app');
});


"Auth"::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/client', App\Http\Controllers\ClientController::class);
Route::resource('/engin', App\Http\Controllers\EnginController::class);
Route::resource('/terrain', App\Http\Controllers\TerrainController::class);
Route::resource('/rendez vous', App\Http\Controllers\Rendez_vousController::class);
Route::resource('/produit agricole', App\Http\Controllers\Produit_agricoleController::class);
Route::resource('/bureau_d_etude', App\Http\Controllers\Bureau_d_etudeController::class);


