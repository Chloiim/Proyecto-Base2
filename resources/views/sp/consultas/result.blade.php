@extends('layouts.app')
@section('content')
<h2>Resultados</h2>
<a href="{{ route('sp.consultas.form') }}" class="btn btn-link">Volver</a>

@if($errors->has('db')) <div class="alert alert-danger">{{ $errors->first('db') }}</div> @endif

<table class="table table-bordered">
  <thead><tr><th>ID</th><th>Fecha Consulta</th><th>P. Paciente</th><th>Médico</th></tr></thead>
  <tbody>
    @forelse($rows as $r)
      <tr>
        <td>{{ $r->idConsult }}</td>
        <td>{{ $r->fechaConsult }}</td>
        <td>{{ $r->nombresPacient }} {{ $r->apellidosPacient }}</td>
        <td>{{ $r->nombresMedic }} {{ $r->apellidosMedic }}</td>
      </tr>
    @empty
      <tr><td colspan="4">No hay resultados</td></tr>
    @endforelse
  </tbody>
</table>
@endsection
