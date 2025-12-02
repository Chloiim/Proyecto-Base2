@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="text-primary"><i class="fas fa-calendar-check"></i> Resultados de Búsqueda de Citas</h3>
        <a href="{{ route('busquedas.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Nueva Búsqueda
        </a>
    </div>

    <div class="card shadow-sm border-primary">
        <div class="card-body">
            @if(count($resultados) > 0)
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-primary text-white">
                            <tr>
                                <th>Fecha y Hora</th>
                                <th>Paciente</th>
                                <th>Médico Asignado</th>
                                <th>Especialidad</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($resultados as $fila)
                            <tr>
                                <td>
                                    <span class="fw-bold">{{ $fila->fechaCit }}</span> <br>
                                    <small class="text-muted">{{ $fila->horaCit }}</small>
                                </td>
                                <td class="fw-bold">{{ $fila->Paciente }}</td>
                                <td>{{ $fila->Medico }}</td>
                                <td><span class="badge bg-info text-dark">{{ $fila->especialidadMedic }}</span></td>
                                <td>
                                    @if($fila->estadoCit == 'pendiente')
                                        <span class="badge bg-warning text-dark">Pendiente</span>
                                    @elseif($fila->estadoCit == 'atendida')
                                        <span class="badge bg-success">Atendida</span>
                                    @else
                                        <span class="badge bg-secondary">{{ $fila->estadoCit }}</span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-3 text-muted">
                    Total de resultados encontrados: {{ count($resultados) }}
                </div>
            @else
                <div class="alert alert-warning text-center" role="alert">
                    <h4 class="alert-heading"><i class="fas fa-exclamation-circle"></i> Sin Resultados</h4>
                    <p>No se encontraron citas en el rango de fechas y especialidad seleccionados.</p>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection