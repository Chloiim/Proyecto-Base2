@extends('layouts.app')

@section('content')
<h2>Editar Consulta</h2>

<form action="{{ route('consultas.update',$consulta->idConsult) }}" method="POST">
    @csrf @method('PUT')

    <div class="mb-3">
        <label>Diagnóstico</label>
        <textarea name="diagnosticoConsult" class="form-control">{{ $consulta->diagnosticoConsult }}</textarea>
    </div>

    <div class="mb-3">
        <label>Tratamiento</label>
        <textarea name="tratamientoConsult" class="form-control">{{ $consulta->tratamientoConsult }}</textarea>
    </div>

    <div class="mb-3">
        <label>Fecha</label>
        <input type="date" name="fechaConsult" value="{{ $consulta->fechaConsult }}" class="form-control">
    </div>

    <div class="mb-3">
        <label>Cita</label>
        <select name="idCit" class="form-control">
            @foreach($citas as $c)
            <option value="{{ $c->idCit }}" @if($consulta->idCit==$c->idCit) selected @endif>
                Cita #{{ $c->idCit }} - {{ $c->paciente->nombresPacient }}
            </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Médico</label>
        <select name="idMedic" class="form-control">
            @foreach($medicos as $m)
            <option value="{{ $m->idMedic }}" @if($consulta->idMedic==$m->idMedic) selected @endif>
                {{ $m->nombresMedic }}
            </option>
            @endforeach
        </select>
    </div>

    <button class="btn btn-primary">Actualizar</button>
</form>
@endsection
