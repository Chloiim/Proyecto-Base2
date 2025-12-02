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
    .register-invoice-wrapper {
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
    h2 {
        color: var(--color-primary-doc);
        text-align: center;
        margin-bottom: 30px;
        font-size: 2rem;
        font-weight: 700;
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

    /* Input y Select */
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
        background-color: #a93226; /* Rojo oscuro al pasar el mouse */
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(192, 57, 43, 0.6);
    }
</style>

<div class="register-invoice-wrapper">
    <div class="form-card-invoice">
        <h2>Registrar Factura</h2>

        <form action="{{ route('facturas.store') }}" method="POST">
            @csrf

            <div class="form-group-invoice">
                <label>Fecha de Emisión</label>
                <input type="date" name="fechaFactura" class="form-input-invoice" required>
            </div>

            <div class="form-group-invoice">
                <label>Monto Total (S/.)</label>
                <input type="number" step="0.01" name="montoFactura" class="form-input-invoice" min="0" required>
            </div>

            <div class="form-group-invoice">
                <label>Paciente a Facturar</label>
                <select name="idPacient" class="form-input-invoice" required>
                    <option value="" disabled selected>Seleccione un paciente...</option>
                    @foreach($pacientes as $p)
                    <option value="{{ $p->idPacient }}">{{ $p->nombresPacient }} {{ $p->apellidosPacient }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group-invoice">
                <label>Consulta Asociada</label>
                <select name="idConsult" class="form-input-invoice" required>
                    <option value="" disabled selected>Seleccione la consulta asociada...</option>
                    @foreach($consultas as $c)
                    <option value="{{ $c->idConsult }}">Cita #{{ $c->cita->idCit }} - {{ $c->diagnosticoConsult }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn-save-invoice">Guardar Factura</button>
        </form>
    </div>
</div>
@endsection