@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="text-center mb-5">Sistema de Reportes Clínicos</h2>
    
    <div class="row g-4">
        <div class="col-md-4">
            <div class="card h-100 text-center shadow-sm border-primary">
                <div class="card-body">
                    <h5 class="card-title text-primary">Próximas Citas</h5>
                    <p class="card-text text-muted">Agenda detallada de citas pendientes.</p>
                    <a href="{{ route('reportes.citas') }}" class="btn btn-primary">Ver Reporte</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card h-100 text-center shadow-sm border-success">
                <div class="card-body">
                    <h5 class="card-title text-success">Historial Médico</h5>
                    <p class="card-text text-muted">Registro completo de atenciones.</p>
                    <a href="{{ route('reportes.historial') }}" class="btn btn-success">Ver Reporte</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card h-100 text-center shadow-sm border-info">
                <div class="card-body">
                    <h5 class="card-title text-info">Médicos por Área</h5>
                    <p class="card-text text-muted">Directorio de personal y ubicaciones.</p>
                    <a href="{{ route('reportes.medicos') }}" class="btn btn-info text-white">Ver Reporte</a>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card h-100 text-center shadow-sm border-danger">
                <div class="card-body">
                    <h5 class="card-title text-danger">Facturación Pendiente</h5>
                    <p class="card-text text-muted">Control de pagos y deudas.</p>
                    <a href="{{ route('reportes.facturas') }}" class="btn btn-danger">Ver Reporte</a>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card h-100 text-center shadow-sm border-warning">
                <div class="card-body">
                    <h5 class="card-title text-warning">Recetas y Medicamentos</h5>
                    <p class="card-text text-muted">Detalle de prescripciones emitidas.</p>
                    <a href="{{ route('reportes.recetas') }}" class="btn btn-warning">Ver Reporte</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection