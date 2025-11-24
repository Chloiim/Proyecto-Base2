@extends('layouts.app')

@section('content')
<h2>Listado de Citas</h2>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th><th>Fecha</th><th>Hora</th>
            <th>Paciente</th><th>Médico</th><th>Estado</th>
        </tr>
    </thead>
    <tbody>
    @foreach($citas as $c)
        <tr>
            <td>{{ $c->idCit }}</td>
            <td>{{ $c->fechaCit }}</td>
            <td>{{ $c->horaCit }}</td>
            <td>{{ $c->paciente->nombresPacient }} {{ $c->paciente->apellidosPacient }}</td>
            <td>{{ $c->medico->nombresMedic }} {{ $c->medico->apellidosMedic }}</td>
            <td>{{ $c->estadoCit }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection
