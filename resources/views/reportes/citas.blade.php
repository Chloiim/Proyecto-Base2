@extends('layouts.app')

@section('content')
<style>
    /* 🎨 Variables de Estilo */
    :root {
        --color-primary-doc: #1a5276; /* Azul Oscuro Profesional */
        --color-accent: #4a90e2; /* Azul Claro para acento (Agenda) */
        --color-hover-bg: #e8f4fd; /* Fondo de hover muy claro */
        --color-text-dark: #2c3e50;
        --color-border-subtle: #eeeeee;
        --color-secondary: #6c757d;
    }

    /* Contenedor Principal */
    .report-wrapper {
        padding: 50px 20px;
        max-width: 1400px;
        margin: 0 auto;
        min-height: 100vh;
    }

    /* Botón Volver */
    .btn-back-menu {
        background-color: var(--color-secondary);
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 20px;
        font-weight: 500;
        transition: all 0.3s ease;
        text-decoration: none;
        margin-bottom: 30px;
        display: inline-block;
    }

    .btn-back-menu:hover {
        background-color: #5a6268;
        transform: translateY(-1px);
    }

    /* Tarjeta de Reporte */
    .card-report {
        background-color: white;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        border: 1px solid var(--color-accent);
    }

    /* Encabezado */
    .card-header-report {
        background-color: var(--color-primary-doc);
        color: white;
        padding: 18px 25px;
        font-size: 1.5rem;
        font-weight: 600;
        border-bottom: 4px solid var(--color-accent);
    }

    .card-body-report {
        padding: 25px;
    }

    /* Tabla de Reporte */
    .table-doc {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    .table-doc thead {
        background-color: var(--color-accent);
    }

    .table-doc th {
        color: white;
        padding: 15px;
        text-align: left;
        font-weight: 600;
        border: none;
    }

    .table-doc tbody tr {
        border-bottom: 1px solid var(--color-border-subtle);
        transition: background-color 0.2s ease;
    }

    .table-doc tbody tr:nth-child(even) {
        background-color: #fcfcfc;
    }

    .table-doc tbody tr:hover {
        background-color: var(--color-hover-bg);
    }

    .table-doc td {
        padding: 15px;
        vertical-align: middle;
        color: var(--color-text-dark);
        border: none;
    }

    /* Columna de Fecha y Hora */
    .datetime-cell strong {
        color: var(--color-primary-doc);
        font-weight: 700;
        display: block;
    }

    /* Paginación */
    .pagination-doc {
        padding: 10px;
        display: flex;
        justify-content: center;
    }
</style>

<div class="report-wrapper">
    <a href="{{ route('reportes.index') }}" class="btn-back-menu">
        &larr; Volver al Menú
    </a>

    <div class="card-report">
        <div class="card-header-report">
            Reporte de Próximas Citas
        </div>
        <div class="card-body-report">
            <table class="table-doc">
                <thead>
                    <tr>
                        <th>Fecha y Hora</th>
                        <th>Paciente</th>
                        <th>Médico</th>
                        <th>Especialidad</th>
                        <th>Ubicación</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($datos as $item)
                    <tr>
                        <td class="datetime-cell">
                            <strong>{{ $item->Fecha }}</strong> <small>{{ $item->Hora }}</small>
                        </td>
                        <td>{{ $item->Paciente }}</td>
                        <td>{{ $item->Medico }}</td>
                        <td><span class="badge" style="background-color: var(--color-accent); color: white; padding: 5px 10px; border-radius: 4px;">{{ $item->Especialidad }}</span></td>
                        <td>{{ $item->Area }} (<span style="color: var(--color-accent);">{{ $item->Ubicacion }}</span>)</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
            <div class="pagination-doc">
                {{ $datos->links() }}
            </div>
        </div>
    </div>
</div>
@endsection