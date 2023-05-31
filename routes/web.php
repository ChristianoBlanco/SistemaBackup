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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/painel','App\Http\Controllers\PainelController@index');
Route::get('/json','App\Http\Controllers\PainelController@indexJson');

Route::post('/select','App\Http\Controllers\PainelController@BackupList');


Route::get('/teste','App\Http\Controllers\PainelController@teste');

