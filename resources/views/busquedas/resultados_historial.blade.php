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
    }

    /* Contenedor Principal */
    .report-history-wrapper {
        padding: 50px 20px;
        max-width: 1400px;
        margin: 0 auto;
    }

    /* Encabezado y Botón Superior */
    .header-history {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
        padding-bottom: 10px;
        border-bottom: 3px solid var(--color-health);
    }

    .header-history h3 {
        color: var(--color-health);
        font-size: 1.8rem;
        font-weight: 700;
        margin: 0;
    }
    
    /* Botón Nueva Búsqueda */
    .btn-search-back {
        background-color: #7f8c8d; /* Gris secundario */
        color: white;
        border: none;
        padding: 8px 15px;
        border-radius: 20px;
        font-weight: 500;
        transition: all 0.3s ease;
        text-decoration: none;
    }

    .btn-search-back:hover {
        background-color: #95a5a6;
        transform: translateY(-1px);
    }

    /* Tarjeta de Resultados */
    .card-history {
        background-color: white;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        border: 1px solid var(--color-health);
        overflow: hidden;
    }

    .card-body-history {
        padding: 25px;
    }
    
    /* Información de Paciente (Alert) */
    .patient-info-alert {
        background-color: var(--color-health-light);
        color: var(--color-text-dark);
        border: 1px solid var(--color-health);
        border-radius: 8px;
        padding: 15px;
        margin-bottom: 20px;
        font-weight: 600;
    }

    /* Tabla de Historial */
    .table-history {
        width: 100%;
        border-collapse: collapse;
    }

    .table-history thead {
        background-color: var(--color-health);
    }

    .table-history th {
        color: white;
        padding: 15px;
        text-align: left;
        font-weight: 600;
        border: none !important;
    }

    .table-history tbody tr {
        border-bottom: 1px solid var(--color-border-subtle);
        transition: background-color 0.2s ease;
    }

    .table-history tbody tr:hover {
        background-color: var(--color-health-light);
    }

    .table-history td {
        padding: 15px;
        vertical-align: top; /* Alinear el contenido largo arriba */
        color: var(--color-text-dark);
        border: none !important;
    }
    
    /* Estilo para la columna de Diagnóstico */
    .diagnosis-box {
        padding: 10px;
        background-color: #f7f9f9;
        border: 1px solid #e0e0e0;
        border-radius: 6px;
        color: #5a5a5a;
        font-style: italic;
        line-height: 1.4;
    }

    /* Mensaje de No Resultados */
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

<div class="report-history-wrapper">
    <div class="header-history">
        <h3><i class="fas fa-file-medical"></i> Historial Clínico Encontrado</h3>
        <a href="{{ route('busquedas.index') }}" class="btn-search-back">
            <i class="fas fa-arrow-left"></i> Nueva Búsqueda
        </a>
    </div>

    <div class="card-history">
        <div class="card-body-history">
            @if(count($resultados) > 0)
                <div class="patient-info-alert">
                    <strong>Paciente:</strong> {{ $resultados[0]->Paciente }}
                </div>

                <div class="table-responsive">
                    <table class="table-history">
                        <thead>
                            <tr>
                                <th style="width: 15%">Fecha Atención</th>
                                <th style="width: 20%">Médico Tratante</th>
                                <th style="width: 25%">Motivo Consulta</th>
                                <th style="width: 40%">Diagnóstico</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($resultados as $fila)
                            <tr>
                                <td>{{ $fila->Fecha }}</td>
                                <td class="fw-bold">{{ $fila->Medico }}</td>
                                <td>{{ $fila->Motivo }}</td>
                                <td>
                                    <div class="diagnosis-box">
                                        {{ $fila->Diagnostico }}
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="alert-warning-doc" role="alert">
                    <h4 class="alert-heading"><i class="fas fa-user-slash"></i> No se encontró historial</h4>
                    <p>Verifique que el DNI sea correcto o que el paciente tenga consultas registradas con el médico indicado.</p>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection