<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InfoSistemaController extends Controller
{
    public function index()
    {
        // 1. Usamos fn_MensajeEstadoCita
        $citas = DB::table('Cita')
            ->join('Paciente', 'Cita.idPacient', '=', 'Paciente.idPacient')
            ->select(
                'Cita.fechaCit', 
                'Paciente.nombresPacient', 
                'Cita.estadoCit',
                // Llamada a la función SQL
                DB::raw("fn_MensajeEstadoCita(Cita.estadoCit) as MensajeUsuario")
            )
            ->limit(5)
            ->get();

        // 2. Usamos fn_AlertaFacturacion
        $facturas = DB::table('Factura')
            ->join('Paciente', 'Factura.idPacient', '=', 'Paciente.idPacient')
            ->select(
                'Factura.idFac',
                'Paciente.apellidosPacient',
                'Factura.montoTotal',
                'Factura.estadoPago',
                // Llamada a la función SQL pasando dos parámetros
                DB::raw("fn_AlertaFacturacion(Factura.montoTotal, Factura.estadoPago) as AlertaCobranza")
            )
            ->where('Factura.estadoPago', 'pendiente') // Filtramos solo pendientes para probar la lógica
            ->limit(5)
            ->get();

        // 3. Usamos fn_CategoriaSala
        $salas = DB::table('Sala')
            ->join('Area', 'Sala.area', '=', 'Area.idAr')
            ->select(
                'Sala.ubicacionSala',
                'Area.nombre_ar',
                'Sala.capacidadSala',
                // Llamada a la función SQL
                DB::raw("fn_CategoriaSala(Sala.capacidadSala) as TipoAmbiente")
            )
            ->limit(5)
            ->get();

        return view('info_sistema.index', compact('citas', 'facturas', 'salas'));
    }
}
