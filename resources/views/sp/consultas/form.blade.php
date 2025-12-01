@extends('layouts.app')
@section('content')
<h2>Buscar Consultas por Médico y Rango de Fecha (SP)</h2>

@if($errors->any()) <div class="alert alert-danger">{{ $errors->first() }}</div> @endif

<form action="{{ route('sp.consultas.buscar') }}" method="POST">
  @csrf
  <label>Médico</label>
  <select name="medico_id" class="form-control mb-2">
    @foreach($medicos as $m)
      <option value="{{ $m->idMedic }}">{{ $m->nombre }}</option>
    @endforeach
  </select>

  <label>Fecha inicio</label>
  <input type="date" name="fecha_inicio" class="form-control mb-2">

  <label>Fecha fin</label>
  <input type="date" name="fecha_fin" class="form-control mb-2">

  <button class="btn btn-primary">Buscar</button>
</form>
@endsection
