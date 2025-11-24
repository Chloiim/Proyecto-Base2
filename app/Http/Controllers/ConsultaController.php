<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consulta;
use App\Models\Cita;
use App\Models\Medico;

class ConsultaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $consultas = Consulta::with(['cita.paciente','medico'])->get();
        return view('consultas.index', compact('consultas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $citas = Cita::with('paciente')->get();
        $medicos = Medico::all();

        return view('consultas.create', compact('citas','medicos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'diagnosticoConsult' => 'required',
            'fechaConsult' => 'required',
            'idCit' => 'required',
            'idMedic' => 'required',
        ]);

        Consulta::create($request->all());

        return redirect()->route('consultas.index')
            ->with('success','Consulta registrada correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $consulta = Consulta::findOrFail($id);
        $citas = Cita::with('paciente')->get();
        $medicos = Medico::all();

        return view('consultas.edit', compact('consulta','citas','medicos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $consulta = Consulta::findOrFail($id);
        $consulta->update($request->all());

        return redirect()->route('consultas.index')->with('success','Consulta actualizada.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Consulta::findOrFail($id)->delete();

        return redirect()->route('consultas.index')->with('success','Consulta eliminada.');
    }
}
