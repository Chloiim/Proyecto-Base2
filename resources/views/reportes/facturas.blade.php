@extends('layouts.app')

@section('content')
<style>
    /* 🎨 Variables de Estilo */
    :root {
        --color-primary-doc: #1a5276; /* Azul Oscuro (cabecera) */
        --color-finance: #c0392b; /* Rojo Borgoña Fuerte (acento) */
        --color-finance-light: #fbe6e4; /* Rojo claro para hover */
        --color-text-dark: #2c3e50;
        --color-border-subtle: #eeeeee;
        --color-secondary: #6c757d;
        --color-success: #27ae60;
    }

    /* Contenedor Principal */
    .report-wrapper-finance {
        padding: 50px 20px;
        max-width: 1300px;
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
    .card-report-finance {
        background-color: white;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        border: 1px solid var(--color-finance);
    }

    /* Encabezado */
    .card-header-finance {
        background-color: var(--color-primary-doc);
        color: white;
        padding: 18px 25px;
        font-size: 1.5rem;
        font-weight: 600;
        border-bottom: 4px solid var(--color-finance);
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
        background-color: var(--color-finance); /* Cabecera Roja/Borgoña */
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
        background-color: var(--color-finance-light); /* Resaltado con color Rojo claro */
    }

    .table-doc td {
        padding: 15px;
        vertical-align: middle;
        color: var(--color-text-dark);
        border: none;
    }

    /* Columna de Monto */
    .monto-cell-total {
        font-weight: 700;
        color: var(--color-finance);
        font-size: 1.1rem;
    }
    
    /* Columna de Estado (Badges) */
    .badge-status-pendiente {
        background-color: var(--color-finance);
        color: white;
        padding: 5px 10px;
        border-radius: 4px;
        font-weight: 700;
        text-transform: uppercase;
    }
    .badge-status-pagado {
        background-color: var(--color-success);
        color: white;
        padding: 5px 10px;
        border-radius: 4px;
        font-weight: 700;
        text-transform: uppercase;
    }

    /* Paginación */
    .pagination-doc {
        padding: 10px;
        display: flex;
        justify-content: center;
    }
</style>

<div class="report-wrapper-finance">
    <a href="{{ route('reportes.index') }}" class="btn-back-menu">
        &larr; Volver al Menú
    </a>

    <div class="card-report-finance">
        <div class="card-header-finance">
            <h4 class="mb-0">Reporte de Facturación Pendiente</h4>
        </div>
        <div class="card-body-report">
            <table class="table-doc">
                <thead>
                    <tr>
                        <th>Fecha de Emision</th>
                        <th>Paciente</th>
                        <th>Monto</th>
                        <th>Seguro</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($datos as $item)
                    <tr>
                        <td>{{ $item->Fecha_Emision }}</td>
                        <td>{{ $item->Paciente }}</td>
                        <td class="monto-cell-total">S/. {{ number_format($item->Monto, 2) }}</td>
                        <td>{{ $item->Seguro }}</td>
                        <td>
                            @if(strtolower($item->Estado) == 'pendiente')
                                <span class="badge-status-pendiente">{{ $item->Estado }}</span>
                            @else
                                <span class="badge-status-pagado">{{ $item->Estado }}</span>
                            @endif
                        </td>
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