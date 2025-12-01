<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VistaProximaCita;
use App\Models\VistaHistorialMedico;
use App\Models\VistaMedicoArea;
use App\Models\VistaFacturaPendiente;
use App\Models\VistaDetallePrescripcion;

class ReportesController extends Controller
{
    // Solo muestra el menú de botones
    public function index()
    {
        return view('reportes.index');
    }

    // Métodos individuales para cada reporte
    public function verCitas()
    {
        $datos = VistaProximaCita::paginate(10);
        return view('reportes.citas', compact('datos'));
    }

    public function verHistorial()
    {
        $datos = VistaHistorialMedico::paginate(10);
        return view('reportes.historial', compact('datos'));
    }

    public function verMedicos()
    {
        $datos = VistaMedicoArea::paginate(10);
        return view('reportes.medicos', compact('datos'));
    }

    public function verFacturas()
    {
        $datos = VistaFacturaPendiente::paginate(10);
        return view('reportes.facturas', compact('datos'));
    }

    public function verRecetas()
    {
        $datos = VistaDetallePrescripcion::paginate(10);
        return view('reportes.recetas', compact('datos'));
    }
}
