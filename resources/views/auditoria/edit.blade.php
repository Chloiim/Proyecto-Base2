@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="card col-md-8 mx-auto shadow border-warning">
        <div class="card-header bg-warning text-dark">
            <h4>Editar Paciente (Prueba de Trigger UPDATE)</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('auditoria.update', $paciente->idPacient) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="row mb-3">
                    <div class="col">
                        <label>Nombres</label>
                        <input type="text" name="nombres" class="form-control" value="{{ $paciente->nombresPacient }}" required>
                    </div>
                    <div class="col">
                        <label>Apellidos</label>
                        <input type="text" name="apellidos" class="form-control" value="{{ $paciente->apellidosPacient }}" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label>DNI</label>
                        <input type="text" name="dni" class="form-control" value="{{ $paciente->dniPacient }}" required>
                    </div>
                    <div class="col">
                        <label>Teléfono</label>
                        <input type="text" name="telefono" class="form-control" value="{{ $paciente->telefonoPacient }}">
                    </div>
                </div>
                 <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" value="{{ $paciente->emailPacient }}">
                </div>
                <div class="mb-3">
                    <label>Alergias</label>
                    <textarea name="alergias" class="form-control">{{ $paciente->alergiasPacient }}</textarea>
                </div>

                <button type="submit" class="btn btn-warning w-100">Actualizar Datos</button>
            </form>
        </div>
    </div>
</div>
@endsection