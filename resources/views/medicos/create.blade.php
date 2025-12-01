@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Registrar Médico</h1>
    <form action="{{ route('medicos.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nombresMedic" class="form-label">Nombres</label>
            <input type="text" class="form-control" id="nombresMedic" name="nombresMedic" required>
        </div>
        <div class="mb-3">
            <label for="apellidosMedic" class="form-label">Apellidos</label>
            <input type="text" class="form-control" id="apellidosMedic" name="apellidosMedic" required>
        </div>
        <div class="mb-3">
            <label for="dniMedic" class="form-label">DNI</label>
            <input type="text" class="form-control" id="dniMedic" name="dniMedic" required>
        </div>
        <div class="mb-3">
            <label for="especialidadMedic" class="form-label">Especialidad</label>
            <input type="text" class="form-control" id="especialidadMedic" name="especialidadMedic" required>
        </div>
        <div class="mb-3">
            <label for="colegiaturaMedic" class="form-label">Colegiatura</label>
            <input type="text" class="form-control" id="colegiaturaMedic" name="colegiaturaMedic" required>
        </div>
                <div class="mb-3">
            <label for="telefonoMedic" class="form-label">Teléfono</label>
            <input type="text" class="form-control" id="telefonoMedic" name="telefonoMedic" required>
        </div>
        <div class="mb-3">
            <label for="emailMedic" class="form-label">Email</label>
            <input type="email" class="form-control" id="emailMedic" name="emailMedic" required>
        </div>
        <div class="mb-3">
            <label for="idArea" class="form-label">Área</label>
            <input type="number" class="form-control" id="idArea" name="idArea" required>
        </div>
        <!-- Agrega más campos según tu modelo -->
        <button type="submit" class="btn btn-primary">Registrar</button>
    </form>
</div>
@endsection
