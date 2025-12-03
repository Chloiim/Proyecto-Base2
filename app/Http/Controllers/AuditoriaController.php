<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuditoriaController extends Controller
{
    // 1. Pantalla Principal: Muestra la TABLA DE AUDITORÍA (El "Chismoso")
    public function index()
    {
        // Obtenemos los últimos movimientos registrados por los triggers
        $logs = DB::table('Auditoria')->orderByDesc('idAuditoria')->paginate(10);
        return view('auditoria.index', compact('logs'));
    }

    // ------------------------------------------------------------------
    // PROCESO DE INSERCIÓN (Dispara Trigger 1)
    // ------------------------------------------------------------------
    
    // Muestra el formulario vacío
    public function create()
    {
        return view('auditoria.create');
    }

    // Recibe los datos del formulario y guarda
    public function store(Request $request)
    {
        // Validamos un poco
        $request->validate([
            'nombres' => 'required',
            'apellidos' => 'required',
            'dni' => 'required|size:8|unique:Paciente,dniPacient',
        ]);

        // Insertamos (Aquí salta el Trigger AUTOMÁTICAMENTE)
        DB::table('Paciente')->insert([
            'nombresPacient' => $request->nombres,
            'apellidosPacient' => $request->apellidos,
            'dniPacient' => $request->dni,
            'telefonoPacient' => $request->telefono,
            'emailPacient' => $request->email,
            'alergiasPacient' => $request->alergias
        ]);

        return redirect()->route('auditoria.index')
            ->with('success', '✅ Paciente registrado. ¡Revisa la tabla de abajo, el Trigger debió registrarlo!');
    }

    // ------------------------------------------------------------------
    // PROCESO DE ACTUALIZACIÓN (Dispara Trigger 2)
    // ------------------------------------------------------------------

    // Muestra el formulario con los datos del paciente cargados
    public function edit($id)
    {
        $paciente = DB::table('Paciente')->where('idPacient', $id)->first();
        return view('auditoria.edit', compact('paciente'));
    }

    // Recibe los cambios y actualiza
    public function update(Request $request, $id)
    {
        // Actualizamos (Aquí salta el Trigger AUTOMÁTICAMENTE si cambias algo)
        DB::table('Paciente')->where('idPacient', $id)->update([
            'nombresPacient' => $request->nombres,
            'apellidosPacient' => $request->apellidos,
            'dniPacient' => $request->dni,
            'telefonoPacient' => $request->telefono,
            'emailPacient' => $request->email,
            'alergiasPacient' => $request->alergias
        ]);

        return redirect()->route('auditoria.index')
            ->with('success', '🔄 Paciente actualizado. El Trigger registró el cambio en la auditoría.');
    }

    // ------------------------------------------------------------------
    // PROCESO DE ELIMINACIÓN (Dispara Trigger 3)
    // ------------------------------------------------------------------

    // Muestra una lista de pacientes para que elijas a cual eliminar
    public function deleteList()
    {
        // Solo mostramos nombre y DNI para elegir rápido
        $pacientes = DB::table('Paciente')
            ->select('idPacient', 'nombresPacient', 'apellidosPacient', 'dniPacient')
            ->orderByDesc('idPacient')
            ->paginate(10);

        return view('auditoria.delete_list', compact('pacientes'));
    }

    // Elimina al paciente seleccionado
    public function destroy($id)
    {
        try {
            DB::table('Paciente')->where('idPacient', $id)->delete();
            return redirect()->route('auditoria.index')
                ->with('success', '🗑️ Paciente eliminado. La auditoría ha guardado el registro.');
        } catch (\Exception $e) {
            return back()->with('error', 'No se puede eliminar este paciente (tiene datos asociados).');
        }
    }

    // ==================================================================
    // GESTIÓN DE MEDICAMENTOS (TRIGGERS 4, 5 y 6)
    // ==================================================================

    // 1. INSERTAR MEDICAMENTO
    public function createMed()
    {
        return view('auditoria.med_create');
    }

    public function storeMed(Request $request)
    {
        // Al insertar, el Trigger trg_Audit_Insert_Medicamento se dispara
        DB::table('Medicamento')->insert([
            'nombreMedicament' => $request->nombre,
            'marcaMedicament' => $request->marca,
            'stockMedicament' => $request->stock,
            'precioUnitario' => $request->precio
        ]);

        return redirect()->route('auditoria.index')
            ->with('success', '💊 Medicamento creado. Revisa la auditoría.');
    }

    // 2. ACTUALIZAR MEDICAMENTO
    public function editMed($id)
    {
        $med = DB::table('Medicamento')->where('idMedicament', $id)->first();
        return view('auditoria.med_edit', compact('med'));
    }

    public function updateMed(Request $request, $id)
    {
        // Al actualizar, el Trigger trg_Audit_Update_Medicamento se dispara
        DB::table('Medicamento')->where('idMedicament', $id)->update([
            'nombreMedicament' => $request->nombre,
            'marcaMedicament' => $request->marca,
            'stockMedicament' => $request->stock,
            'precioUnitario' => $request->precio
        ]);

        return redirect()->route('auditoria.index')
            ->with('success', '🔄 Medicamento actualizado. Auditoría registrada.');
    }

    // 3. ELIMINAR MEDICAMENTO
    public function deleteListMed()
    {
        $medicamentos = DB::table('Medicamento')->orderByDesc('idMedicament')->paginate(10);
        return view('auditoria.med_delete_list', compact('medicamentos'));
    }

    public function destroyMed($id)
    {
        try {
            // Al eliminar, el Trigger trg_Audit_Delete_Medicamento se dispara
            DB::table('Medicamento')->where('idMedicament', $id)->delete();
            
            return redirect()->route('auditoria.index')
                ->with('success', '🗑️ Medicamento eliminado correctamente del inventario.');
        } catch (\Exception $e) {
            return back()->with('error', 'No se puede eliminar: Este medicamento ya se usó en recetas.');
        }
    }
}
