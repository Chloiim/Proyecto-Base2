<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BusquedasController extends Controller
{
    // Vista principal donde estarán los 3 formularios
    public function index()
    {
        // Cargamos especialidades para llenar el select del formulario 1
        $especialidades = DB::table('Medico')->select('especialidadMedic')->distinct()->get();
        
        return view('busquedas.index', compact('especialidades'));
    }

    // 1. Buscar Citas
    public function buscarCitas(Request $request)
    {
        $fechaInicio = $request->input('fecha_inicio');
        $fechaFin = $request->input('fecha_fin');
        $especialidad = $request->input('especialidad');

        // Llamada al SP con 3 parámetros
        $resultados = DB::select('CALL sp_BuscarCitasFiltro(?, ?, ?)', [
            $fechaInicio, 
            $fechaFin, 
            $especialidad
        ]);

        return view('busquedas.resultados_citas', compact('resultados'));
    }

    // 2. Buscar Historial
    public function buscarHistorial(Request $request)
    {
        $dni = $request->input('dni');
        $medico = $request->input('medico') ?? ''; // Si está vacío mandamos string vacío

        // Llamada al SP con 2 parámetros
        $resultados = DB::select('CALL sp_HistorialPacienteMedico(?, ?)', [
            $dni, 
            $medico
        ]);

        return view('busquedas.resultados_historial', compact('resultados'));
    }

    // 3. Buscar Facturas
    public function buscarFacturas(Request $request)
    {
        $estado = $request->input('estado');
        $monto = $request->input('monto');

        // Llamada al SP con 2 parámetros
        $resultados = DB::select('CALL sp_FacturasPorEstadoYMonto(?, ?)', [
            $estado, 
            $monto
        ]);

        return view('busquedas.resultados_facturas', compact('resultados'));
    }
}
