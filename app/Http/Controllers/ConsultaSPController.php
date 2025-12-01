<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;

class ConsultaSPController extends Controller
{
    public function form()
    {
        // Para popular el select de médicos usa tu modelo Medico o DB::select
        $medicos = DB::select('SELECT idMedic, CONCAT(nombresMedic, " ", apellidosMedic) as nombre FROM Medico');
        return view('sp.consultas.form', compact('medicos'));
    }

    public function buscar(Request $request)
    {
        $request->validate([
            'medico_id' => 'required|integer',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date',
        ]);

        try {
            $rows = DB::select('CALL sp_consultas_por_medico_fecha(?,?,?)', [
                $request->medico_id,
                $request->fecha_inicio,
                $request->fecha_fin
            ]);

            // $rows es array de stdClass
            return view('sp.consultas.result', ['rows' => $rows]);

        } catch (QueryException $ex) {
            $sqlState = $ex->errorInfo[0] ?? '00000';
            $message = $ex->errorInfo[2] ?? $ex->getMessage();
            return back()->withErrors(['db' => "SQLSTATE {$sqlState}: {$message}"]);
        }
    }

}
