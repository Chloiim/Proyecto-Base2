@extends('layouts.app')

@section('content')
<div class="container py-4">
    <a href="{{ route('reportes.index') }}" class="btn btn-secondary mb-3">&larr; Volver al Menú</a>

    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Reporte de Historial Medico</h4>
        </div>
        <div class="card-body">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Paciente</th>
                        <th>Motivo</th>
                        <th>Diagnostico</th>
                        <th>Tratamiento</th>
                        <th>Medico Atendio</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($datos as $item)
                    <tr>
                        <td>{{ $item->Fecha }}</td>
                        <td>{{ $item->Paciente }}</td>
                        <td>{{ $item->Motivo }}</td>
                        <td>{{ $item->Diagnostico }}</td>
                        <td>{{ $item->Tratamiento }}</td>
                        <td>{{ $item->Medico_Atendio }}</td>
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