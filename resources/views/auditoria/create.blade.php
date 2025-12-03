@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="card col-md-8 mx-auto shadow border-primary">
        <div class="card-header bg-primary text-white">
            <h4>Registrar Nuevo Paciente (Prueba de Trigger INSERT)</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('auditoria.store') }}" method="POST">
                @csrf
                <div class="row mb-3">
                    <div class="col">
                        <label>Nombres</label>
                        <input type="text" name="nombres" class="form-control" required>
                    </div>
                    <div class="col">
                        <label>Apellidos</label>
                        <input type="text" name="apellidos" class="form-control" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label>DNI</label>
                        <input type="text" name="dni" class="form-control" maxlength="8" required>
                    </div>
                    <div class="col">
                        <label>Teléfono</label>
                        <input type="text" name="telefono" class="form-control">
                    </div>
                </div>
                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Alergias</label>
                    <textarea name="alergias" class="form-control"></textarea>
                </div>
                <button type="submit" class="btn btn-primary w-100">Guardar Paciente</button>
            </form>
        </div>
    </div>
</div>
@endsection