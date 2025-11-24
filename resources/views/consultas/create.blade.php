@extends('layouts.app')

@section('content')
<h2>Registrar Consulta</h2>

<form action="{{ route('consultas.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label>Diagnóstico</label>
        <textarea name="diagnosticoConsult" class="form-control"></textarea>
    </div>

    <div class="mb-3">
        <label>Tratamiento</label>
        <textarea name="tratamientoConsult" class="form-control"></textarea>
    </div>

    <div class="mb-3">
        <label>Fecha</label>
        <input type="date" name="fechaConsult" class="form-control">
    </div>

    <div class="mb-3">
        <label>Cita</label>
        <select name="idCit" class="form-control">
            @foreach($citas as $c)
            <option value="{{ $c->idCit }}">
                Cita #{{ $c->idCit }} - {{ $c->paciente->nombresPacient }}
            </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Médico</label>
        <select name="idMedic" class="form-control">
            @foreach($medicos as $m)
            <option value="{{ $m->idMedic }}">{{ $m->nombresMedic }}</option>
            @endforeach
        </select>
    </div>

    <button class="btn btn-success">Guardar</button>
</form>
@endsection
