@extends('layouts.app')

@section('content')
<style>
    /* 🎨 Variables de Estilo */
    :root {
        --color-primary-doc: #1a5276; /* Azul Oscuro (profesional) */
        --color-accent: #009688; /* Verde Teal para acentos y éxito */
        --color-hover-bg: #e0f2f1; /* Fondo de hover claro (Teal) */
        --color-text-dark: #263238;
        --color-border-subtle: #eeeeee;
        --color-shadow: rgba(0, 0, 0, 0.1);
    }

    /* Contenedor Principal */
    .container-custom {
        padding-top: 50px;
        padding-bottom: 50px;
        max-width: 1300px;
        margin: auto;
    }

    /* Título y Botón Superior */
    .header-doc {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
        border-bottom: 3px solid var(--color-primary-doc);
        padding-bottom: 15px;
    }

    .header-doc h2 {
        color: var(--color-text-dark);
        font-size: 2.5rem;
        font-weight: 700;
        margin: 0;
    }

    /* Botón Nuevo Médico */
    .btn-new-doc {
        background-color: var(--color-accent);
        color: white;
        border: none;
        padding: 10px 25px;
        border-radius: 25px; /* Botón de píldora */
        font-weight: 600;
        transition: all 0.3s ease;
        text-decoration: none;
        box-shadow: 0 4px 10px rgba(0, 150, 136, 0.4);
    }

    .btn-new-doc:hover {
        background-color: #00796b;
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(0, 150, 136, 0.6);
    }

    /* Alerta de Éxito */
    .alert-success-doc {
        background-color: #e8f5e9; /* Verde muy claro */
        color: #2e7d32; /* Texto verde oscuro */
        border: 1px solid #c8e6c9;
        border-radius: 8px;
        padding: 15px;
        margin-bottom: 25px;
    }

    /* Tarjeta que contiene la tabla */
    .card-doc {
        background-color: white;
        border-radius: 12px;
        box-shadow: 0 8px 20px var(--color-shadow);
        overflow-x: auto; /* Para tablas grandes en móvil */
        border: none;
    }

    /* Estilos de la Tabla */
    .table-doc {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 0;
    }

    .table-doc thead {
        background-color: var(--color-primary-doc);
    }

    .table-doc th {
        color: white;
        padding: 15px;
        text-align: left;
        font-weight: 600;
        border: none !important;
    }

    .table-doc tbody tr {
        border-bottom: 1px solid var(--color-border-subtle);
        transition: background-color 0.2s ease;
    }

    .table-doc tbody tr:hover {
        background-color: var(--color-hover-bg); /* Resaltado con color Teal */
    }

    .table-doc td {
        padding: 15px;
        vertical-align: middle;
        color: var(--color-text-dark);
        border: none !important;
    }
    
    /* Columna de Acciones */
    .actions-cell-doc {
        min-width: 180px;
        text-align: center;
    }

    /* Botones de Acción */
    .btn-action-doc {
        padding: 8px 15px;
        border-radius: 8px;
        font-size: 0.9rem;
        margin: 0 4px;
        font-weight: 600;
        transition: background-color 0.2s ease, transform 0.1s;
    }
    
    .btn-action-doc:hover {
        transform: translateY(-1px);
    }

    .btn-warning-doc {
        background-color: #ffb300;
        color: white;
    }
    .btn-danger-doc {
        background-color: #e53935;
        color: white;
    }
    
    /* Paginación */
    .pagination-doc {
        padding: 20px;
        display: flex;
        justify-content: center;
    }
    
    .pagination-doc .page-link {
        color: var(--color-primary-doc);
        border-radius: 50%;
        margin: 0 5px;
        transition: all 0.3s;
    }
    
    .pagination-doc .page-item.active .page-link {
        background-color: var(--color-secondary-doc);
        border-color: var(--color-secondary-doc);
        color: white;
        transform: scale(1.1);
    }
</style>

<div class="container-custom">
    <div class="header-doc">
        <h2>Gestión de Médicos</h2>
        <a href="{{ route('medicos.create') }}" class="btn-new-doc">
            <i class="fas fa-plus me-2"></i> Nuevo Médico
        </a>
    </div>

    @if(session('success'))
        <div class="alert-success-doc">{{ session('success') }}</div>
    @endif

    <div class="card-doc">
        <div class="card-body">
            <table class="table-doc">
                <thead>
                    <tr>
                        <th>DNI</th>
                        <th>Nombre Completo</th>
                        <th>Especialidad</th>
                        <th>Teléfono</th>
                        <th class="actions-cell-doc">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($medicos as $medico)
                    <tr>
                        <td>{{ $medico->dniMedic }}</td>
                        <td>{{ $medico->nombresMedic }} {{ $medico->apellidosMedic }}</td>
                        <td>{{ $medico->especialidadMedic }}</td>
                        <td>{{ $medico->telefonoMedic }}</td>
                        <td class="actions-cell-doc">
                            <a href="{{ route('medicos.edit', $medico->idMedic) }}" class="btn-action-doc btn-warning-doc">
                                <i class="fas fa-edit"></i> Editar
                            </a>

                            <form action="{{ route('medicos.destroy', $medico->idMedic) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Estás seguro de eliminar este médico?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-action-doc btn-danger-doc">
                                    <i class="fas fa-trash"></i> Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
            {{-- La paginación de Laravel necesita clases CSS específicas de Bootstrap para verse bien. 
                 Aquí se envuelve para un estilo base, pero puedes necesitar más CSS de paginación de Bootstrap o Tailwind si lo usas. --}}
            <div class="pagination-doc">
                {{ $medicos->links() }}
            </div>
        </div>
    </div>
</div>
@endsection