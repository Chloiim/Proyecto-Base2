@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="text-center mb-5"><i class="fas fa-robot"></i> Mensajes Automáticos del Sistema</h2>

    <div class="row g-4">
        
        <div class="col-md-12">
            <div class="card shadow-sm border-info">
                <div class="card-header bg-info text-white">
                    <h5 class="mb-0">Estados de Citas (Función con CASE)</h5>
                </div>
                <div class="card-body">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>Paciente</th>
                                <th>Estado Real (BD)</th>
                                <th>Mensaje al Usuario (Calculado)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($citas as $c)
                            <tr>
                                <td>{{ $c->nombresPacient }}</td>
                                <td><span class="badge bg-secondary">{{ $c->estadoCit }}</span></td>
                                <td class="fst-italic text-primary">"{{ $c->MensajeUsuario }}"</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card shadow-sm border-danger h-100">
                <div class="card-header bg-danger text-white">
                    <h5 class="mb-0">Alertas de Caja (Función con IF/ELSE)</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        @foreach($facturas as $f)
                        <li class="list-group-item">
                            <div class="d-flex justify-content-between">
                                <strong>Factura #{{ $f->idFac }}</strong>
                                <span class="text-danger fw-bold">S/. {{ $f->montoTotal }}</span>
                            </div>
                            <div class="alert alert-warning mt-2 mb-0 py-2">
                                <i class="fas fa-exclamation-triangle"></i> {{ $f->AlertaCobranza }}
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card shadow-sm border-success h-100">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0">Infraestructura (Función con IF/ELSEIF)</h5>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Ubicación</th>
                                <th>Capacidad</th>
                                <th>Clasificación</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($salas as $s)
                            <tr>
                                <td>{{ $s->ubicacionSala }}</td>
                                <td>{{ $s->capacidadSala }} pers.</td>
                                <td class="fw-bold text-success">{{ $s->TipoAmbiente }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection