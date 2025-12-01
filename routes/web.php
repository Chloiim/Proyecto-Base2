<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CitaController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\FacturaController;
use App\Http\Controllers\PacienteSPController;
use App\Http\Controllers\ConsultaSPController;

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

//Ejemplo 1 — CALL a SP que inserta
Route::get('/sp/paciente/create', [PacienteSPController::class, 'create'])->name('sp.paciente.create');
Route::post('/sp/paciente/store', [PacienteSPController::class, 'store'])->name('sp.paciente.store');

//Ejemplo 2 — CALL a SP SELECT que devuelve filas
Route::get('/sp/consultas/buscar', [ConsultaSPController::class,'form'])->name('sp.consultas.form');
Route::post('/sp/consultas/result', [ConsultaSPController::class,'buscar'])->name('sp.consultas.buscar');
