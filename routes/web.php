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
    return redirect('/login');
});

Route::get('/register', function () {
    return view('auth.register');
});

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']); 
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Rotas Controller painel de gravação de backups
Route::get('/painel','App\Http\Controllers\PainelController@index');
Route::get('/json','App\Http\Controllers\PainelController@indexJson');
Route::get('/grava/{id}/{id2}','App\Http\Controllers\PainelController@trocaStatus');
Route::get('/pausa/{id}/{id2}','App\Http\Controllers\PainelController@trocaStatus');
Route::get('/softDelete/{id}/{id2}','App\Http\Controllers\PainelController@trocaStatus');
Route::post('/select','App\Http\Controllers\PainelController@BackupList');

//Rotas Controler painel de cadastro de bancos de dados
Route::get('/painelBanco','App\Http\Controllers\bancoController@index');
Route::get('/jsonBanco','App\Http\Controllers\bancoController@indexJson');
Route::get('/cadBanco','App\Http\Controllers\bancoController@create');
Route::post('/cadBanco-inc','App\Http\Controllers\bancoController@store');
Route::get('/ediBanco-edt/{id}','App\Http\Controllers\bancoController@edit');
Route::post('/ediBanco-upd/{id}','App\Http\Controllers\bancoController@update');
Route::get('/delBanco-hard/{id}','App\Http\Controllers\bancoController@destroy');
//Route::get('/delBanco-soft/{id}','App\Http\Controllers\bancoController@softdelete');


Route::get('/teste','App\Http\Controllers\PainelController@teste');

