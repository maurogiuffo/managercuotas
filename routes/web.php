<?php

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

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', 'ClienteController@index');

//Auth::routes();
Auth::routes(['register' => false]);

Route::resource('clientes', 'ClienteController');
Route::resource('recibos', 'ReciboController');
Route::resource('cuotas', 'CuotaController');

Route::get('/recibos/imprimir_recibo/{id}', 'ReciboController@imprimir_recibo')->name('recibos.imprimir_recibo');
Route::post('/recibos/imprimir_lista', 'ReciboController@imprimir_lista')->name('recibos.imprimir_lista');
Route::get('/recibos/createcuota/{id}', 'ReciboController@createcuota')->name('recibos.createcuota');
