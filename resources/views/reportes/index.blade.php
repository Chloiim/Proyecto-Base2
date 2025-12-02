@extends('layouts.app')

@section('content')
<style>
    /* 🎨 Variables de Estilo */
    :root {
        --color-bg-doc: #eef1f6; /* Fondo general muy claro */
        --color-text-dark: #2c3e50;
        --color-shadow-light: #ffffff;
        --color-shadow-dark: #d8dee8;
        /* Colores de Tarjeta */
        --color-citas: #4a90e2;      /* Azul */
        --color-historial: #43a047;  /* Verde */
        --color-medicos: #00bcd4;    /* Cyan */
        --color-facturas: #e53935;   /* Rojo */
        --color-recetas: #ffb300;    /* Ámbar */
    }

    /* Contenedor Principal */
    .dashboard-wrapper {
        background-color: var(--color-bg-doc);
        padding: 60px 20px;
        min-height: 100vh;
    }

    /* Título del Dashboard */
    .dashboard-title {
        color: var(--color-text-dark);
        text-align: center;
        margin-bottom: 50px;
        font-size: 2.5rem;
        font-weight: 700;
        letter-spacing: 0.5px;
    }

    /* Grid Layout para Tarjetas */
    .report-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); /* Responsivo */
        gap: 30px;
        max-width: 1400px;
        margin: 0 auto;
    }

    /* Estilo de la Tarjeta (Efecto Neumórfico Sutil) */
    .report-card {
        background-color: var(--color-bg-doc);
        border-radius: 18px;
        padding: 25px;
        text-align: center;
        height: 100%;
        /* Sombra Neumórfica Suave */
        box-shadow: 6px 6px 12px var(--color-shadow-dark), 
                    -6px -6px 12px var(--color-shadow-light);
        transition: all 0.3s ease;
        border: 1px solid transparent; /* Inicialmente transparente */
    }

    .report-card:hover {
        transform: translateY(-5px);
        box-shadow: 10px 10px 20px var(--color-shadow-dark), 
                    -10px -10px 20px var(--color-shadow-light);
    }

    /* Encabezado y Texto de la Tarjeta */
    .card-header-icon {
        font-size: 3rem;
        margin-bottom: 10px;
    }
    
    .card-title-custom {
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 5px;
    }
    
    .card-text-custom {
        color: #7f8c8d;
        margin-bottom: 25px;
        min-height: 40px; /* Asegura altura mínima para la descripción */
    }

    /* 🚀 Botones de Reporte */
    .btn-report {
        padding: 12px 30px;
        border-radius: 50px; /* Botón de píldora */
        font-weight: 600;
        font-size: 0.95rem;
        cursor: pointer;
        border: none;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-block;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        color: white; /* Color por defecto */
    }
    
    .btn-report:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.3);
        opacity: 0.9;
    }

    /* Colores Específicos */

    /* Citas (Azul Primario) */
    .card-citas { border-left: 5px solid var(--color-citas); }
    .text-citas { color: var(--color-citas); }
    .btn-citas { background-color: var(--color-citas); }

    /* Historial (Verde Éxito) */
    .card-historial { border-left: 5px solid var(--color-historial); }
    .text-historial { color: var(--color-historial); }
    .btn-historial { background-color: var(--color-historial); }

    /* Médicos (Cyan/Info) */
    .card-medicos { border-left: 5px solid var(--color-medicos); }
    .text-medicos { color: var(--color-medicos); }
    .btn-medicos { background-color: var(--color-medicos); }

    /* Facturación (Rojo Peligro) */
    .card-facturas { border-left: 5px solid var(--color-facturas); }
    .text-facturas { color: var(--color-facturas); }
    .btn-facturas { background-color: var(--color-facturas); }

    /* Recetas (Ámbar Advertencia) */
    .card-recetas { border-left: 5px solid var(--color-recetas); }
    .text-recetas { color: var(--color-recetas); }
    .btn-recetas { background-color: var(--color-recetas); }

    /* Iconos (usando clases de FontAwesome, asumiendo que están enlazadas) */
    .icon-citas::before { content: "\f073"; /* Calendar */ font-family: "Font Awesome 5 Free"; font-weight: 900; }
    .icon-historial::before { content: "\f470"; /* Book Medical */ font-family: "Font Awesome 5 Free"; font-weight: 900; }
    .icon-medicos::before { content: "\f0f0"; /* Stethoscope */ font-family: "Font Awesome 5 Free"; font-weight: 900; }
    .icon-facturas::before { content: "\f53a"; /* File Invoice */ font-family: "Font Awesome 5 Free"; font-weight: 900; }
    .icon-recetas::before { content: "\f48e"; /* Prescription Bottle */ font-family: "Font Awesome 5 Free"; font-weight: 900; }

</style>

<div class="dashboard-wrapper">
    <h2 class="dashboard-title">Sistema de Reportes Clínicos</h2>
    
    <div class="report-grid">
        
        <!-- Tarjeta 1: Próximas Citas -->
        <div class="report-card card-citas">
            <div class="card-header-icon text-citas icon-citas"></div>
            <h5 class="card-title-custom text-citas">Próximas Citas</h5>
            <p class="card-text-custom">Agenda detallada de citas pendientes.</p>
            <a href="{{ route('reportes.citas') }}" class="btn-report btn-citas">Ver Reporte</a>
        </div>

        <!-- Tarjeta 2: Historial Médico -->
        <div class="report-card card-historial">
            <div class="card-header-icon text-historial icon-historial"></div>
            <h5 class="card-title-custom text-historial">Historial Médico</h5>
            <p class="card-text-custom">Registro completo de atenciones.</p>
            <a href="{{ route('reportes.historial') }}" class="btn-report btn-historial">Ver Reporte</a>
        </div>

        <!-- Tarjeta 3: Médicos por Área -->
        <div class="report-card card-medicos">
            <div class="card-header-icon text-medicos icon-medicos"></div>
            <h5 class="card-title-custom text-medicos">Médicos por Área</h5>
            <p class="card-text-custom">Directorio de personal y ubicaciones.</p>
            <a href="{{ route('reportes.medicos') }}" class="btn-report btn-medicos">Ver Reporte</a>
        </div>

        <!-- Tarjeta 4: Facturación Pendiente -->
        <div class="report-card card-facturas">
            <div class="card-header-icon text-facturas icon-facturas"></div>
            <h5 class="card-title-custom text-facturas">Facturación Pendiente</h5>
            <p class="card-text-custom">Control de pagos y deudas.</p>
            <a href="{{ route('reportes.facturas') }}" class="btn-report btn-facturas">Ver Reporte</a>
        </div>

        <!-- Tarjeta 5: Recetas y Medicamentos -->
        <div class="report-card card-recetas">
            <div class="card-header-icon text-recetas icon-recetas"></div>
            <h5 class="card-title-custom text-recetas">Recetas y Medicamentos</h5>
            <p class="card-text-custom">Detalle de prescripciones emitidas.</p>
            <a href="{{ route('reportes.recetas') }}" class="btn-report btn-recetas">Ver Reporte</a>
        </div>
        
    </div>
</div>
@endsection