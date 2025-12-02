@extends('layouts.app')

@section('content')
<style>
    /* 🎨 Variables de Estilo */
    :root {
        --color-primary-doc: #1a5276; /* Azul Oscuro Profesional */
        --color-accent: #4a90e2; /* Azul Claro para acento */
        --color-hover-bg: #e8f4fd; /* Fondo de hover muy claro */
        --color-text-dark: #263238;
        --color-border-subtle: #eeeeee;
    }

    /* Contenedor principal (simula un wrapper limpio) */
    .list-wrapper {
        padding: 40px;
        max-width: 1200px;
        margin: 0 auto;
    }

    /* Título */
    h2 {
        color: var(--color-text-dark);
        border-bottom: 3px solid var(--color-accent);
        padding-bottom: 10px;
        margin-bottom: 30px;
        font-size: 2.2rem;
        font-weight: 700;
    }

    /* Tabla Personalizada */
    .table-doc {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        border-radius: 8px; /* Bordes redondeados */
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
        background-color: #fcfcfc; /* Alternar colores de fila sutilmente */
    }

    .table-doc tbody tr:hover {
        background-color: var(--color-hover-bg); /* Resaltar fila al pasar el mouse */
        cursor: default;
    }

    .table-doc td {
        padding: 15px;
        vertical-align: middle;
        color: var(--color-text-dark);
        border: none;
    }

    /* Colores de Estado (Ejemplo básico, puedes expandir esto) */
    .status-badge {
        display: inline-block;
        padding: 5px 10px;
        border-radius: 15px;
        font-size: 0.85rem;
        font-weight: 600;
        text-transform: uppercase;
        white-space: nowrap;
    }

    /* Estilos basados en texto del estado (requiere más lógica Blade si usas IDs) */
    .status-PENDIENTE {
        background-color: #ffcc80; /* Naranja claro */
        color: #e65100; /* Naranja oscuro */
    }
    .status-COMPLETADA {
        background-color: #c8e6c9; /* Verde claro */
        color: #388e3c; /* Verde oscuro */
    }
    .status-CANCELADA {
        background-color: #ffcdd2; /* Rojo claro */
        color: #c62828; /* Rojo oscuro */
    }

</style>

<div class="list-wrapper">
    <h2>Listado de Citas</h2>

    <table class="table-doc">
        <thead>
            <tr>
                <th>ID</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Paciente</th>
                <th>Médico</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
        @foreach($citas as $c)
            <tr>
                <td>{{ $c->idCit }}</td>
                <td>{{ $c->fechaCit }}</td>
                <td>{{ $c->horaCit }}</td>
                <td>{{ $c->paciente->nombresPacient }} {{ $c->paciente->apellidosPacient }}</td>
                <td>{{ $c->medico->nombresMedic }} {{ $c->medico->apellidosMedic }}</td>
                <td>
                    {{-- Lógica para asignar clase de estado basada en el valor. Usar UPPERCASE para coincidir con CSS --}}
                    @php
                        $estadoClass = strtoupper($c->estadoCit);
                    @endphp
                    <span class="status-badge status-{{ $estadoClass }}">
                        {{ $c->estadoCit }}
                    </span>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection