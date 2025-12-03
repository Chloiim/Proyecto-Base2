<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;

class TestTriggersController extends Controller
{
    public function index()
    {
        // Recuperamos los registros de auditoría para ver el Trigger 4 en acción
        $auditoria = DB::table('Auditoria_Cambios')->orderByDesc('fecha')->get();
        return view('triggers.test', compact('auditoria'));
    }

    // PRUEBA TRIGGER 1: Intentar insertar cita en el pasado
    public function testCitaPasada()
    {
        try {
            DB::table('Cita')->insert([
                'fechaCit' => '2000-01-01', // Fecha en el pasado
                'horaCit' => '10:00:00',
                'estadoCit' => 'pendiente',
                'idPacient' => 1, // Asegúrate que exista el paciente 1
                'idMedic' => 1    // Asegúrate que exista el médico 1
            ]);
            return back()->with('success', 'Cita creada (Esto no debería pasar si el trigger funciona).');
        } catch (QueryException $e) {
            // Capturamos el mensaje de error del Trigger
            return back()->with('error_trigger', 'TRIGGER ACTIVADO: ' . $e->getMessage());
        }
    }

    // PRUEBA TRIGGER 2: Intentar modificar factura pagada
    public function testModificarFactura()
    {
        // Buscamos o creamos una factura pagada para la prueba
        $idFac = DB::table('Factura')->where('estadoPago', 'pagado')->value('idFac');
        
        if (!$idFac) {
            return back()->with('info', 'No hay facturas pagadas para probar. Crea una primero.');
        }

        try {
            DB::table('Factura')->where('idFac', $idFac)->update(['montoTotal' => 99999.99]);
            return back()->with('success', 'Factura modificada (Error: El trigger falló).');
        } catch (QueryException $e) {
            return back()->with('error_trigger', 'TRIGGER ACTIVADO: ' . $e->getMessage());
        }
    }

    // PRUEBA TRIGGER 3: Intentar eliminar historial
    public function testEliminarHistorial()
    {
        // Tomamos un historial cualquiera
        $idHist = DB::table('HistoriaClinica')->value('idHist');

        if (!$idHist) {
            return back()->with('info', 'No hay historias clínicas para borrar.');
        }

        try {
            DB::table('HistoriaClinica')->where('idHist', $idHist)->delete();
            return back()->with('success', 'Historial eliminado (Error: El trigger falló).');
        } catch (QueryException $e) {
            return back()->with('error_trigger', 'TRIGGER ACTIVADO: ' . $e->getMessage());
        }
    }

    // PRUEBA TRIGGER 4: Cambiar precio (Debe guardar en auditoría)
    public function testAuditoriaPrecio()
    {
        // Tomamos el primer medicamento
        $med = DB::table('Medicamento')->first();
        
        // Le sumamos 1 sol al precio
        $nuevoPrecio = $med->precioUnitario + 1;

        DB::table('Medicamento')->where('idMedicament', $med->idMedicament)
            ->update(['precioUnitario' => $nuevoPrecio]);

        return back()->with('success', 'Precio actualizado. Revisa la tabla de abajo, el Trigger debió registrar esto automáticamente.');
    }
}
