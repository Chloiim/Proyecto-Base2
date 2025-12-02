@extends('layouts.app')

@section('content')
<style>
    /* 🎨 Variables de Estilo */
    :root {
        --color-primary-doc: #1a5276; /* Azul Oscuro (cabecera) */
        --color-save-success: #43a047; /* Verde Saludable (acento) */
        --color-bg-light: #f9fdf9; /* Fondo suave */
        --color-text-dark: #2c3e50;
        --color-border-light: #c8e6c9;
    }

    /* Contenedor Principal */
    .edit-consult-wrapper {
        background-color: var(--color-bg-light);
        padding: 50px 20px;
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: flex-start;
    }

    /* Tarjeta del Formulario */
    .form-card-consult {
        width: 100%;
        max-width: 650px; 
        background-color: white;
        border-radius: 12px;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        padding: 35px;
        border-top: 5px solid var(--color-save-success);
    }

    /* Título */
    h2 {
        color: var(--color-primary-doc);
        text-align: center;
        margin-bottom: 30px;
        font-size: 2rem;
        font-weight: 700;
    }

    /* Grupo de Campo */
    .form-group-consult {
        margin-bottom: 25px;
    }

    /* Etiqueta */
    .form-group-consult label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        color: var(--color-text-dark);
        font-size: 0.95rem;
    }

    /* Input, Textarea y Select */
    .form-input-consult {
        width: 100%;
        padding: 12px 15px;
        border: 2px solid var(--color-border-light);
        border-radius: 8px;
        font-size: 1rem;
        box-sizing: border-box;
        transition: border-color 0.3s, box-shadow 0.3s;
        line-height: 1.5; 
        min-height: 50px;
        resize: vertical;
    }
    
    .form-group-consult textarea {
        min-height: 150px; /* Altura generosa para edición de diagnóstico */
    }

    .form-input-consult:focus {
        border-color: var(--color-save-success);
        box-shadow: 0 0 0 3px rgba(67, 160, 71, 0.2);
        outline: none;
        background-color: #fafffa;
    }
    
    /* Botón de Actualizar */
    .btn-update-consult {
        display: block;
        width: 100%;
        padding: 14px;
        font-size: 1.15rem;
        font-weight: bold;
        color: white;
        background-color: var(--color-save-success);
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: background-color 0.3s, transform 0.1s;
        margin-top: 30px;
        box-shadow: 0 4px 10px rgba(67, 160, 71, 0.4);
    }

    .btn-update-consult:hover {
        background-color: #2e7d32; /* Verde oscuro al pasar el mouse */
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(67, 160, 71, 0.6);
    }
</style>

<div class="edit-consult-wrapper">
    <div class="form-card-consult">
        <h2>Editar Consulta</h2>

        <form action="{{ route('consultas.update',$consulta->idConsult) }}" method="POST">
            @csrf @method('PUT')

            <div class="form-group-consult">
                <label>Diagnóstico</label>
                <textarea name="diagnosticoConsult" class="form-input-consult" required>{{ $consulta->diagnosticoConsult }}</textarea>
            </div>

            <div class="form-group-consult">
                <label>Tratamiento</label>
                <textarea name="tratamientoConsult" class="form-input-consult" required>{{ $consulta->tratamientoConsult }}</textarea>
            </div>

            <div class="form-group-consult">
                <label>Fecha</label>
                <input type="date" name="fechaConsult" value="{{ $consulta->fechaConsult }}" class="form-input-consult" required>
            </div>

            <div class="form-group-consult">
                <label>Cita</label>
                <select name="idCit" class="form-input-consult" required>
                    @foreach($citas as $c)
                    <option value="{{ $c->idCit }}" @if($consulta->idCit==$c->idCit) selected @endif>
                        Cita #{{ $c->idCit }} - {{ $c->paciente->nombresPacient }} {{ $c->paciente->apellidosPacient }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group-consult">
                <label>Médico</label>
                <select name="idMedic" class="form-input-consult" required>
                    @foreach($medicos as $m)
                    <option value="{{ $m->idMedic }}" @if($consulta->idMedic==$m->idMedic) selected @endif>
                        {{ $m->nombresMedic }} {{ $m->apellidosMedic }}
                    </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn-update-consult">Actualizar</button>
        </form>
    </div>
</div>
@endsection