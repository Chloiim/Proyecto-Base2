@extends('layouts.app')
@section('content')
<div class="container py-5">
    <div class="card col-md-6 mx-auto shadow border-primary">
        <div class="card-header bg-primary text-white">
            <h4>Editar Medicamento (Trigger Update)</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('auditoria.updateMed', $med->idMedicament) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label>Nombre</label>
                    <input type="text" name="nombre" class="form-control" value="{{ $med->nombreMedicament }}" required>
                </div>
                <div class="mb-3">
                    <label>Marca</label>
                    <input type="text" name="marca" class="form-control" value="{{ $med->marcaMedicament }}" required>
                </div>
                <div class="row">
                    <div class="col">
                        <label>Stock</label>
                        <input type="number" name="stock" class="form-control" value="{{ $med->stockMedicament }}">
                    </div>
                    <div class="col">
                        <label>Precio</label>
                        <input type="number" step="0.01" name="precio" class="form-control" value="{{ $med->precioUnitario }}">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary w-100 mt-3">Actualizar Datos</button>
            </form>
        </div>
    </div>
</div>
@endsection