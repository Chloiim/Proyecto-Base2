@extends('layouts.app')
@section('content')
<h2>Crear Paciente (SP)</h2>

@if(session('success')) <div class="alert alert-success">{{ session('success') }}</div> @endif
@if($errors->has('db')) <div class="alert alert-danger">{{ $errors->first('db') }}</div> @endif

<form action="{{ route('sp.paciente.store') }}" method="POST">
  @csrf
  <input name="nombres" placeholder="Nombres" class="form-control mb-2" value="{{ old('nombres') }}">
  <input name="apellidos" placeholder="Apellidos" class="form-control mb-2" value="{{ old('apellidos') }}">
  <input name="dni" placeholder="DNI" class="form-control mb-2" value="{{ old('dni') }}">
  <input name="telefono" placeholder="Teléfono" class="form-control mb-2" value="{{ old('telefono') }}">
  <input name="email" placeholder="Email" class="form-control mb-2" value="{{ old('email') }}">
  <button class="btn btn-primary">Insertar (SP)</button>
</form>
@endsection
