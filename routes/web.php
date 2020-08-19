<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/pruebas', 'PruebasController@index')->name('home');

Route::resource('personas', 'PersonaController');

Route::resource('documentos', 'DocumentoController');