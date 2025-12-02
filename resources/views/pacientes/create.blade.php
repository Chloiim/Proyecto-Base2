@extends('layouts.app')

@section('content')
<style>
    /* 1. Paleta de Colores y Tipografía Consistente */
    :root {
        --color-primary: #0077b6; /* Azul Corporativo */
        --color-accent: #00c2a8; /* Cian/Verde de Acento */
        --color-background: #f5f8fa; /* Fondo muy claro */
        --color-text: #333333;
        --color-shadow: rgba(0, 51, 102, 0.1);
    }

    /* 2. Contenedor Principal (Fondo y Centrado) */
    .corporate-background {
        min-height: 100vh;
        background-color: var(--color-background);
        padding: 40px 20px;
        display: flex;
        justify-content: center;
    }

    /* 3. Tarjeta del Formulario (Focus y Limpieza) */
    .form-card-creative {
        width: 100%;
        max-width: 550px;
        background-color: #ffffff;
        border-radius: 12px;
        box-shadow: 0 10px 30px var(--color-shadow);
        padding: 40px;
    }

    /* 4. Título */
    .form-card-creative h2 {
        color: var(--color-primary);
        text-align: center;
        margin-bottom: 30px;
        font-size: 1.8rem;
        font-weight: 700;
        border-bottom: 3px solid var(--color-accent); /* Línea de acento */
        padding-bottom: 10px;
    }

    /* 5. Grupos y Etiquetas */
    .form-group-creative {
        margin-bottom: 25px;
    }

    .form-group-creative label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        color: var(--color-text);
        font-size: 0.95rem;
    }

    /* 6. Campos de Entrada */
    .form-input-creative {
        width: 100%;
        padding: 12px 15px;
        border: 1px solid #e0e0e0;
        border-radius: 8px;
        font-size: 1rem;
        box-sizing: border-box;
        transition: border-color 0.3s, box-shadow 0.3s;
    }

    .form-input-creative:focus {
        border-color: var(--color-primary);
        box-shadow: 0 0 0 3px rgba(0, 119, 182, 0.15);
        outline: none;
        background-color: #f9fcff;
    }

    /* 7. Botón de Acción (Guardar) */
    .btn-action-creative {
        display: block;
        width: 100%;
        padding: 14px;
        font-size: 1.1rem;
        font-weight: bold;
        color: white;
        background-color: var(--color-accent); /* Color de acento */
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: background-color 0.3s, transform 0.1s;
        margin-top: 30px;
        letter-spacing: 0.5px;
        box-shadow: 0 4px 10px rgba(0, 194, 168, 0.3);
    }

    .btn-action-creative:hover {
        background-color: #009984; /* Tono más oscuro al pasar el mouse */
        transform: translateY(-1px);
    }
</style>

<div class="corporate-background">
    <div class="form-card-creative">
        <h2>Registrar Paciente</h2>

        <form action="{{ route('pacientes.store') }}" method="POST">
            @csrf

            <div class="form-group-creative">
                <label>Nombres</label>
                <input type="text" name="nombresPacient" class="form-input-creative" required>
            </div>

            <div class="form-group-creative">
                <label>Apellidos</label>
                <input type="text" name="apellidosPacient" class="form-input-creative" required>
            </div>

            <div class="form-group-creative">
                <label>DNI</label>
                <input type="text" name="dniPacient" class="form-input-creative" required>
            </div>

            <button type="submit" class="btn-action-creative">Guardar</button>
        </form>
    </div>
</div>
@endsection