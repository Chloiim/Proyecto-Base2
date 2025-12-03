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
use App\Http\Controllers\AuditoriaController;

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

// Rutas para auditoría mediante triggers de medicamentos y pacientes
// Vista principal (Tabla de Auditoría)
Route::get('/auditoria-sistema', [AuditoriaController::class, 'index'])->name('auditoria.index');

// Rutas para GESTIONAR PACIENTES (Esto disparará los triggers)
Route::get('/auditoria/paciente/crear', [AuditoriaController::class, 'create'])->name('auditoria.create');
Route::post('/auditoria/paciente/guardar', [AuditoriaController::class, 'store'])->name('auditoria.store');
Route::get('/auditoria/paciente/editar/{id}', [AuditoriaController::class, 'edit'])->name('auditoria.edit');
Route::put('/auditoria/paciente/actualizar/{id}', [AuditoriaController::class, 'update'])->name('auditoria.update');
Route::get('/auditoria/paciente/eliminar', [AuditoriaController::class, 'deleteList'])->name('auditoria.deleteList'); // Listado para elegir a quién borrar
Route::delete('/auditoria/paciente/destruir/{id}', [AuditoriaController::class, 'destroy'])->name('auditoria.destroy');

//rutas medicamento (Para los nuevos Triggers)
Route::get('/auditoria/med/crear', [AuditoriaController::class, 'createMed'])->name('auditoria.createMed');
Route::post('/auditoria/med/guardar', [AuditoriaController::class, 'storeMed'])->name('auditoria.storeMed');
Route::get('/auditoria/med/editar/{id}', [AuditoriaController::class, 'editMed'])->name('auditoria.editMed');
Route::put('/auditoria/med/actualizar/{id}', [AuditoriaController::class, 'updateMed'])->name('auditoria.updateMed');
Route::get('/auditoria/med/eliminar', [AuditoriaController::class, 'deleteListMed'])->name('auditoria.deleteListMed');
Route::delete('/auditoria/med/destruir/{id}', [AuditoriaController::class, 'destroyMed'])->name('auditoria.destroyMed');