@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Gestión de Médicos</h2>
        <a href="{{ route('medicos.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Nuevo Médico
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead class="table-light">
                    <tr>
                        <th>DNI</th>
                        <th>Nombre Completo</th>
                        <th>Especialidad</th>
                        <th>Teléfono</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($medicos as $medico)
                    <tr>
                        <td>{{ $medico->dniMedic }}</td>
                        <td>{{ $medico->nombresMedic }} {{ $medico->apellidosMedic }}</td>
                        <td>{{ $medico->especialidadMedic }}</td>
                        <td>{{ $medico->telefonoMedic }}</td>
                        <td class="text-center">
                            <a href="{{ route('medicos.edit', $medico->idMedic) }}" class="btn btn-sm btn-warning">
                                <i class="fas fa-edit"></i> Editar
                            </a>

                            <form action="{{ route('medicos.destroy', $medico->idMedic) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Estás seguro de eliminar este médico?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="fas fa-trash"></i> Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {{ $medicos->links() }}
            </div>
        </div>
    </div>
</div>
@endsection