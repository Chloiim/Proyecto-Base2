@extends('layouts.app')

@section('content')
<h2>Pacientes</h2>

<a href="{{ route('pacientes.create') }}" class="btn btn-primary mb-3">Nuevo Paciente</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th><th>Nombres</th><th>Apellidos</th><th>DNI</th><th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pacientes as $p)
        <tr>
            <td>{{ $p->idPacient }}</td>
            <td>{{ $p->nombresPacient }}</td>
            <td>{{ $p->apellidosPacient }}</td>
            <td>{{ $p->dniPacient }}</td>
            <td>
                <a href="{{ route('pacientes.edit',$p->idPacient) }}" class="btn btn-warning btn-sm">Editar</a>

                <form action="{{ route('pacientes.destroy',$p->idPacient) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm">Eliminar</button>
                </form>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
