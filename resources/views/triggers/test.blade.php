@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="text-center mb-4"><i class="fas fa-shield-alt"></i> Panel de Control de Triggers</h2>
    
    @if(session('error_trigger'))
        <div class="alert alert-danger shadow-sm">
            <h4><i class="fas fa-ban"></i> ¡Acción Bloqueada por Base de Datos!</h4>
            <p>{{ session('error_trigger') }}</p>
        </div>
    @endif

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row g-4 mb-5">
        
        <div class="col-md-4">
            <div class="card h-100 border-primary">
                <div class="card-header bg-primary text-white">Trigger 1: Insertar Cita Pasada</div>
                <div class="card-body text-center">
                    <p>Intenta agendar una cita para el año 2000.</p>
                    <form action="{{ route('triggers.testCita') }}" method="POST">
                        @csrf
                        <button class="btn btn-outline-primary w-100">Probar Inserción Ilegal</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card h-100 border-warning">
                <div class="card-header bg-warning text-dark">Trigger 2: Modificar Factura Pagada</div>
                <div class="card-body text-center">
                    <p>Intenta cambiar el monto de una factura que ya fue cobrada.</p>
                    <form action="{{ route('triggers.testFactura') }}" method="POST">
                        @csrf
                        <button class="btn btn-outline-warning w-100">Probar Modificación Ilegal</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card h-100 border-danger">
                <div class="card-header bg-danger text-white">Trigger 3: Borrar Historial</div>
                <div class="card-body text-center">
                    <p>Intenta eliminar un expediente clínico de la BD.</p>
                    <form action="{{ route('triggers.testHistorial') }}" method="POST">
                        @csrf
                        <button class="btn btn-outline-danger w-100">Probar Eliminación Ilegal</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow">
        <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Trigger 4: Auditoría Automática (After Update)</h5>
            <form action="{{ route('triggers.testPrecio') }}" method="POST">
                @csrf
                <button class="btn btn-success btn-sm">Cambiar Precio Medicamento (+1 Sol)</button>
            </form>
        </div>
        <div class="card-body">
            <p class="text-muted">Si cambias el precio arriba, el trigger insertará una fila aquí automáticamente.</p>
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tabla</th>
                        <th>Acción</th>
                        <th>Descripción del Cambio</th>
                        <th>Fecha</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($auditoria as $log)
                    <tr>
                        <td>{{ $log->idAuditoria }}</td>
                        <td>{{ $log->tablaAfectada }}</td>
                        <td><span class="badge bg-info">{{ $log->accion }}</span></td>
                        <td>{{ $log->descripcion }}</td>
                        <td>{{ $log->fecha }}</td>
                    </tr>
                    @empty
                    <tr><td colspan="5" class="text-center">Aún no hay registros de auditoría.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection