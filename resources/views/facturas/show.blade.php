@extends('layouts.app')

@section('content')
<style>
    /* 🎨 Variables de Estilo */
    :root {
        --color-primary-doc: #1a5276; /* Azul Oscuro (texto principal) */
        --color-finance: #c0392b; /* Rojo Borgoña Fuerte (acento) */
        --color-bg-light: #fdf6f5; /* Fondo suave y cálido */
        --color-text-dark: #2c3e50;
        --color-border-subtle: #e6b8b8;
        --color-secondary: #6c757d;
    }

    /* Contenedor Principal */
    .detail-wrapper-finance {
        padding: 50px 20px;
        max-width: 800px;
        margin: 0 auto;
        background-color: var(--color-bg-light);
        min-height: 100vh;
    }

    /* Título */
    .detail-title-finance {
        color: var(--color-finance);
        text-align: center;
        margin-bottom: 30px;
        font-size: 2.2rem;
        font-weight: 700;
        border-bottom: 3px solid var(--color-finance);
        padding-bottom: 10px;
        display: block;
    }

    /* Tarjeta de Detalle */
    .detail-card-finance {
        background-color: white;
        border-radius: 12px;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        padding: 0;
        border-top: 5px solid var(--color-finance);
    }

    .card-body-detail {
        padding: 30px;
    }

    /* Estilos de Párrafos de Detalle */
    .detail-item {
        padding: 12px 0;
        border-bottom: 1px solid var(--color-border-subtle);
        margin-bottom: 0;
        line-height: 1.6;
        color: var(--color-text-dark);
        display: flex; /* Usamos flex para alinear etiquetas y valores */
        justify-content: space-between;
    }

    .detail-item:last-child {
        border-bottom: none;
    }
    
    .detail-item strong {
        color: var(--color-primary-doc);
        font-weight: 700;
        margin-right: 15px;
    }

    /* Monto destacado */
    .monto-highlight {
        font-size: 1.5rem;
        font-weight: 800;
        color: var(--color-finance);
        background-color: #fffafa; /* Fondo sutil para el valor */
        padding: 5px 10px;
        border-radius: 6px;
    }


    /* Botón Volver */
    .btn-back-finance {
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

    .btn-back-finance:hover {
        background-color: #5a6268;
        transform: translateY(-1px);
    }

</style>

<div class="detail-wrapper-finance">
    <h1 class="detail-title-finance">Detalle de la Factura</h1>
    
    <div class="detail-card-finance">
        <div class="card-body-detail">
            
            <p class="detail-item">
                <strong>ID de Factura:</strong> <span>{{ $factura->idFac }}</span>
            </p>
            
            <p class="detail-item">
                <strong>Fecha de Emisión:</strong> <span>{{ $factura->fechaEmisionFac }}</span>
            </p>
            
            <p class="detail-item">
                <strong>Paciente Facturado:</strong> <span>{{ optional($factura->paciente)->nombresPacient }} {{ optional($factura->paciente)->apellidosPacient }}</span>
            </p>
            
            <p class="detail-item">
                <strong>Consulta Asociada:</strong> <span>Consulta #{{ optional($factura->consulta)->idConsul }}</span>
            </p>
            
            <p class="detail-item" style="border-bottom: none;">
                <strong>Monto Total:</strong> 
                <span class="monto-highlight">S/. {{ number_format($factura->montoTotal, 2) }}</span>
            </p>
            
            </div>
    </div>
    <a href="{{ route('facturas.index') }}" class="btn-back-finance">Volver a Facturas</a>
</div>
@endsection