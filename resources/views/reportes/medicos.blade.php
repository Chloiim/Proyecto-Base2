@extends('layouts.app')

@section('content')
<div class="container py-4">
    <a href="{{ route('reportes.index') }}" class="btn btn-secondary mb-3">&larr; Volver al Menú</a>

    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Reporte de Médicos por Área</h4>
        </div>
        <div class="card-body">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Area</th>
                        <th>Edificio</th>
                        <th>Médico</th>
                        <th>Especialidad</th>
                        <th>Telefono</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($datos as $item)
                    <tr>
                        <td>{{ $item->Area }}</td>
                        <td>{{ $item->Edificio }}</td>
                        <td>{{ $item->Medico }}</td>
                        <td>{{ $item->Especialidad }}</td>
                        <td>{{ $item->Telefono }}</td>
                        <td>{{ $item->Email }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
            <div class="d-flex justify-content-center">
                {{ $datos->links() }}
            </div>
        </div>
    </div>
</div>
@endsection