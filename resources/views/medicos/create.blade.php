@extends('layouts.app')

@section('content')
<style>
    /* 🎨 Variables de Color y Estilo */
    :root {
        --color-primary-doc: #1a5276; /* Azul Oscuro (profesional) */
        --color-secondary-doc: #4a90e2; /* Azul Claro (acento) */
        --color-bg-light: #f4f7f9; /* Fondo muy claro */
        --color-text-dark: #34495e;
        --color-border-light: #dfe4e8;
    }

    /* 📄 Contenedor Principal y Fondo */
    .form-page-wrapper {
        background-color: var(--color-bg-light);
        padding: 60px 20px;
        display: flex;
        justify-content: center;
    }

    /* 🏷️ Tarjeta del Formulario */
    .doctor-form-card {
        width: 100%;
        max-width: 850px; /* Ancho cómodo para el diseño de múltiples columnas */
        background-color: #ffffff;
        border-radius: 16px; /* Bordes suaves */
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        transition: box-shadow 0.3s ease;
    }

    /* Encabezado */
    .card-header-doc {
        background-color: var(--color-primary-doc);
        color: white;
        padding: 20px 30px;
        font-size: 1.5rem;
        font-weight: 600;
        border-bottom: 5px solid var(--color-secondary-doc); /* Línea de acento */
    }

    /* Cuerpo */
    .card-body-doc {
        padding: 30px;
    }

    /* ⚙️ Layout Responsivo de Columnas (CSS Grid) */
    .form-grid-row {
        display: grid;
        gap: 20px; /* Espaciado entre columnas y filas */
    }

    /* Definición del layout de Grid para diferentes conjuntos de campos */
    .grid-2-col {
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    }
    .grid-3-col {
        grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
    }

    /* Grupo de Campo (Etiqueta + Input) */
    .form-group-doc {
        margin-bottom: 25px; /* Margen inferior extra para separación entre grupos */
    }

    /* Etiqueta */
    .form-label-doc {
        display: block;
        margin-bottom: 8px;
        font-weight: 700;
        color: var(--color-text-dark);
        font-size: 0.95rem;
    }

    /* Input y Select */
    .form-input-doc {
        width: 100%;
        padding: 12px 15px;
        border: 2px solid var(--color-border-light);
        border-radius: 8px;
        font-size: 1rem;
        box-sizing: border-box;
        background-color: #ffffff;
        transition: all 0.3s ease;
    }

    .form-input-doc:focus {
        border-color: var(--color-secondary-doc);
        box-shadow: 0 0 0 4px rgba(74, 144, 226, 0.2);
        outline: none;
    }

    /* 🚀 Botones */
    .button-group-doc {
        display: flex;
        gap: 15px;
        margin-top: 40px;
        justify-content: flex-end; /* Alinear botones a la derecha */
    }

    .btn-custom {
        padding: 12px 30px;
        border-radius: 50px; /* Botones de píldora */
        font-weight: 700;
        font-size: 1rem;
        cursor: pointer;
        border: none;
        transition: all 0.3s ease;
        text-decoration: none;
        text-align: center;
    }

    /* Botón Guardar (Primario) */
    .btn-save {
        background-color: var(--color-secondary-doc);
        color: white;
        box-shadow: 0 4px 15px rgba(74, 144, 226, 0.5);
    }

    .btn-save:hover {
        background-color: #3b7ad6;
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(74, 144, 226, 0.6);
    }

    /* Botón Cancelar (Secundario) */
    .btn-cancel {
        background-color: transparent;
        color: var(--color-primary-doc);
        border: 2px solid var(--color-primary-doc);
        box-shadow: none;
        line-height: initial; /* Necesario para que el padding funcione bien con el borde */
    }

    .btn-cancel:hover {
        background-color: var(--color-primary-doc);
        color: white;
    }

    /* Asegurar que el ancla se vea como un botón */
    .button-group-doc a {
        display: inline-block;
        line-height: normal;
    }
</style>

<div class="form-page-wrapper">
    <div class="doctor-form-card">
        <div class="card-header-doc">
            Registrar Nuevo Médico
        </div>
        <div class="card-body-doc">
            <form action="{{ route('medicos.store') }}" method="POST">
                @csrf
                
                <!-- Nombres y Apellidos (2 columnas) -->
                <div class="form-grid-row grid-2-col">
                    <div class="form-group-doc">
                        <label for="nombres" class="form-label-doc">Nombres</label>
                        <input type="text" class="form-input-doc" name="nombres" required>
                    </div>
                    <div class="form-group-doc">
                        <label for="apellidos" class="form-label-doc">Apellidos</label>
                        <input type="text" class="form-input-doc" name="apellidos" required>
                    </div>
                </div>

                <!-- DNI, Teléfono y Colegiatura (3 columnas) -->
                <div class="form-grid-row grid-3-col">
                    <div class="form-group-doc">
                        <label for="dni" class="form-label-doc">DNI</label>
                        <input type="text" class="form-input-doc" name="dni" maxlength="8" required>
                    </div>
                    <div class="form-group-doc">
                        <label for="telefono" class="form-label-doc">Teléfono</label>
                        <input type="text" class="form-input-doc" name="telefono" maxlength="9" required>
                    </div>
                    <div class="form-group-doc">
                        <label for="colegiatura" class="form-label-doc">Colegiatura</label>
                        <input type="text" class="form-input-doc" name="colegiatura" required>
                    </div>
                </div>

                <!-- Especialidad y Email (2 columnas) -->
                <div class="form-grid-row grid-2-col">
                    <div class="form-group-doc">
                        <label for="especialidad" class="form-label-doc">Especialidad</label>
                        <input type="text" class="form-input-doc" name="especialidad" required>
                    </div>
                    <div class="form-group-doc">
                        <label for="email" class="form-label-doc">Email</label>
                        <input type="email" class="form-input-doc" name="email">
                    </div>
                </div>

                <!-- Área Asignada (Campo completo) -->
                <div class="form-group-doc">
                    <label for="idArea" class="form-label-doc">Área Asignada</label>
                    <select name="idArea" class="form-input-doc" required>
                        <option value="">Seleccione un área...</option>
                        @foreach($areas as $area)
                            <option value="{{ $area->idAr }}">{{ $area->nombre_ar }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Botones -->
                <div class="button-group-doc">
                    <button type="submit" class="btn-custom btn-save">Guardar Médico</button>
                    <a href="{{ route('medicos.index') }}" class="btn-custom btn-cancel">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection