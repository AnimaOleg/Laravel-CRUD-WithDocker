<?php

use Illuminate\Support\Facades\Route;
// Oleg - Importar Controlador
use App\Http\Controllers\PuertaController;

Route::get('/', function () {
    return view('welcome');
});

// Oleg - Añadida ruta del Controlador/Recurso Tasks
Route::resource('puertas', PuertaController::class);