@extends('layouts.app')

@section('content')
<style>
    /* 🎨 Variables de Estilo */
    :root {
        --color-primary-doc: #1a5276; /* Azul Oscuro (cabecera) */
        --color-medicine: #ffb300; /* Ámbar/Advertencia (acento) */
        --color-medicine-light: #fff8e1; /* Ámbar claro para hover */
        --color-text-dark: #2c3e50;
        --color-border-subtle: #eeeeee;
        --color-secondary: #6c757d;
    }

    /* Contenedor Principal */
    .report-wrapper-medicine {
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
    .card-report-medicine {
        background-color: white;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        border: 1px solid var(--color-medicine);
    }

    /* Encabezado */
    .card-header-medicine {
        background-color: var(--color-primary-doc);
        color: white;
        padding: 18px 25px;
        font-size: 1.5rem;
        font-weight: 600;
        border-bottom: 4px solid var(--color-medicine);
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
        background-color: var(--color-medicine); /* Cabecera Ámbar/Advertencia */
    }

    .table-doc th {
        color: var(--color-text-dark); /* Texto oscuro para contraste en ámbar */
        padding: 15px;
        text-align: left;
        font-weight: 700;
        border: none;
    }
    
    .table-doc thead .text-white { /* Corrige el texto del encabezado */
        color: var(--color-text-dark) !important; 
    }

    .table-doc tbody tr {
        border-bottom: 1px solid var(--color-border-subtle);
        transition: background-color 0.2s ease;
    }

    .table-doc tbody tr:nth-child(even) {
        background-color: #fcfcfc;
    }

    .table-doc tbody tr:hover {
        background-color: var(--color-medicine-light); /* Resaltado con color Ámbar claro */
    }

    .table-doc td {
        padding: 15px;
        vertical-align: middle;
        color: var(--color-text-dark);
        border: none;
        font-size: 0.95rem;
    }
    
    /* Columna de Cantidad */
    .qty-cell {
        font-weight: 700;
        color: var(--color-medicine);
        text-align: center;
    }
    
    /* Columna de Instrucciones */
    .instructions-cell {
        font-style: italic;
        color: #5a5a5a;
        max-width: 300px;
        white-space: normal;
        line-height: 1.3;
    }


    /* Paginación */
    .pagination-doc {
        padding: 10px;
        display: flex;
        justify-content: center;
    }
</style>

<div class="report-wrapper-medicine">
    <a href="{{ route('reportes.index') }}" class="btn-back-menu">
        &larr; Volver al Menú
    </a>

    <div class="card-report-medicine">
        <div class="card-header-medicine">
            <h4 class="mb-0">Reporte de Recetas y Medicamentos</h4>
        </div>
        <div class="card-body-report">
            <table class="table-doc">
                <thead>
                    <tr>
                        <th style="width: 10%;">Fecha</th>
                        <th style="width: 15%;">Médico</th>
                        <th style="width: 15%;">Paciente</th>
                        <th style="width: 20%;">Medicamento</th>
                        <th style="width: 10%; text-align: center;">Cantidad</th>
                        <th style="width: 30%;">Instrucciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($datos as $item)
                    <tr>
                        <td>{{ $item->Fecha }}</td>
                        <td>{{ $item->Médico }}</td>
                        <td>{{ $item->Paciente }}</td>
                        <td class="fw-bold">{{ $item->Medicamento }}</td>
                        <td class="qty-cell">{{ $item->Cantidad }}</td>
                        <td class="instructions-cell">{{ $item->Instrucciones }}</td>
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