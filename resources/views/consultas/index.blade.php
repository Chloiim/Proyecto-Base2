@extends('layouts.app')

@section('content')
<h2>Consultas</h2>

<a href="{{ route('consultas.create') }}" class="btn btn-primary mb-3">Nueva Consulta</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th><th>Fecha</th><th>Diagnóstico</th>
            <th>Paciente</th><th>Médico</th><th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($consultas as $c)
        <tr>
            <td>{{ $c->idConsult }}</td>
            <td>{{ $c->fechaConsult }}</td>
            <td>{{ $c->diagnosticoConsult }}</td>
            <td>{{ $c->cita->paciente->nombresPacient }} {{ $c->cita->paciente->apellidosPacient }}</td>
            <td>{{ $c->medico->nombresMedic }} {{ $c->medico->apellidosMedic }}</td>
            <td>
                <a href="{{ route('consultas.edit', $c) }}" class="btn btn-warning btn-sm">Editar</a>
                <form action="{{ route('consultas.destroy',$c->idConsult) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
