@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="text-center mb-4">Sistema de Auditoría Completo</h2>

    @if(session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger text-center">{{ session('error') }}</div>
    @endif

    <h4 class="text-muted border-bottom pb-2">📂 Tabla: Pacientes</h4>
    <div class="row mb-4">
        <div class="col-md-4">
            <a href="{{ route('auditoria.create') }}" class="btn btn-outline-primary w-100 p-3">
                <i class="fas fa-user-plus fa-2x"></i><br>Insertar Paciente
            </a>
        </div>
        <div class="col-md-4">
            @php $ultimoId = DB::table('Paciente')->max('idPacient'); @endphp
            <a href="{{ $ultimoId ? route('auditoria.edit', $ultimoId) : '#' }}" class="btn btn-outline-warning w-100 p-3">
                <i class="fas fa-user-edit fa-2x"></i><br>Editar Último Paciente
            </a>
        </div>
        <div class="col-md-4">
            <a href="{{ route('auditoria.deleteList') }}" class="btn btn-outline-danger w-100 p-3">
                <i class="fas fa-user-times fa-2x"></i><br>Eliminar Paciente
            </a>
        </div>
    </div>

    <h4 class="text-muted border-bottom pb-2 mt-4">💊 Tabla: Medicamentos</h4>
    <div class="row mb-5">
        <div class="col-md-4">
            <a href="{{ route('auditoria.createMed') }}" class="btn btn-outline-info w-100 p-3">
                <i class="fas fa-capsules fa-2x"></i><br>Insertar Medicamento
            </a>
        </div>
        <div class="col-md-4">
            @php $ultimoMed = DB::table('Medicamento')->max('idMedicament'); @endphp
            <a href="{{ $ultimoMed ? route('auditoria.editMed', $ultimoMed) : '#' }}" class="btn btn-outline-primary w-100 p-3">
                <i class="fas fa-edit fa-2x"></i><br>Editar Último Med.
            </a>
        </div>
        <div class="col-md-4">
            <a href="{{ route('auditoria.deleteListMed') }}" class="btn btn-outline-dark w-100 p-3">
                <i class="fas fa-trash-alt fa-2x"></i><br>Eliminar Medicamento
            </a>
        </div>
    </div>

    <div class="card shadow-lg">
        <div class="card-header bg-dark text-white">
            <h5 class="mb-0">Registro de Auditoría (Todos los Triggers)</h5>
        </div>
        <div class="card-body p-0">
            <table class="table table-striped mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Fecha</th>
                        <th>Tabla</th>
                        <th>Acción</th>
                        <th>Detalle</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($logs as $log)
                    <tr>
                        <td>{{ $log->idAuditoria }}</td>
                        <td>{{ $log->fechaHora }}</td>
                        <td class="fw-bold">{{ $log->tablaAfectada }}</td>
                        <td>
                            <span class="badge bg-{{ $log->accion == 'ELIMINAR' ? 'danger' : ($log->accion == 'INSERTAR' ? 'success' : 'warning') }}">
                                {{ $log->accion }}
                            </span>
                        </td>
                        <td>{{ $log->descripcion }}</td>
                    </tr>
                    @empty
                    <tr><td colspan="5" class="text-center">Sin registros.</td></tr>
                    @endforelse
                </tbody>
            </table>
            <div class="p-2">{{ $logs->links() }}</div>
        </div>
    </div>
</div>
@endsection