@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="card shadow col-md-8 mx-auto">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Registrar Nuevo Médico</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('medicos.store') }}" method="POST">
                @csrf
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="nombres" class="form-label">Nombres</label>
                        <input type="text" class="form-control" name="nombres" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="apellidos" class="form-label">Apellidos</label>
                        <input type="text" class="form-control" name="apellidos" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="dni" class="form-label">DNI</label>
                        <input type="text" class="form-control" name="dni" maxlength="8" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="telefono" class="form-label">Teléfono</label>
                        <input type="text" class="form-control" name="telefono" maxlength="9" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="colegiatura" class="form-label">Colegiatura</label>
                        <input type="text" class="form-control" name="colegiatura" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="especialidad" class="form-label">Especialidad</label>
                        <input type="text" class="form-control" name="especialidad" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email">
                    </div>
                </div>

                <div class="mb-4">
                    <label for="idArea" class="form-label">Área Asignada</label>
                    <select name="idArea" class="form-select" required>
                        <option value="">Seleccione un área...</option>
                        @foreach($areas as $area)
                            <option value="{{ $area->idAr }}">{{ $area->nombre_ar }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary">Guardar Médico</button>
                    <a href="{{ route('medicos.index') }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection