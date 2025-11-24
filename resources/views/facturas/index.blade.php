@extends('layouts.app')

@section('content')
<h2>Facturas</h2>

<a href="{{ route('facturas.create') }}" class="btn btn-primary mb-3">Nueva Factura</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th><th>Fecha</th><th>Monto</th>
            <th>Paciente</th><th>Consulta</th><th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($facturas as $f)
        <tr>
            <td>{{ $f->idFactura }}</td>
            <td>{{ $f->fechaFactura }}</td>
            <td>{{ $f->montoFactura }}</td>
            <td>{{ $f->paciente->nombresPacient }} {{ $f->paciente->apellidosPacient }}</td>
            <td>{{ optional($f->consulta)->diagnosticoConsult }}</td>
            <td>
                <a href="{{ route('facturas.edit',$f->idFactura) }}" class="btn btn-warning btn-sm">Editar</a>
                <form action="{{ route('facturas.destroy',$f->idFactura) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
