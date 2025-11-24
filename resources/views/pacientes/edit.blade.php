@extends('layouts.app')

@section('content')
<h2>Editar Paciente</h2>

<form action="{{ route('pacientes.update',$paciente->idPacient) }}" method="POST">
    @csrf @method('PUT')

    <div class="mb-3">
        <label>Nombres</label>
        <input type="text" name="nombresPacient" class="form-control" value="{{ $paciente->nombresPacient }}">
    </div>

    <div class="mb-3">
        <label>Apellidos</label>
        <input type="text" name="apellidosPacient" class="form-control" value="{{ $paciente->apellidosPacient }}">
    </div>

    <div class="mb-3">
        <label>DNI</label>
        <input type="text" name="dniPacient" class="form-control" value="{{ $paciente->dniPacient }}">
    </div>

    <button class="btn btn-primary">Actualizar</button>
</form>
@endsection
