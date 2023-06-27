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

Route::get('/register', function (){
    return view('auth.register'); // Não alterar essa linha !!1 Faz parte do Auth do Laravel. Só fazer alteração caso necessário.
});

/* Route::get('/register2', function (){
    return view('auth.registerFirst'); // Não alterar essa linha !!1 Faz parte do Auth do Laravel. Só fazer alteração caso necessário.
}); */
Route::get('/register2','App\Http\Controllers\UsuarioController@create');
Route::post('/register2-inc','App\Http\Controllers\UsuarioController@store');


Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']); 
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Rotas Controller painel de gravação de backups
Route::get('/painel','App\Http\Controllers\PainelController@index')->middleware(['auth']);
Route::get('/json','App\Http\Controllers\PainelController@indexJson')->middleware(['auth']);
Route::get('/grava/{id}/{id2}','App\Http\Controllers\PainelController@trocaStatus')->middleware(['auth']);
Route::get('/pausa/{id}/{id2}','App\Http\Controllers\PainelController@trocaStatus')->middleware(['auth']);
Route::get('/delbackup-soft/{id}','App\Http\Controllers\PainelController@destroy')->middleware(['auth']);
Route::post('/cadBackup','App\Http\Controllers\PainelController@store')->middleware(['auth']);

//Rotas Controler painel de cadastro de bancos de dados
Route::get('/painelBanco','App\Http\Controllers\bancoController@index')->middleware(['auth']);
Route::get('/jsonBanco','App\Http\Controllers\bancoController@indexJson')->middleware(['auth']);
Route::get('/cadBanco','App\Http\Controllers\bancoController@create')->middleware(['auth']);
Route::post('/cadBanco-inc','App\Http\Controllers\bancoController@store')->middleware(['auth']);
Route::get('/ediBanco-edt/{id}','App\Http\Controllers\bancoController@edit')->middleware(['auth']);
Route::post('/ediBanco-upd/{id}','App\Http\Controllers\bancoController@update')->middleware(['auth']);
Route::get('/delBanco-hard/{id}','App\Http\Controllers\bancoController@destroy')->middleware(['auth']);

//Route::get('/delBanco-soft/{id}','App\Http\Controllers\bancoController@softdelete');


Route::get('/teste','App\Http\Controllers\PainelController@teste');

