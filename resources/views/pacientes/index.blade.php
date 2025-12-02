@extends('layouts.app')

@section('content')

<style>
    /* 🎨 Variables de Color */
    :root {
        --color-accent: #009688; /* Verde Teal, asociado a la salud */
        --color-light-hover: #e0f2f1;
        --color-text-dark: #263238;
        --color-card-shadow: rgba(0, 150, 136, 0.1); /* Sombra sutil con acento */
    }

    /* Estilos Generales del Contenido */
    .content-wrapper {
        padding: 50px 20px;
        max-width: 1200px; /* Aumentar el ancho para mejor visualización de tablas */
        margin: 0 auto;
        background-color: #ffffff;
        border-radius: 12px;
        box-shadow: 0 8px 20px var(--color-card-shadow); /* Sombra más suave */
    }

    /* Título */
    h2 {
        color: var(--color-text-dark);
        border-bottom: 3px solid var(--color-accent);
        padding-bottom: 12px;
        margin-bottom: 30px;
        font-size: 2.2rem;
        font-weight: 700;
    }

    /* Tabla Personalizada */
    .table-custom {
        width: 100%;
        border-collapse: collapse;
        margin-top: 25px;
        border-radius: 8px; /* Bordes redondeados en la tabla */
        overflow: hidden; /* Necesario para que el border-radius se aplique */
    }

    .table-custom thead th {
        background-color: var(--color-accent); /* Fondo de encabezado con color de acento */
        color: white;
        padding: 15px;
        text-align: left;
        font-weight: 600;
        border-bottom: none;
    }

    .table-custom tbody tr {
        border-bottom: 1px solid #eeeeee;
        transition: background-color 0.2s ease;
    }

    .table-custom tbody tr:nth-child(even) {
        background-color: #f7f7f7; /* Alternar colores de fila */
    }

    .table-custom tbody tr:hover {
        background-color: var(--color-light-hover); /* Resaltar fila con color de acento claro */
        cursor: default;
    }

    .table-custom td {
        padding: 15px;
        vertical-align: middle;
        color: var(--color-text-dark);
    }

    /* Estilos de Botones Personalizados */
    .btn {
        padding: 9px 18px;
        border-radius: 25px; /* Botones con esquinas de píldora */
        text-decoration: none;
        transition: all 0.3s ease;
        margin-right: 8px;
        font-weight: 600;
        border: none;
        box-shadow: 0 3px 8px rgba(0, 0, 0, 0.1);
    }

    /* Botón Nuevo Paciente (Acento principal) */
    .btn-primary {
        background-color: var(--color-accent);
        color: white;
    }

    .btn-primary:hover {
        background-color: #00796b;
        transform: translateY(-2px); /* Efecto de levantamiento */
        box-shadow: 0 6px 15px rgba(0, 150, 136, 0.4);
    }

    /* Botón Editar */
    .btn-warning {
        background-color: #ffb300; /* Amarillo/Ámbar */
        color: white;
    }
    .btn-warning:hover {
        background-color: #ff9800;
        box-shadow: 0 4px 10px rgba(255, 179, 0, 0.3);
    }

    /* Botón Eliminar */
    .btn-danger {
        background-color: #e53935; /* Rojo */
        color: white;
    }
    .btn-danger:hover {
        background-color: #c62828;
        box-shadow: 0 4px 10px rgba(229, 57, 53, 0.3);
    }

    /* Alineación de acciones */
    .actions-cell {
        min-width: 180px;
        text-align: right;
    }
    /* Estilo para los botones en línea dentro de la celda */
    .actions-cell .btn-sm {
        padding: 6px 12px;
        font-size: 0.85rem;
    }
</style>

<div class="content-wrapper">
    <h2>Pacientes</h2>

    <a href="{{ route('pacientes.create') }}" class="btn btn-primary mb-4">
        <i class="fas fa-user-plus me-2"></i> Nuevo Paciente
    </a>

    <table class="table table-custom">
        <thead>
            <tr>
                <th>ID</th><th>Nombres</th><th>Apellidos</th><th>DNI</th><th class="actions-cell">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pacientes as $p)
            <tr>
                <td>{{ $p->idPacient }}</td>
                <td>{{ $p->nombresPacient }}</td>
                <td>{{ $p->apellidosPacient }}</td>
                <td>{{ $p->dniPacient }}</td>
                <td class="actions-cell">
                    <a href="{{ route('pacientes.edit',$p->idPacient) }}" class="btn btn-warning btn-sm">Editar</a>

                    <form action="{{ route('pacientes.destroy',$p->idPacient) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm">Eliminar</button>
                    </form>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection