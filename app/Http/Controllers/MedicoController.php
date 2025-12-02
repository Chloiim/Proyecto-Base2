<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Medico; // Asegúrate de tener un modelo Medico básico

class MedicoController extends Controller
{
    // Listar médicos (Vista normal)
    public function index()
    {
        // Puedes usar Eloquent normal para listar, o una vista SQL si prefieres
        $medicos = DB::table('Medico')->paginate(1000);
        return view('medicos.index', compact('medicos'));
    }

    // Mostrar formulario de creación
    public function create()
    {
        // Necesitamos las áreas para el select
        $areas = DB::table('Area')->get(); 
        return view('medicos.create', compact('areas'));
    }

    // 1. INVOCAR PROCEDIMIENTO DE INSERCIÓN
    public function store(Request $request)
    {
        $sql = "CALL sp_InsertarMedico(?, ?, ?, ?, ?, ?, ?, ?)";
        
        DB::statement($sql, [
            $request->nombres,
            $request->apellidos,
            $request->dni,
            $request->especialidad,
            $request->colegiatura,
            $request->telefono,
            $request->email,
            $request->idArea
        ]);

        return redirect()->route('medicos.index')->with('success', 'Médico registrado correctamente.');
    }

    // Mostrar formulario de edición
    public function edit($id)
    {
        $medico = DB::table('Medico')->where('idMedic', $id)->first();
        return view('medicos.edit', compact('medico'));
    }

    // 2. INVOCAR PROCEDIMIENTO DE ACTUALIZACIÓN
    public function update(Request $request, $id)
    {
        $sql = "CALL sp_ActualizarMedico(?, ?, ?, ?, ?, ?, ?)";
        
        DB::statement($sql, [
            $id,
            $request->nombres,
            $request->apellidos,
            $request->dni,
            $request->especialidad,
            $request->telefono,
            $request->email
        ]);

        return redirect()->route('medicos.index')->with('success', 'Médico actualizado correctamente.');
    }

    // 3. INVOCAR PROCEDIMIENTO DE ELIMINACIÓN
    public function destroy($id)
    {
        $sql = "CALL sp_EliminarMedico(?)";
        
        DB::statement($sql, [$id]);

        return redirect()->route('medicos.index')->with('success', 'Médico eliminado del sistema.');
    }
}