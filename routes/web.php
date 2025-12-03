<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CitaController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\FacturaController;
use App\Http\Controllers\PacienteSPController;
use App\Http\Controllers\ConsultaSPController;
use App\Http\Controllers\ReportesController;
use App\Http\Controllers\BusquedasController;
use App\Http\Controllers\MensajesInteractivoController;
use App\Http\Controllers\TestTriggersController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('pacientes', PacienteController::class);
//Route::resource('medicos', MedicoController::class);
Route::resource('citas', CitaController::class);
Route::resource('consultas', ConsultaController::class);
Route::resource('facturas', FacturaController::class);

//Ejemplo 1 — CALL a SP que inserta
Route::get('/sp/paciente/create', [PacienteSPController::class, 'create'])->name('sp.paciente.create');
Route::post('/sp/paciente/store', [PacienteSPController::class, 'store'])->name('sp.paciente.store');

//Ejemplo 2 — CALL a SP SELECT que devuelve filas
Route::get('/sp/consultas/buscar', [ConsultaSPController::class,'form'])->name('sp.consultas.form');
Route::post('/sp/consultas/result', [ConsultaSPController::class,'buscar'])->name('sp.consultas.buscar');

//Ejemplo 3 — Llamar a una FUNCIÓN SQL que devuelve texto
Route::get('/fn/stock/{id}', function($id){
    $result = DB::select('SELECT fn_mensaje_stock(?) as msg', [$id]);
    $msg = $result[0]->msg ?? 'Sin respuesta';
    return view('fn.stock', compact('msg'));
});
//-------------------------------------------------------------------------------------------------------------
// Menú Principal
Route::get('/reportes', [ReportesController::class, 'index'])->name('reportes.index');

// Rutas individuales para cada vista
Route::get('/reportes/citas', [ReportesController::class, 'verCitas'])->name('reportes.citas');
Route::get('/reportes/historial', [ReportesController::class, 'verHistorial'])->name('reportes.historial');
Route::get('/reportes/medicos', [ReportesController::class, 'verMedicos'])->name('reportes.medicos');
Route::get('/reportes/facturas', [ReportesController::class, 'verFacturas'])->name('reportes.facturas');
Route::get('/reportes/recetas', [ReportesController::class, 'verRecetas'])->name('reportes.recetas');

// Rutas para Medico usando procedimientos almacenados
Route::resource('medicos', MedicoController::class);

// Rutas para búsquedas avanzadas usando procedimientos almacenados
Route::get('/busquedas', [BusquedasController::class, 'index'])->name('busquedas.index');
Route::get('/busquedas/citas', [BusquedasController::class, 'buscarCitas'])->name('busquedas.citas');
Route::get('/busquedas/historial', [BusquedasController::class, 'buscarHistorial'])->name('busquedas.historial');
Route::get('/busquedas/facturas', [BusquedasController::class, 'buscarFacturas'])->name('busquedas.facturas');

// Rutas para mensajes del sistema usando funciones SQL
Route::get('/probador-funciones', [MensajesInteractivoController::class, 'index'])->name('mensajes.interactivo');
Route::post('/probador/alergia', [MensajesInteractivoController::class, 'verificarAlergia'])->name('probador.alergia');
Route::post('/probador/stock', [MensajesInteractivoController::class, 'verificarStock'])->name('probador.stock');
Route::post('/probador/cobranza', [MensajesInteractivoController::class, 'verificarCobranza'])->name('probador.cobranza');

// Rutas para pruebas de Triggers
Route::get('/test-triggers', [TestTriggersController::class, 'index'])->name('triggers.index');
Route::post('/test-triggers/cita', [TestTriggersController::class, 'testCitaPasada'])->name('triggers.testCita');
Route::post('/test-triggers/factura', [TestTriggersController::class, 'testModificarFactura'])->name('triggers.testFactura');
Route::post('/test-triggers/historial', [TestTriggersController::class, 'testEliminarHistorial'])->name('triggers.testHistorial');
Route::post('/test-triggers/precio', [TestTriggersController::class, 'testAuditoriaPrecio'])->name('triggers.testPrecio');