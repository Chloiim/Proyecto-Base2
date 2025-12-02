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
        --color-warning: #ffb300;
        --color-danger: #e53935;
    }

    /* Contenedor principal */
    .list-wrapper {
        padding: 40px;
        max-width: 1300px;
        margin: 0 auto;
    }

    /* Título */
    h2 {
        color: var(--color-primary-doc);
        border-bottom: 3px solid var(--color-health);
        padding-bottom: 10px;
        margin-bottom: 25px;
        font-size: 2.2rem;
        font-weight: 700;
    }

    /* Botón Nueva Consulta */
    .btn-new-consult {
        background-color: var(--color-health);
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 25px; /* Botón de píldora */
        font-weight: 600;
        transition: all 0.3s ease;
        text-decoration: none;
        box-shadow: 0 4px 10px rgba(67, 160, 71, 0.4);
        margin-bottom: 20px;
        display: inline-block;
    }

    .btn-new-consult:hover {
        background-color: #2e7d32;
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(67, 160, 71, 0.6);
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
        background-color: var(--color-health-light);
        cursor: default;
    }

    .table-doc td {
        padding: 15px;
        vertical-align: top;
        color: var(--color-text-dark);
        border: none;
        max-width: 300px; /* Limita el ancho de celdas largas */
    }

    /* Estilo para la columna de Diagnóstico */
    .diagnosis-cell {
        font-style: italic;
        color: #5a5a5a;
        font-size: 0.95rem;
        max-height: 50px; /* Limita la altura */
        overflow: hidden; /* Oculta el texto extra */
        text-overflow: ellipsis;
        display: block;
        white-space: nowrap;
    }
    
    /* Botones de Acción */
    .actions-cell {
        min-width: 120px;
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
    <h2>Consultas</h2>

    <a href="{{ route('consultas.create') }}" class="btn-new-consult">
        Nueva Consulta
    </a>

    <table class="table-doc">
        <thead>
            <tr>
                <th>ID</th>
                <th style="width: 100px;">Fecha</th>
                <th style="width: 35%;">Diagnóstico</th>
                <th>Paciente</th>
                <th>Médico</th>
                <th class="actions-cell">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($consultas as $c)
            <tr>
                <td>{{ $c->idConsult }}</td>
                <td>{{ $c->fechaConsult }}</td>
                <td>
                    <span class="diagnosis-cell">
                        {{ $c->diagnosticoConsult }}
                    </span>
                </td>
                <td class="fw-bold">{{ $c->cita->paciente->nombresPacient }} {{ $c->cita->paciente->apellidosPacient }}</td>
                <td>{{ $c->medico->nombresMedic }} {{ $c->medico->apellidosMedic }}</td>
                <td class="actions-cell">
                    <a href="{{ route('consultas.edit', $c) }}" class="btn-action-edit">Editar</a>
                    <form action="{{ route('consultas.destroy',$c->idConsult) }}" method="POST" style="display:inline;">
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