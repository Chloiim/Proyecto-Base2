@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="text-danger"><i class="fas fa-file-invoice-dollar"></i> Reporte de Facturación Filtrado</h3>
        <a href="{{ route('busquedas.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Nueva Búsqueda
        </a>
    </div>

    <div class="card shadow-sm border-danger">
        <div class="card-body">
            @if(count($resultados) > 0)
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="bg-danger text-white">
                            <tr>
                                <th># Factura</th>
                                <th>Fecha Emisión</th>
                                <th>Paciente Facturado</th>
                                <th>Seguro / Cobertura</th>
                                <th>Estado</th>
                                <th class="text-end">Monto Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($resultados as $fila)
                            <tr>
                                <td class="fw-bold">FAC-{{ str_pad($fila->idFac, 6, '0', STR_PAD_LEFT) }}</td>
                                <td>{{ $fila->fechaEmisionFac }}</td>
                                <td>{{ $fila->Paciente }}</td>
                                <td>
                                    @if($fila->Seguro == 'Particular')
                                        <span class="text-muted"><i class="fas fa-user"></i> Particular</span>
                                    @else
                                        <span class="text-primary"><i class="fas fa-building"></i> {{ $fila->Seguro }}</span>
                                    @endif
                                </td>
                                <td>
                                    @if($fila->estadoPago == 'pagado')
                                        <span class="badge bg-success">PAGADO</span>
                                    @else
                                        <span class="badge bg-danger">PENDIENTE</span>
                                    @endif
                                </td>
                                <td class="text-end fw-bold fs-5 text-dark">
                                    S/. {{ number_format($fila->montoTotal, 2) }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot class="table-light">
                            <tr>
                                <td colspan="5" class="text-end fw-bold">TOTAL EN ESTE REPORTE:</td>
                                <td class="text-end fw-bold text-danger">
                                    S/. {{ number_format(collect($resultados)->sum('montoTotal'), 2) }}
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            @else
                <div class="alert alert-info text-center" role="alert">
                    <h4 class="alert-heading"><i class="fas fa-search-dollar"></i> Sin Coincidencias</h4>
                    <p>No existen facturas con el estado y monto mínimo especificados.</p>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection