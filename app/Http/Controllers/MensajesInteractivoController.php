<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MensajesInteractivoController extends Controller
{
    // 1. Muestra los formularios (Cargamos listas para los 'select' para facilitar la elección)
    public function index()
    {
        $pacientes = DB::table('Paciente')->select('idPacient', 'nombresPacient', 'apellidosPacient')->get();
        $medicamentos = DB::table('Medicamento')->select('idMedicament', 'nombreMedicament')->get();
        $facturas = DB::table('Factura')->select('idFac', 'montoTotal')->get();

        return view('mensajes.probador', compact('pacientes', 'medicamentos', 'facturas'));
    }

    // 2. Procesa la función de Alergias (Recibe el parámetro ID Paciente)
    public function verificarAlergia(Request $request)
    {
        $id = $request->input('idPacient');
        
        // Ejecutamos la función SQL con el parámetro recibido
        $resultado = DB::selectOne("SELECT fn_AlertaAlergias(?) as mensaje", [$id]);

        // Retornamos a la vista con el mensaje
        return redirect()->route('mensajes.interactivo')
            ->with('resp_alergia', $resultado->mensaje)
            ->with('id_alergia', $id); // Para recordar qué seleccionó
    }

    // 3. Procesa la función de Stock (Recibe el parámetro ID Medicamento)
    public function verificarStock(Request $request)
    {
        $id = $request->input('idMedicament');
        
        $resultado = DB::selectOne("SELECT fn_EstadoStock(?) as mensaje", [$id]);

        return redirect()->route('mensajes.interactivo')
            ->with('resp_stock', $resultado->mensaje)
            ->with('id_stock', $id);
    }

    // 4. Procesa la función de Cobranza (Recibe el parámetro ID Factura)
    public function verificarCobranza(Request $request)
    {
        $id = $request->input('idFactura');
        
        $resultado = DB::selectOne("SELECT fn_AnalisisCobranza(?) as mensaje", [$id]);

        return redirect()->route('mensajes.interactivo')
            ->with('resp_cobranza', $resultado->mensaje)
            ->with('id_cobranza', $id);
    }
}
