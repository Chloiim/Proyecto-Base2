@extends('layouts.app')

@section('content')
<style>
    /* 🎨 Variables de Estilo */
    :root {
        --color-primary-doc: #1a5276; /* Azul Oscuro Profesional */
        --color-finance: #c0392b; /* Rojo Borgoña Fuerte */
        --color-finance-light: #fbe6e4; /* Rojo claro para hover */
        --color-success: #27ae60;
        --color-text-dark: #2c3e50;
        --color-border-subtle: #eeeeee;
    }

    /* Contenedor Principal */
    .report-finance-wrapper {
        padding: 50px 20px;
        max-width: 1400px;
        margin: 0 auto;
    }

    /* Encabezado y Botón Superior */
    .header-finance {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
        padding-bottom: 10px;
        border-bottom: 3px solid var(--color-finance);
    }

    .header-finance h3 {
        color: var(--color-finance);
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
    .card-finance {
        background-color: white;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        border: 1px solid var(--color-finance);
        overflow: hidden;
    }

    .card-body-finance {
        padding: 0; /* Quitamos padding aquí para que la tabla ocupe todo */
    }

    /* Tabla de Facturas */
    .table-finance {
        width: 100%;
        border-collapse: collapse;
    }

    .table-finance thead {
        background-color: var(--color-finance);
    }

    .table-finance th {
        color: white;
        padding: 15px;
        text-align: left;
        font-weight: 600;
        border: none !important;
    }

    .table-finance tbody tr {
        border-bottom: 1px solid var(--color-border-subtle);
        transition: background-color 0.2s ease;
    }

    .table-finance tbody tr:hover {
        background-color: var(--color-finance-light); /* Resaltado con color Rojo claro */
    }

    .table-finance td {
        padding: 15px;
        vertical-align: middle;
        color: var(--color-text-dark);
        border: none !important;
    }
    
    /* Fila de Totales */
    .table-finance tfoot {
        background-color: #f7f9f9;
        border-top: 2px solid var(--color-finance);
    }

    .table-finance tfoot td {
        padding: 15px;
        font-size: 1.1rem;
    }


    /* Estilos de Badges (Estado) */
    .badge-finance {
        padding: 5px 10px;
        border-radius: 4px;
        font-size: 0.85rem;
        font-weight: 700;
        text-transform: uppercase;
        display: inline-block;
    }

    .bg-pagado { background-color: var(--color-success); color: white; }
    .bg-pendiente { background-color: var(--color-finance); color: white; }

    /* Texto Importante */
    .text-finance-accent { color: var(--color-finance); }
    .text-primary-doc { color: var(--color-primary-doc); }
    .text-success-doc { color: var(--color-success); }
    .text-muted-doc { color: #7f8c8d; }
    
    /* Alerta de Sin Resultados */
    .alert-info-doc {
        background-color: #d1ecf1;
        color: #0c5460;
        border: 1px solid #bee5eb;
        border-radius: 8px;
        padding: 20px;
        text-align: center;
    }

    .alert-info-doc h4 {
        color: #0c5460;
        margin-bottom: 10px;
    }

</style>

<div class="report-finance-wrapper">
    <div class="header-finance">
        <h3><i class="fas fa-file-invoice-dollar"></i> Reporte de Facturación Filtrado</h3>
        <a href="{{ route('busquedas.index') }}" class="btn-search-back">
            <i class="fas fa-arrow-left"></i> Nueva Búsqueda
        </a>
    </div>

    <div class="card-finance">
        <div class="card-body-finance">
            @if(count($resultados) > 0)
                <div class="table-responsive">
                    <table class="table-finance">
                        <thead>
                            <tr>
                                <th># Factura</th>
                                <th>Fecha Emisión</th>
                                <th>Paciente Facturado</th>
                                <th>Seguro / Cobertura</th>
                                <th>Estado</th>
                                <th class="text-end">Monto Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($resultados as $fila)
                            <tr>
                                <td class="fw-bold text-finance-accent">FAC-{{ str_pad($fila->idFac, 6, '0', STR_PAD_LEFT) }}</td>
                                <td>{{ $fila->fechaEmisionFac }}</td>
                                <td>{{ $fila->Paciente }}</td>
                                <td>
                                    @if($fila->Seguro == 'Particular')
                                        <span class="text-muted-doc"><i class="fas fa-user"></i> Particular</span>
                                    @else
                                        <span class="text-primary-doc"><i class="fas fa-building"></i> {{ $fila->Seguro }}</span>
                                    @endif
                                </td>
                                <td>
                                    @if($fila->estadoPago == 'pagado')
                                        <span class="badge-finance bg-pagado">PAGADO</span>
                                    @else
                                        <span class="badge-finance bg-pendiente">PENDIENTE</span>
                                    @endif
                                </td>
                                <td class="text-end fw-bold fs-5 text-finance-accent">
                                    S/. {{ number_format($fila->montoTotal, 2) }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot class="table-light">
                            <tr>
                                <td colspan="5" class="text-end fw-bold">TOTAL EN ESTE REPORTE:</td>
                                <td class="text-end fw-bold fs-5 text-finance-accent">
                                    S/. {{ number_format(collect($resultados)->sum('montoTotal'), 2) }}
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            @else
                <div class="alert-info-doc" role="alert">
                    <h4 class="alert-heading"><i class="fas fa-search-dollar"></i> Sin Coincidencias</h4>
                    <p>No existen facturas con el estado y monto mínimo especificados.</p>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection