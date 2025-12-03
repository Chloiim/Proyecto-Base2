@extends('layouts.app')
@section('content')
<div class="container py-5">
    <div class="card col-md-6 mx-auto shadow border-info">
        <div class="card-header bg-info text-white">
            <h4>Nuevo Medicamento (Trigger Insert)</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('auditoria.storeMed') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label>Nombre Comercial</label>
                    <input type="text" name="nombre" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Laboratorio / Marca</label>
                    <input type="text" name="marca" class="form-control" required>
                </div>
                <div class="row">
                    <div class="col">
                        <label>Stock</label>
                        <input type="number" name="stock" class="form-control" required>
                    </div>
                    <div class="col">
                        <label>Precio (S/.)</label>
                        <input type="number" step="0.01" name="precio" class="form-control" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-info text-white w-100 mt-3">Guardar Medicamento</button>
            </form>
        </div>
    </div>
</div>
@endsection