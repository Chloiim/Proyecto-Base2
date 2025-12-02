@extends('layouts.app')

@section('content')
<style>
    /* 🎨 Variables de Color y Estilo */
    :root {
        --color-primary-doc: #1a5276; /* Azul Oscuro (profesional) */
        --color-accent-edit: #f5a623; /* Naranja/Ámbar para edición */
        --color-bg-light: #f9f7f4; /* Fondo muy claro con toque cálido */
        --color-text-dark: #34495e;
        --color-border-light: #e0e0e0;
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
        max-width: 700px; /* Ancho cómodo para el formulario */
        background-color: #ffffff;
        border-radius: 16px; 
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }

    /* Encabezado de Edición */
    .card-header-edit {
        background-color: var(--color-accent-edit); /* Naranja/Ámbar */
        color: var(--color-text-dark); /* Texto oscuro para contraste */
        padding: 20px 30px;
        font-size: 1.5rem;
        font-weight: 700;
        border-bottom: 5px solid #e09300; /* Borde más oscuro */
    }

    /* Cuerpo */
    .card-body-doc {
        padding: 30px;
    }

    /* ⚙️ Layout Responsivo de Columnas (Flexbox simplificado para este layout) */
    .form-row-custom {
        display: flex;
        flex-wrap: wrap;
        margin: 0 -10px; /* Compensa el padding interno de las columnas */
    }

    .form-col-6 {
        width: 50%;
        padding: 0 10px;
        box-sizing: border-box;
    }
    
    @media (max-width: 768px) {
        .form-col-6 {
            width: 100%;
        }
    }

    /* Grupo de Campo (Etiqueta + Input) */
    .form-group-doc {
        margin-bottom: 25px;
        width: 100%; /* Asegura que ocupe todo el espacio de su columna */
    }

    /* Etiqueta */
    .form-label-doc {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
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
        border-color: var(--color-accent-edit);
        box-shadow: 0 0 0 4px rgba(245, 166, 35, 0.2); /* Anillo de enfoque ámbar */
        outline: none;
    }

    /* Texto Pequeño Informativo */
    .text-muted-custom {
        display: block;
        margin-bottom: 25px;
        color: #7f8c8d;
        font-style: italic;
    }


    /* 🚀 Botones */
    .button-group-doc {
        display: flex;
        gap: 15px;
        margin-top: 40px;
    }

    .btn-custom {
        padding: 12px 30px;
        border-radius: 50px;
        font-weight: 700;
        font-size: 1rem;
        cursor: pointer;
        border: none;
        transition: all 0.3s ease;
        text-decoration: none;
        text-align: center;
        flex-grow: 1; /* Permite que ambos botones ocupen el ancho disponible */
    }

    /* Botón Actualizar (Primario) */
    .btn-update {
        background-color: var(--color-accent-edit);
        color: var(--color-text-dark);
        box-shadow: 0 4px 15px rgba(245, 166, 35, 0.5);
    }

    .btn-update:hover {
        background-color: #e09300;
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(245, 166, 35, 0.6);
    }

    /* Botón Cancelar (Secundario) */
    .btn-cancel {
        background-color: transparent;
        color: var(--color-primary-doc);
        border: 2px solid var(--color-primary-doc);
        box-shadow: none;
    }

    .btn-cancel:hover {
        background-color: var(--color-primary-doc);
        color: white;
    }
</style>

<div class="form-page-wrapper">
    <div class="doctor-form-card">
        <div class="card-header-edit">
            Editar Médico
        </div>
        <div class="card-body-doc">
            <form action="{{ route('medicos.update', $medico->idMedic) }}" method="POST">
                @csrf
                @method('PUT') 
                
                <div class="form-row-custom">
                    <div class="form-col-6">
                        <div class="form-group-doc">
                            <label class="form-label-doc">Nombres</label>
                            <input type="text" class="form-input-doc" name="nombres" value="{{ $medico->nombresMedic }}" required>
                        </div>
                    </div>
                    <div class="form-col-6">
                        <div class="form-group-doc">
                            <label class="form-label-doc">Apellidos</label>
                            <input type="text" class="form-input-doc" name="apellidos" value="{{ $medico->apellidosMedic }}" required>
                        </div>
                    </div>
                </div>

                <div class="form-row-custom">
                    <div class="form-col-6">
                        <div class="form-group-doc">
                            <label class="form-label-doc">DNI</label>
                            <input type="text" class="form-input-doc" name="dni" value="{{ $medico->dniMedic }}" maxlength="8" required>
                        </div>
                    </div>
                    <div class="form-col-6">
                        <div class="form-group-doc">
                            <label class="form-label-doc">Teléfono</label>
                            <input type="text" class="form-input-doc" name="telefono" value="{{ $medico->telefonoMedic }}" maxlength="9" required>
                        </div>
                    </div>
                </div>

                <div class="form-row-custom">
                    <div class="form-col-6">
                        <div class="form-group-doc">
                            <label class="form-label-doc">Especialidad</label>
                            <input type="text" class="form-input-doc" name="especialidad" value="{{ $medico->especialidadMedic }}" required>
                        </div>
                    </div>
                    <div class="form-col-6">
                        <div class="form-group-doc">
                            <label class="form-label-doc">Email</label>
                            <input type="email" class="form-input-doc" name="email" value="{{ $medico->emailMedic }}">
                        </div>
                    </div>
                </div>

                <div class="form-group-doc">
                    <span class="text-muted-custom">Colegiatura: **{{ $medico->colegiaturaMedic }}** (Este campo no es editable después del registro inicial)</span>
                </div>

                <div class="button-group-doc">
                    <button type="submit" class="btn-custom btn-update">Actualizar Datos</button>
                    <a href="{{ route('medicos.index') }}" class="btn-custom btn-cancel">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection