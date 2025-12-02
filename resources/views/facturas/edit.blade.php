@extends('layouts.app')

@section('content')
<style>
    /* 🎨 Variables de Estilo */
    :root {
        --color-primary-doc: #1a5276; /* Azul Oscuro (texto principal) */
        --color-finance: #c0392b; /* Rojo Borgoña Fuerte (acento) */
        --color-bg-light: #fdf6f5; /* Fondo suave y cálido */
        --color-text-dark: #2c3e50;
        --color-border-light: #e6b8b8; /* Borde rojo claro */
    }

    /* Contenedor Principal */
    .edit-invoice-wrapper {
        background-color: var(--color-bg-light);
        padding: 50px 20px;
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: flex-start;
    }

    /* Tarjeta del Formulario */
    .form-card-invoice {
        width: 100%;
        max-width: 550px; 
        background-color: white;
        border-radius: 12px;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        padding: 35px;
        border-top: 5px solid var(--color-finance);
    }

    /* Título */
    h1 {
        color: var(--color-primary-doc);
        text-align: center;
        margin-bottom: 30px;
        font-size: 2rem;
        font-weight: 700;
        border-bottom: 2px solid var(--color-finance);
        padding-bottom: 10px;
    }

    /* Grupo de Campo */
    .form-group-invoice {
        margin-bottom: 25px;
    }

    /* Etiqueta */
    .form-group-invoice label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        color: var(--color-text-dark);
        font-size: 0.95rem;
    }

    /* Input */
    .form-input-invoice {
        width: 100%;
        padding: 12px 15px;
        border: 2px solid var(--color-border-light);
        border-radius: 8px;
        font-size: 1rem;
        box-sizing: border-box;
        transition: border-color 0.3s, box-shadow 0.3s;
        line-height: 1.5;
    }

    .form-input-invoice:focus {
        border-color: var(--color-finance);
        box-shadow: 0 0 0 3px rgba(192, 57, 43, 0.2);
        outline: none;
        background-color: #fffafa;
    }
    
    /* Botón de Guardar */
    .btn-save-invoice {
        display: block;
        width: 100%;
        padding: 14px;
        font-size: 1.15rem;
        font-weight: bold;
        color: white;
        background-color: var(--color-finance);
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: background-color 0.3s, transform 0.1s;
        margin-top: 30px;
        box-shadow: 0 4px 10px rgba(192, 57, 43, 0.4);
    }

    .btn-save-invoice:hover {
        background-color: #a93226; 
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(192, 57, 43, 0.6);
    }
</style>

<div class="edit-invoice-wrapper">
    <div class="form-card-invoice">
        <h1>Editar Factura</h1>
        <form action="{{ route('facturas.update', $factura->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group-invoice">
                <label for="numero" class="form-label-doc">Número de Factura</label>
                <input type="text" class="form-input-invoice" id="numero" name="numero" value="{{ old('numero', $factura->numero) }}" required>
            </div>

            <div class="form-group-invoice">
                <label for="fecha" class="form-label-doc">Fecha</label>
                <input type="date" class="form-input-invoice" id="fecha" name="fecha" value="{{ old('fecha', $factura->fecha) }}" required>
            </div>

            <div class="form-group-invoice">
                <label for="monto" class="form-label-doc">Monto (S/.)</label>
                <input type="number" step="0.01" class="form-input-invoice" id="monto" name="monto" value="{{ old('monto', $factura->monto) }}" min="0" required>
            </div>

            <button type="submit" class="btn-save-invoice">Guardar cambios</button>
        </form>
    </div>
</div>
@endsection