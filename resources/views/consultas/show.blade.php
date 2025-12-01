@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalle de la Consulta</h1>
    <div class="card">
        <div class="card-body">
            <p><strong>ID:</strong> {{ $consulta->idConsul }}</p>
            <p><strong>Diagnóstico:</strong> {{ $consulta->diagnosticoConsult }}</p>
            <p><strong>Fecha:</strong> {{ $consulta->fechaConsult }}</p>
            <p><strong>Médico:</strong> {{ optional($consulta->medico)->nombresMedic }}</p>
            <p><strong>Cita:</strong> {{ optional($consulta->cita)->idCit }}</p>
            <!-- Agrega más campos según tu modelo -->
        </div>
    </div>
    <a href="{{ route('consultas.index') }}" class="btn btn-secondary mt-3">Volver</a>
</div>
@endsection
