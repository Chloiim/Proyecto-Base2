@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalle de la Factura</h1>
    <div class="card">
        <div class="card-body">
            <p><strong>ID:</strong> {{ $factura->idFac }}</p>
            <p><strong>Fecha:</strong> {{ $factura->fechaEmisionFac }}</p>
            <p><strong>Monto:</strong> {{ $factura->montoTotal }}</p>
            <p><strong>Consulta:</strong> {{ optional($factura->consulta)->idConsul }}</p>
            <p><strong>Paciente:</strong> {{ optional($factura->paciente)->nombresPacient }}</p>
            <!-- Agrega más campos según tu modelo -->
        </div>
    </div>
    <a href="{{ route('facturas.index') }}" class="btn btn-secondary mt-3">Volver</a>
</div>
@endsection
