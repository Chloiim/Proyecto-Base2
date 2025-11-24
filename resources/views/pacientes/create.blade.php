@extends('layouts.app')

@section('content')
<h2>Registrar Paciente</h2>

<form action="{{ route('pacientes.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label>Nombres</label>
        <input type="text" name="nombresPacient" class="form-control">
    </div>

    <div class="mb-3">
        <label>Apellidos</label>
        <input type="text" name="apellidosPacient" class="form-control">
    </div>

    <div class="mb-3">
        <label>DNI</label>
        <input type="text" name="dniPacient" class="form-control">
    </div>

    <button class="btn btn-success">Guardar</button>
</form>
@endsection
