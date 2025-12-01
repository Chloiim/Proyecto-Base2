@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Médico</h1>
    <form action="{{ route('medicos.update', $medico) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre', $medico->nombre) }}" required>
        </div>
        <div class="mb-3">
            <label for="especialidad" class="form-label">Especialidad</label>
            <input type="text" class="form-control" id="especialidad" name="especialidad" value="{{ old('especialidad', $medico->especialidad) }}" required>
        </div>
        <!-- Agrega más campos según tu modelo -->
        <button type="submit" class="btn btn-primary">Guardar cambios</button>
    </form>
</div>
@endsection
