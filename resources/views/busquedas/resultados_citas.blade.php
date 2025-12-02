@extends('layouts.app')

@section('content')
<style>
    /* 🎨 Variables de Estilo */
    :root {
        --color-primary-doc: #1a5276; /* Azul Oscuro Profesional */
        --color-accent: #4a90e2; /* Azul Claro para acento */
        --color-hover-bg: #f0f8ff; /* Fondo de hover muy claro */
        --color-text-dark: #2c3e50;
        --color-border-subtle: #eeeeee;
        --color-warning: #ffc107;
        --color-success: #28a745;
    }

    /* Contenedor Principal */
    .search-results-wrapper {
        padding: 50px 20px;
        max-width: 1200px;
        margin: 0 auto;
    }

    /* Encabezado y Botón Superior */
    .header-results {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
        padding-bottom: 10px;
        border-bottom: 3px solid var(--color-accent);
    }

    .header-results h3 {
        color: var(--color-primary-doc);
        font-size: 1.8rem;
        font-weight: 600;
        margin: 0;
    }
    
    /* Botón Nueva Búsqueda */
    .btn-search-back {
        background-color: #6c757d;
        color: white;
        border: none;
        padding: 8px 15px;
        border-radius: 20px;
        font-weight: 500;
        transition: all 0.3s ease;
        text-decoration: none;
    }

    .btn-search-back:hover {
        background-color: #5a6268;
        transform: translateY(-1px);
    }

    /* Tarjeta de Resultados */
    .card-results {
        background-color: white;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        border: 1px solid var(--color-accent);
    }

    .card-body-results {
        padding: 25px;
    }

    /* Tabla de Resultados */
    .table-doc-results {
        width: 100%;
        border-collapse: collapse;
    }

    .table-doc-results thead {
        background-color: var(--color-primary-doc);
        color: white;
    }

    .table-doc-results th {
        padding: 15px;
        text-align: left;
        font-weight: 600;
        border: none !important;
    }

    .table-doc-results tbody tr {
        border-bottom: 1px solid var(--color-border-subtle);
        transition: background-color 0.2s ease;
    }

    .table-doc-results tbody tr:hover {
        background-color: var(--color-hover-bg);
    }

    .table-doc-results td {
        padding: 12px 15px;
        vertical-align: middle;
        color: var(--color-text-dark);
        border: none !important;
    }

    /* Estilos de Badges (Etiquetas de Estado) */
    .badge-custom {
        padding: 5px 10px;
        border-radius: 15px;
        font-size: 0.85rem;
        font-weight: 600;
        text-transform: capitalize;
        white-space: nowrap;
    }

    .bg-warning-custom { background-color: var(--color-warning); color: var(--color-text-dark); }
    .bg-success-custom { background-color: var(--color-success); color: white; }
    .bg-secondary-custom { background-color: #6c757d; color: white; }
    .bg-info-custom { background-color: #17a2b8; color: white; }

    /* Mensaje de Sin Resultados */
    .alert-warning-doc {
        background-color: #fff3cd;
        color: #856404;
        border: 1px solid #ffeeba;
        border-radius: 8px;
        padding: 20px;
        text-align: center;
    }

    .alert-warning-doc h4 {
        color: #856404;
        margin-bottom: 10px;
    }

</style>

<div class="search-results-wrapper">
    <div class="header-results">
        <h3><i class="fas fa-calendar-check"></i> Resultados de Búsqueda de Citas</h3>
        <a href="{{ route('busquedas.index') }}" class="btn-search-back">
            <i class="fas fa-arrow-left"></i> Nueva Búsqueda
        </a>
    </div>

    <div class="card-results">
        <div class="card-body-results">
            @if(count($resultados) > 0)
                <div class="table-responsive">
                    <table class="table-doc-results">
                        <thead>
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
                                    <span class="fw-bold" style="color: var(--color-text-dark);">{{ $fila->fechaCit }}</span> <br>
                                    <small class="text-muted">{{ $fila->horaCit }}</small>
                                </td>
                                <td class="fw-bold" style="color: var(--color-primary-doc);">{{ $fila->Paciente }}</td>
                                <td>{{ $fila->Medico }}</td>
                                <td><span class="badge-custom bg-info-custom">{{ $fila->especialidadMedic }}</span></td>
                                <td>
                                    @if($fila->estadoCit == 'pendiente')
                                        <span class="badge-custom bg-warning-custom">Pendiente</span>
                                    @elseif($fila->estadoCit == 'atendida')
                                        <span class="badge-custom bg-success-custom">Atendida</span>
                                    @else
                                        <span class="badge-custom bg-secondary-custom">{{ $fila->estadoCit }}</span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-3 text-muted">
                    Total de resultados encontrados: **{{ count($resultados) }}**
                </div>
            @else
                <div class="alert-warning-doc" role="alert">
                    <h4 class="alert-heading"><i class="fas fa-exclamation-circle"></i> Sin Resultados</h4>
                    <p>No se encontraron citas en el rango de fechas y especialidad seleccionados.</p>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection