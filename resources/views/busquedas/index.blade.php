@extends('layouts.app')

@section('content')
<style>
    /* 🎨 Variables de Estilo */
    :root {
        --color-bg-light: #f4f7f9;
        --color-text-dark: #2c3e50;
        --color-border-subtle: #dfe4e8;
        
        /* Colores de Filtro */
        --color-citas: #4a90e2;      /* Azul */
        --color-historial: #43a047;  /* Verde */
        --color-facturas: #e53935;   /* Rojo */
    }

    /* Contenedor Principal */
    .search-wrapper {
        background-color: var(--color-bg-light);
        padding: 60px 20px;
        min-height: 100vh;
    }

    /* Título */
    .search-title {
        color: var(--color-text-dark);
        text-align: center;
        margin-bottom: 50px;
        font-size: 2.5rem;
        font-weight: 700;
        border-bottom: 3px solid var(--color-text-dark);
        display: inline-block;
        padding-bottom: 10px;
    }

    /* Grid de Filtros */
    .filter-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 30px;
        max-width: 1200px;
        margin: 0 auto;
    }

    /* Tarjeta de Filtro */
    .filter-card {
        background-color: white;
        border-radius: 12px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        height: 100%;
        overflow: hidden;
        transition: transform 0.3s ease;
    }

    .filter-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 25px rgba(0, 0, 0, 0.15);
    }

    /* Encabezado de Tarjeta */
    .card-header-filter {
        padding: 15px 20px;
        color: white;
        font-size: 1.25rem;
        font-weight: 600;
        border-bottom: 3px solid rgba(255, 255, 255, 0.3);
    }
    
    /* Colores Específicos de Encabezado */
    .header-citas { background-color: var(--color-citas); }
    .header-historial { background-color: var(--color-historial); }
    .header-facturas { background-color: var(--color-facturas); }

    /* Cuerpo de la Tarjeta */
    .card-body-filter {
        padding: 25px;
    }
    
    /* Grupo de Campo */
    .form-group-filter {
        margin-bottom: 20px;
    }

    /* Etiqueta */
    .form-group-filter label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        color: var(--color-text-dark);
        font-size: 0.95rem;
    }

    /* Input y Select */
    .form-input-filter {
        width: 100%;
        padding: 10px 15px;
        border: 2px solid var(--color-border-subtle);
        border-radius: 8px;
        font-size: 1rem;
        box-sizing: border-box;
        transition: border-color 0.3s, box-shadow 0.3s;
    }

    .form-input-filter:focus {
        border-color: var(--color-citas); /* Por defecto azul al enfocar */
        box-shadow: 0 0 0 3px rgba(74, 144, 226, 0.2);
        outline: none;
    }
    
    /* Botones de Filtro */
    .btn-filter {
        padding: 12px 0;
        border-radius: 8px;
        font-weight: 700;
        font-size: 1rem;
        cursor: pointer;
        border: none;
        transition: all 0.3s ease;
        margin-top: 10px;
        color: white;
    }
    
    .btn-filter:hover {
        transform: translateY(-2px);
        opacity: 0.9;
    }

    /* Colores Específicos de Botón */
    .btn-citas { background-color: var(--color-citas); }
    .btn-historial { background-color: var(--color-historial); }
    .btn-facturas { background-color: var(--color-facturas); }

    .btn-citas:focus, .btn-citas:hover { box-shadow: 0 5px 15px rgba(74, 144, 226, 0.4); }
    .btn-historial:focus, .btn-historial:hover { box-shadow: 0 5px 15px rgba(67, 160, 71, 0.4); }
    .btn-facturas:focus, .btn-facturas:hover { box-shadow: 0 5px 15px rgba(229, 57, 53, 0.4); }

</style>

<div class="search-wrapper">
    <div style="text-align: center;">
        <h2 class="search-title">Centro de Búsquedas Avanzadas</h2>
    </div>

    <div class="filter-grid">
        
        <div class="filter-card">
            <div class="card-header-filter header-citas">1. Filtrar Citas</div>
            <div class="card-body-filter">
                <form action="{{ route('busquedas.citas') }}" method="GET">
                    <div class="form-group-filter">
                        <label>Desde:</label>
                        <input type="date" name="fecha_inicio" class="form-input-filter" required>
                    </div>
                    <div class="form-group-filter">
                        <label>Hasta:</label>
                        <input type="date" name="fecha_fin" class="form-input-filter" required>
                    </div>
                    <div class="form-group-filter">
                        <label>Especialidad:</label>
                        <select name="especialidad" class="form-input-filter">
                            @foreach($especialidades as $esp)
                                <option value="{{ $esp->especialidadMedic }}">{{ $esp->especialidadMedic }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn-filter btn-citas w-100">Buscar Citas</button>
                </form>
            </div>
        </div>

        <div class="filter-card">
            <div class="card-header-filter header-historial">2. Buscar Historial</div>
            <div class="card-body-filter">
                <form action="{{ route('busquedas.historial') }}" method="GET">
                    <div class="form-group-filter">
                        <label>DNI Paciente:</label>
                        <input type="text" name="dni" class="form-input-filter" placeholder="Ej: 12345678" maxlength="8" required>
                    </div>
                    <div class="form-group-filter">
                        <label>Apellido Médico (Opcional):</label>
                        <input type="text" name="medico" class="form-input-filter" placeholder="Ej: Perez">
                    </div>
                    <div class="form-group-filter" style="height: 20px;"></div> 
                    <button type="submit" class="btn-filter btn-historial w-100">Consultar Historial</button>
                </form>
            </div>
        </div>

        <div class="filter-card">
            <div class="card-header-filter header-facturas">3. Filtrar Facturas</div>
            <div class="card-body-filter">
                <form action="{{ route('busquedas.facturas') }}" method="GET">
                    <div class="form-group-filter">
                        <label>Estado de Pago:</label>
                        <select name="estado" class="form-input-filter">
                            <option value="pendiente">Pendiente</option>
                            <option value="pagado">Pagado</option>
                        </select>
                    </div>
                    <div class="form-group-filter">
                        <label>Monto Mínimo:</label>
                        <input type="number" name="monto" class="form-input-filter" value="0" min="0">
                    </div>
                    <div class="form-group-filter" style="height: 20px;"></div> 
                    <button type="submit" class="btn-filter btn-facturas w-100">Filtrar Finanzas</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection