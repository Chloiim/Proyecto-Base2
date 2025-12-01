<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medico;

class MedicoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $medicos = Medico::all();
        return view('medicos.index', compact('medicos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('medicos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombresMedic' => 'required',
            'apellidosMedic' => 'required',
            'dniMedic' => 'required',
            'especialidadMedic' => 'required',
            'colegiaturaMedic' => 'required',
            'telefonoMedic' => 'required',
            'emailMedic' => 'required',
            'idArea' => 'required',
        ]);

        Medico::create($request->all());

        return redirect()->route('medicos.index')->with('success','Médico registrado.');
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
        $medico = Medico::findOrFail($id);
        return view('medicos.edit', compact('medico'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $medico = Medico::findOrFail($id);
        $medico->update($request->all());

        return redirect()->route('medicos.index')->with('success','Médico actualizado.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Medico::findOrFail($id)->delete();

        return redirect()->route('medicos.index')->with('success','Médico eliminado.');
    }
}
