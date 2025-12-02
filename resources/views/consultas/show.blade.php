@extends('layouts.app')

@section('content')
<style>
    /* 🎨 Variables de Estilo */
    :root {
        --color-primary-doc: #1a5276; /* Azul Oscuro (texto principal) */
        --color-health: #43a047; /* Verde Saludable (acento) */
        --color-bg-light: #f9fdf9; /* Fondo suave */
        --color-text-dark: #2c3e50;
        --color-border-subtle: #eeeeee;
        --color-secondary: #6c757d;
    }

    /* Contenedor Principal */
    .detail-wrapper {
        padding: 50px 20px;
        max-width: 800px;
        margin: 0 auto;
        background-color: var(--color-bg-light);
        min-height: 100vh;
    }

    /* Título */
    .detail-title {
        color: var(--color-health);
        text-align: center;
        margin-bottom: 30px;
        font-size: 2.2rem;
        font-weight: 700;
    }

    /* Tarjeta de Detalle */
    .detail-card {
        background-color: white;
        border-radius: 12px;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        padding: 0;
        border-top: 5px solid var(--color-health);
    }

    .card-body-detail {
        padding: 30px;
    }

    /* Estilos de Párrafos de Detalle */
    .detail-item {
        padding: 10px 0;
        border-bottom: 1px solid var(--color-border-subtle);
        margin-bottom: 0;
        line-height: 1.6;
        color: var(--color-text-dark);
    }

    .detail-item:last-child {
        border-bottom: none;
    }
    
    .detail-item strong {
        color: var(--color-primary-doc);
        display: inline-block;
        min-width: 120px; /* Alineación de las etiquetas */
    }

    /* Tratamiento/Diagnóstico Largo */
    .long-text-box {
        background-color: #f7f9f9;
        border: 1px solid #e0e0e0;
        border-radius: 8px;
        padding: 15px;
        margin-top: 10px;
        white-space: pre-wrap; /* Mantiene saltos de línea y formato */
    }

    /* Botón Volver */
    .btn-back-consult {
        background-color: var(--color-secondary);
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 20px;
        font-weight: 500;
        transition: all 0.3s ease;
        text-decoration: none;
        margin-top: 30px;
        display: inline-block;
    }

    .btn-back-consult:hover {
        background-color: #5a6268;
        transform: translateY(-1px);
    }

</style>

<div class="detail-wrapper">
    <h1 class="detail-title">Detalle de la Consulta</h1>
    
    <div class="detail-card">
        <div class="card-body-detail">
            
            <p class="detail-item">
                <strong>ID:</strong> {{ $consulta->idConsul }}
            </p>
            
            <p class="detail-item">
                <strong>Fecha:</strong> {{ $consulta->fechaConsult }}
            </p>
            
            <p class="detail-item">
                <strong>Médico:</strong> {{ optional($consulta->medico)->nombresMedic }} {{ optional($consulta->medico)->apellidosMedic }}
            </p>
            
            <p class="detail-item">
                <strong>Cita:</strong> Cita #{{ optional($consulta->cita)->idCit }}
            </p>

            <p class="detail-item">
                <strong>Diagnóstico:</strong>
                <div class="long-text-box">
                    {{ $consulta->diagnosticoConsult }}
                </div>
            </p>
            
            {{-- @if (!empty($consulta->tratamientoConsult))
            <p class="detail-item">
                <strong>Tratamiento:</strong>
                <div class="long-text-box">
                    {{ $consulta->tratamientoConsult }}
                </div>
            </p>
            @endif --}}
            
            </div>
    </div>
    <a href="{{ route('consultas.index') }}" class="btn-back-consult">Volver a Consultas</a>
</div>
@endsection