@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h3 class="text-center text-danger mb-4">Selecciona un Paciente para Eliminar</h3>
    <p class="text-center text-muted">Al confirmar, el Trigger de Eliminación guardará el registro en Auditoría.</p>

    <div class="card shadow">
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>DNI</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pacientes as $p)
                    <tr>
                        <td>{{ $p->nombresPacient }} {{ $p->apellidosPacient }}</td>
                        <td>{{ $p->dniPacient }}</td>
                        <td>
                            <form action="{{ route('auditoria.destroy', $p->idPacient) }}" method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar <i class="fas fa-times"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $pacientes->links() }}
        </div>
    </div>
    <div class="text-center mt-3">
        <a href="{{ route('auditoria.index') }}" class="btn btn-secondary">Cancelar y Volver</a>
    </div>
</div>
@endsection