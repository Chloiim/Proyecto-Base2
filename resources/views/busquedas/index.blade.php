@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="text-center mb-4">Centro de Búsquedas Avanzadas</h2>

    <div class="row">
        <div class="col-md-4">
            <div class="card shadow-sm h-100">
                <div class="card-header bg-primary text-white">1. Filtrar Citas</div>
                <div class="card-body">
                    <form action="{{ route('busquedas.citas') }}" method="GET">
                        <div class="mb-3">
                            <label>Desde:</label>
                            <input type="date" name="fecha_inicio" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Hasta:</label>
                            <input type="date" name="fecha_fin" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Especialidad:</label>
                            <select name="especialidad" class="form-select">
                                @foreach($especialidades as $esp)
                                    <option value="{{ $esp->especialidadMedic }}">{{ $esp->especialidadMedic }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Buscar Citas</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm h-100">
                <div class="card-header bg-success text-white">2. Buscar Historial</div>
                <div class="card-body">
                    <form action="{{ route('busquedas.historial') }}" method="GET">
                        <div class="mb-3">
                            <label>DNI Paciente:</label>
                            <input type="text" name="dni" class="form-control" placeholder="Ej: 12345678" maxlength="8" required>
                        </div>
                        <div class="mb-3">
                            <label>Apellido Médico (Opcional):</label>
                            <input type="text" name="medico" class="form-control" placeholder="Ej: Perez">
                        </div>
                        <button type="submit" class="btn btn-success w-100">Consultar Historial</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm h-100">
                <div class="card-header bg-danger text-white">3. Filtrar Facturas</div>
                <div class="card-body">
                    <form action="{{ route('busquedas.facturas') }}" method="GET">
                        <div class="mb-3">
                            <label>Estado de Pago:</label>
                            <select name="estado" class="form-select">
                                <option value="pendiente">Pendiente</option>
                                <option value="pagado">Pagado</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>Monto Mínimo:</label>
                            <input type="number" name="monto" class="form-control" value="0" min="0">
                        </div>
                        <button type="submit" class="btn btn-danger w-100">Filtrar Finanzas</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection