@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="text-center mb-5">Probador Interactivo de Funciones SQL</h2>

    <div class="row">
        
        <div class="col-md-4">
            <div class="card shadow h-100 border-primary">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">1. Función Alergias</h5>
                </div>
                <div class="card-body">
                    <p class="small text-muted">Ingrese el parámetro (ID Paciente) para ver el mensaje.</p>
                    
                    <form action="{{ route('probador.alergia') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Seleccione Paciente:</label>
                            <select name="idPacient" class="form-select" required>
                                <option value="">-- Seleccionar ID --</option>
                                @foreach($pacientes as $p)
                                    <option value="{{ $p->idPacient }}" {{ session('id_alergia') == $p->idPacient ? 'selected' : '' }}>
                                        {{ $p->nombresPacient }} {{ $p->apellidosPacient }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Consultar Función</button>
                    </form>

                    @if(session('resp_alergia'))
                        <div class="alert alert-info mt-3 fw-bold">
                            <i class="fas fa-comment"></i> Respuesta BD:<br>
                            {{ session('resp_alergia') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow h-100 border-warning">
                <div class="card-header bg-warning text-dark">
                    <h5 class="mb-0">2. Función Stock</h5>
                </div>
                <div class="card-body">
                    <p class="small text-muted">Ingrese el parámetro (ID Medicamento) para ver alerta.</p>
                    
                    <form action="{{ route('probador.stock') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Seleccione Medicamento:</label>
                            <select name="idMedicament" class="form-select" required>
                                <option value="">-- Seleccionar ID --</option>
                                @foreach($medicamentos as $m)
                                    <option value="{{ $m->idMedicament }}" {{ session('id_stock') == $m->idMedicament ? 'selected' : '' }}>
                                        {{ $m->nombreMedicament }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-warning w-100">Consultar Función</button>
                    </form>

                    @if(session('resp_stock'))
                        <div class="alert alert-dark mt-3 fw-bold">
                            <i class="fas fa-box"></i> Respuesta BD:<br>
                            {{ session('resp_stock') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow h-100 border-success">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0">3. Función Cobranza</h5>
                </div>
                <div class="card-body">
                    <p class="small text-muted">Ingrese el parámetro (ID Factura) para analizar deuda.</p>
                    
                    <form action="{{ route('probador.cobranza') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Seleccione Factura:</label>
                            <select name="idFactura" class="form-select" required>
                                <option value="">-- Seleccionar ID --</option>
                                @foreach($facturas as $f)
                                    <option value="{{ $f->idFac }}" {{ session('id_cobranza') == $f->idFac ? 'selected' : '' }}>
                                        Factura #{{ $f->idFac }} (S/. {{ $f->montoTotal }})
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success w-100">Consultar Función</button>
                    </form>

                    @if(session('resp_cobranza'))
                        <div class="alert alert-success mt-3 fw-bold" style="background-color: #d1e7dd; color: #0f5132;">
                            <i class="fas fa-file-invoice-dollar"></i> Respuesta BD:<br>
                            {{ session('resp_cobranza') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>

    </div>
</div>
@endsection