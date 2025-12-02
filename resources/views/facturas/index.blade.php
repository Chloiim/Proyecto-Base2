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
        --color-warning: #ffb300;
        --color-danger: #e53935;
    }

    /* Contenedor principal */
    .list-wrapper {
        padding: 40px;
        max-width: 1400px;
        margin: 0 auto;
    }

    /* Título */
    h2 {
        color: var(--color-primary-doc);
        border-bottom: 3px solid var(--color-finance);
        padding-bottom: 10px;
        margin-bottom: 25px;
        font-size: 2.2rem;
        font-weight: 700;
    }

    /* Botón Nueva Factura */
    .btn-new-invoice {
        background-color: var(--color-finance);
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 25px; /* Botón de píldora */
        font-weight: 600;
        transition: all 0.3s ease;
        text-decoration: none;
        box-shadow: 0 4px 10px rgba(192, 57, 43, 0.4);
        margin-bottom: 20px;
        display: inline-block;
    }

    .btn-new-invoice:hover {
        background-color: #a93226;
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(192, 57, 43, 0.6);
    }

    /* Tabla Personalizada */
    .table-doc {
        width: 100%;
        border-collapse: collapse;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
    }

    .table-doc thead {
        background-color: var(--color-primary-doc);
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
        cursor: default;
    }

    .table-doc td {
        padding: 15px;
        vertical-align: top;
        color: var(--color-text-dark);
        border: none;
        max-width: 250px;
    }
    
    /* Columna de Monto */
    .monto-cell {
        font-weight: 700;
        color: var(--color-finance);
        font-size: 1.1rem;
    }

    /* Estilo para la columna de Consulta (diagnóstico) */
    .consulta-cell {
        font-style: italic;
        color: #5a5a5a;
        font-size: 0.95rem;
        max-height: 50px;
        overflow: hidden;
        text-overflow: ellipsis;
        display: block;
        white-space: nowrap;
    }
    
    /* Botones de Acción */
    .actions-cell {
        min-width: 140px;
        text-align: center;
    }
    
    .btn-action-edit, .btn-action-delete {
        padding: 6px 12px;
        border-radius: 8px;
        font-size: 0.85rem;
        font-weight: 600;
        transition: all 0.2s ease;
        margin: 0 2px;
    }

    .btn-action-edit {
        background-color: var(--color-warning);
        color: var(--color-text-dark);
        text-decoration: none;
    }
    .btn-action-delete {
        background-color: var(--color-danger);
        color: white;
        border: none;
    }

    .btn-action-edit:hover, .btn-action-delete:hover {
        transform: translateY(-1px);
    }
</style>

<div class="list-wrapper">
    <h2>Facturas</h2>

    <a href="{{ route('facturas.create') }}" class="btn-new-invoice">
        Nueva Factura
    </a>

    <table class="table-doc">
        <thead>
            <tr>
                <th>ID</th>
                <th>Fecha</th>
                <th>Monto</th>
                <th>Paciente</th>
                <th>Consulta Asociada</th>
                <th class="actions-cell">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($facturas as $f)
            <tr>
                <td>{{ $f->idFactura }}</td>
                <td>{{ $f->fechaFactura }}</td>
                <td class="monto-cell">S/. {{ number_format($f->montoFactura, 2) }}</td>
                <td class="fw-bold">{{ $f->paciente->nombresPacient }} {{ $f->paciente->apellidosPacient }}</td>
                <td>
                    <span class="consulta-cell">
                        {{ optional($f->consulta)->diagnosticoConsult }}
                    </span>
                </td>
                <td class="actions-cell">
                    <a href="{{ route('facturas.edit',$f->idFactura) }}" class="btn-action-edit">Editar</a>
                    <form action="{{ route('facturas.destroy',$f->idFactura) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button class="btn-action-delete">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection