@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="text-success"><i class="fas fa-file-medical"></i> Historial Clínico Encontrado</h3>
        <a href="{{ route('busquedas.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Nueva Búsqueda
        </a>
    </div>

    <div class="card shadow-sm border-success">
        <div class="card-body">
            @if(count($resultados) > 0)
                <div class="alert alert-light border mb-3">
                    <strong>Paciente:</strong> {{ $resultados[0]->Paciente }}
                </div>

                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="bg-success text-white">
                            <tr>
                                <th style="width: 15%">Fecha Atención</th>
                                <th style="width: 20%">Médico Tratante</th>
                                <th style="width: 25%">Motivo Consulta</th>
                                <th style="width: 40%">Diagnóstico</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($resultados as $fila)
                            <tr>
                                <td>{{ $fila->Fecha }}</td>
                                <td class="fw-bold">{{ $fila->Medico }}</td>
                                <td>{{ $fila->Motivo }}</td>
                                <td>
                                    <div class="p-2 bg-light border rounded text-secondary">
                                        {{ $fila->Diagnostico }}
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="alert alert-warning text-center" role="alert">
                    <h4 class="alert-heading"><i class="fas fa-user-slash"></i> No se encontró historial</h4>
                    <p>Verifique que el DNI sea correcto o que el paciente tenga consultas registradas con el médico indicado.</p>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection