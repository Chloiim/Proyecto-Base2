@extends('layouts.app')

@section('content')
<h2>Médicos</h2>

<a href="{{ route('medicos.create') }}" class="btn btn-primary mb-3">Nuevo Médico</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th><th>Nombres</th><th>Apellidos</th><th>Especialidad</th><th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($medicos as $m)
        <tr>
            <td>{{ $m->idMedic }}</td>
            <td>{{ $m->nombresMedic }}</td>
            <td>{{ $m->apellidosMedic }}</td>
            <td>{{ $m->especialidadMedic }}</td>
            <td>
                <a href="{{ route('medicos.edit',$m->idMedic) }}" class="btn btn-warning btn-sm">Editar</a>
                <form action="{{ route('medicos.destroy',$m->idMedic) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
