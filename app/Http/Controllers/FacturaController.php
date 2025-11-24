<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Factura;
use App\Models\Paciente;
use App\Models\Consulta;

class FacturaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $facturas = Factura::with(['paciente','consulta'])->get();
        return view('facturas.index', compact('facturas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pacientes = Paciente::all();
        $consultas = Consulta::all();
        return view('facturas.create', compact('pacientes','consultas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'fechaFactura' => 'required',
            'montoFactura' => 'required',
            'idPacient' => 'required',
            'idConsult' => 'required',
        ]);

        Factura::create($request->all());

        return redirect()->route('facturas.index')->with('success','Factura registrada.');
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
        $factura = Factura::findOrFail($id);
        $pacientes = Paciente::all();
        $consultas = Consulta::all();

        return view('facturas.edit', compact('factura','pacientes','consultas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $factura = Factura::findOrFail($id);
        $factura->update($request->all());

        return redirect()->route('facturas.index')->with('success','Factura actualizada.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Factura::findOrFail($id)->delete();

        return redirect()->route('facturas.index')->with('success','Factura eliminada.');
    }
}
