@extends('layouts.app')

@section('content')
<style>
    /* 🎨 Variables de Estilo */
    :root {
        --color-primary-doc: #1a5276; /* Azul Oscuro (cabecera) */
        --color-info: #00bcd4; /* Azul Cian (acento) */
        --color-info-light: #e0f7fa; /* Cian claro para hover */
        --color-text-dark: #2c3e50;
        --color-border-subtle: #eeeeee;
        --color-secondary: #6c757d;
    }

    /* Contenedor Principal */
    .report-wrapper-info {
        padding: 50px 20px;
        max-width: 1500px;
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
    .card-report-info {
        background-color: white;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        border: 1px solid var(--color-info);
    }

    /* Encabezado */
    .card-header-info {
        background-color: var(--color-primary-doc);
        color: white;
        padding: 18px 25px;
        font-size: 1.5rem;
        font-weight: 600;
        border-bottom: 4px solid var(--color-info);
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
        background-color: var(--color-info); /* Cabecera Cian */
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
        background-color: var(--color-info-light); /* Resaltado con color Cian claro */
    }

    .table-doc td {
        padding: 15px;
        vertical-align: middle;
        color: var(--color-text-dark);
        border: none;
        font-size: 0.95rem;
    }
    
    /* Columna de Médico */
    .medico-cell {
        font-weight: 600;
        color: var(--color-primary-doc);
    }
    
    /* Columna de Especialidad */
    .especialidad-cell {
        font-style: italic;
        color: var(--color-info);
    }
    
    /* Paginación */
    .pagination-doc {
        padding: 10px;
        display: flex;
        justify-content: center;
    }
</style>

<div class="report-wrapper-info">
    <a href="{{ route('reportes.index') }}" class="btn-back-menu">
        &larr; Volver al Menú
    </a>

    <div class="card-report-info">
        <div class="card-header-info">
            <h4 class="mb-0">Reporte de Médicos por Área</h4>
        </div>
        <div class="card-body-report">
            <table class="table-doc">
                <thead>
                    <tr>
                        <th style="width: 15%;">Área</th>
                        <th style="width: 10%;">Edificio</th>
                        <th style="width: 20%;">Médico</th>
                        <th style="width: 15%;">Especialidad</th>
                        <th style="width: 10%;">Teléfono</th>
                        <th style="width: 20%;">Email</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($datos as $item)
                    <tr>
                        <td>{{ $item->Area }}</td>
                        <td>{{ $item->Edificio }}</td>
                        <td class="medico-cell">{{ $item->Medico }}</td>
                        <td class="especialidad-cell">{{ $item->Especialidad }}</td>
                        <td>{{ $item->Telefono }}</td>
                        <td>{{ $item->Email }}</td>
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