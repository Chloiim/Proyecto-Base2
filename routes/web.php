<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CitaController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\FacturaController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('pacientes', PacienteController::class);
Route::resource('medicos', MedicoController::class);
Route::resource('citas', CitaController::class);
Route::resource('consultas', ConsultaController::class);
Route::resource('facturas', FacturaController::class);