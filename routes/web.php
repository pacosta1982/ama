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

Route::get('/', function () {
    return view('welcome');
});

Route::post('/filtros', 'HomeController@index')->name('postfiltro');
Route::get('/filtros', 'HomeController@index')->name('getfiltro');

Route::get('miembros/ajax/{cedula?}', 'HomeController@cedulamiembro');

Route::post('/formulario', 'HomeController@store');
