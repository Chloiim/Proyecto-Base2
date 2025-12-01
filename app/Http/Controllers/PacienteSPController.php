<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;

class PacienteSPController extends Controller
{
    public function create()
    {
        return view('sp.paciente.create'); // formulario
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombres' => 'required',
            'apellidos' => 'required',
            'dni' => 'required',
        ]);

        try {
            DB::statement('CALL sp_insert_paciente(?,?,?,?,?)', [
                $request->nombres,
                $request->apellidos,
                $request->dni,
                $request->telefono ?? null,
                $request->email ?? null
            ]);

            return redirect()->route('sp.paciente.create')->with('success', 'Paciente insertado con SP.');
        } catch (QueryException $ex) {
            // Capturamos SIGNAL SQL
            $sqlState = $ex->errorInfo[0] ?? '00000';
            $message = $ex->errorInfo[2] ?? $ex->getMessage();
            return back()->withInput()->withErrors(['db' => "SQLSTATE {$sqlState}: {$message}"]);
        }
    }
}
