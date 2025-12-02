@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="card shadow col-md-8 mx-auto">
        <div class="card-header bg-warning text-dark">
            <h4 class="mb-0">Editar Médico</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('medicos.update', $medico->idMedic) }}" method="POST">
                @csrf
                @method('PUT') <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Nombres</label>
                        <input type="text" class="form-control" name="nombres" value="{{ $medico->nombresMedic }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Apellidos</label>
                        <input type="text" class="form-control" name="apellidos" value="{{ $medico->apellidosMedic }}" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">DNI</label>
                        <input type="text" class="form-control" name="dni" value="{{ $medico->dniMedic }}" maxlength="8" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Teléfono</label>
                        <input type="text" class="form-control" name="telefono" value="{{ $medico->telefonoMedic }}" maxlength="9" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Especialidad</label>
                        <input type="text" class="form-control" name="especialidad" value="{{ $medico->especialidadMedic }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" value="{{ $medico->emailMedic }}">
                    </div>
                </div>

                <div class="mb-3">
                    <small class="text-muted">Colegiatura: {{ $medico->colegiaturaMedic }} (No editable)</small>
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-warning">Actualizar Datos</button>
                    <a href="{{ route('medicos.index') }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection