@extends('layouts.app')

@section('content')
<style>
    /* Variables de Color para fácil edición */
    :root {
        --color-primary: #6c5ce7; /* Morado Vibrante para acento */
        --color-light-bg: #f5f3ff;
        --color-dark-text: #2c3e50;
        --color-border-subtle: #dfe6e9;
    }

    /* 🎨 Estilos para el Contenedor Principal (Fondo Degradado) */
    .form-container-wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 50px 20px;
        /* Fondo con degradado sutil */
        background: linear-gradient(135deg, var(--color-light-bg) 0%, #e8edf7 100%);
        min-height: 100vh;
    }

    /* 🏷️ Estilos para el Formulario (Tarjeta Flotante) */
    .form-card {
        width: 100%;
        max-width: 450px; /* Un poco más estrecho para énfasis */
        background-color: #ffffff;
        border-radius: 15px; /* Bordes más redondeados */
        box-shadow: 0 12px 25px rgba(0, 0, 0, 0.15); /* Sombra más pronunciada */
        padding: 40px;
        transition: transform 0.3s ease;
    }
    
    .form-card:hover {
        transform: translateY(-3px); /* Efecto de flotar al pasar el mouse */
    }

    /* 📝 Título */
    h2 {
        color: var(--color-dark-text);
        text-align: center;
        margin-bottom: 30px;
        /* Subrayado con el color primario */
        border-bottom: 3px solid var(--color-primary);
        padding-bottom: 10px;
        font-size: 2rem;
        font-weight: 700;
    }

    /* 📦 Grupo de Campo */
    .form-group-custom {
        margin-bottom: 25px;
    }

    /* 🗣️ Etiqueta */
    .form-group-custom label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        color: var(--color-dark-text);
        font-size: 1rem;
    }

    /* ⌨️ Campo de Entrada */
    .form-input-custom {
        width: 100%;
        padding: 12px 15px;
        border: 1px solid var(--color-border-subtle);
        border-radius: 8px; /* Bordes más suaves en los inputs */
        font-size: 1rem;
        box-sizing: border-box;
        transition: border-color 0.3s, box-shadow 0.3s;
    }

    .form-input-custom:focus {
        border-color: var(--color-primary); /* Color primario al enfocar */
        box-shadow: 0 0 0 4px rgba(108, 92, 231, 0.2); /* Anillo de enfoque vibrante */
        outline: none;
    }

    /* ⏫ Botón Actualizar (Efecto de Pulso) */
    .form-button-custom {
        display: block;
        width: 100%;
        padding: 15px;
        font-size: 1.1rem;
        font-weight: bold;
        color: white;
        background-color: var(--color-primary);
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: background-color 0.3s, transform 0.1s, box-shadow 0.3s;
        margin-top: 35px;
        box-shadow: 0 5px 15px rgba(108, 92, 231, 0.4);
    }

    .form-button-custom:hover {
        background-color: #5544c7; /* Morado un poco más oscuro */
        transform: translateY(-1px); /* Leve levantamiento */
        box-shadow: 0 8px 20px rgba(108, 92, 231, 0.6);
    }
</style>

<div class="form-container-wrapper">
    <div class="form-card">
        <h2>Editar Paciente</h2>

        <form action="{{ route('pacientes.update',$paciente->idPacient) }}" method="POST">
            @csrf @method('PUT')

            <div class="form-group-custom">
                <label>Nombres</label>
                <input type="text" name="nombresPacient" class="form-input-custom" value="{{ $paciente->nombresPacient }}" required>
            </div>

            <div class="form-group-custom">
                <label>Apellidos</label>
                <input type="text" name="apellidosPacient" class="form-input-custom" value="{{ $paciente->apellidosPacient }}" required>
            </div>

            <div class="form-group-custom">
                <label>DNI</label>
                <input type="text" name="dniPacient" class="form-input-custom" value="{{ $paciente->dniPacient }}" required>
            </div>

            <button type="submit" class="form-button-custom">Actualizar</button>
        </form>
    </div>
</div>
@endsection