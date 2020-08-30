<?php

use Illuminate\Support\Facades\Route;

use App\Persona;
use App\Documento;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/pruebas', 'PruebasController@index')->name('home');

Route::resource('personas', 'PersonaController');

Route::resource('documentos', 'DocumentoController');

Route::resource('correos', 'CorreoController');

Route::get('demo', function (){
    $personas = Persona::with('documento')->get();
    return ['personas' => $personas];
});