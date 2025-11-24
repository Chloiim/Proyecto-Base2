@extends('layouts.app')

@section('content')
<h2>Registrar Factura</h2>

<form action="{{ route('facturas.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label>Fecha</label>
        <input type="date" name="fechaFactura" class="form-control">
    </div>

    <div class="mb-3">
        <label>Monto</label>
        <input type="number" step="0.01" name="montoFactura" class="form-control">
    </div>

    <div class="mb-3">
        <label>Paciente</label>
        <select name="idPacient" class="form-control">
            @foreach($pacientes as $p)
            <option value="{{ $p->idPacient }}">{{ $p->nombresPacient }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Consulta</label>
        <select name="idConsult" class="form-control">
            @foreach($consultas as $c)
            <option value="{{ $c->idConsult }}">{{ $c->diagnosticoConsult }}</option>
            @endforeach
        </select>
    </div>

    <button class="btn btn-success">Guardar</button>
</form>
@endsection
