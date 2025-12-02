@extends('layouts.app')

@section('content')
<style>
    /* 🎨 Variables de Estilo */
    :root {
        --color-primary-doc: #1a5276; /* Azul Oscuro (cabecera) */
        --color-health: #43a047; /* Verde Saludable (acento) */
        --color-health-light: #e8f5e9; /* Verde claro para hover */
        --color-text-dark: #2c3e50;
        --color-border-subtle: #eeeeee;
        --color-secondary: #6c757d;
    }

    /* Contenedor Principal */
    .report-wrapper-history {
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
    .card-report-history {
        background-color: white;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        border: 1px solid var(--color-health);
    }

    /* Encabezado */
    .card-header-history {
        background-color: var(--color-primary-doc);
        color: white;
        padding: 18px 25px;
        font-size: 1.5rem;
        font-weight: 600;
        border-bottom: 4px solid var(--color-health);
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
        background-color: var(--color-health); /* Cabecera Verde Saludable */
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
        background-color: var(--color-health-light); /* Resaltado con color Verde claro */
    }

    .table-doc td {
        padding: 15px;
        vertical-align: top; /* Crucial para texto largo */
        color: var(--color-text-dark);
        border: none;
        max-width: 250px; /* Limita el ancho para Diagnóstico/Tratamiento */
    }

    /* Estilos para Texto Largo */
    .long-text-cell {
        font-style: italic;
        color: #5a5a5a;
        font-size: 0.9rem;
        line-height: 1.3;
        /* Limita la altura del texto en la vista principal */
        max-height: 70px; 
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 3; /* Mostrar máximo 3 líneas */
        -webkit-box-orient: vertical;
    }
    
    /* Columna de Paciente */
    .paciente-cell {
        font-weight: 600;
        color: var(--color-primary-doc);
    }

    /* Paginación */
    .pagination-doc {
        padding: 10px;
        display: flex;
        justify-content: center;
    }
</style>

<div class="report-wrapper-history">
    <a href="{{ route('reportes.index') }}" class="btn-back-menu">
        &larr; Volver al Menú
    </a>

    <div class="card-report-history">
        <div class="card-header-history">
            <h4 class="mb-0">Reporte de Historial Médico</h4>
        </div>
        <div class="card-body-report">
            <table class="table-doc">
                <thead>
                    <tr>
                        <th style="width: 10%;">Fecha</th>
                        <th style="width: 15%;">Paciente</th>
                        <th style="width: 15%;">Motivo</th>
                        <th style="width: 25%;">Diagnóstico</th>
                        <th style="width: 25%;">Tratamiento</th>
                        <th style="width: 10%;">Médico Atendió</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($datos as $item)
                    <tr>
                        <td>{{ $item->Fecha }}</td>
                        <td class="paciente-cell">{{ $item->Paciente }}</td>
                        <td>{{ $item->Motivo }}</td>
                        <td>
                            <div class="long-text-cell">{{ $item->Diagnostico }}</div>
                        </td>
                        <td>
                            <div class="long-text-cell">{{ $item->Tratamiento }}</div>
                        </td>
                        <td>{{ $item->Medico_Atendio }}</td>
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