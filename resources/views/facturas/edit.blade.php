@extends('layouts.app')

@section('content')
<div class="container">
	<h1>Editar Factura</h1>
	<form action="{{ route('facturas.update', $factura->id) }}" method="POST">
		@csrf
		@method('PUT')

		<div class="mb-3">
			<label for="numero" class="form-label">Número de Factura</label>
			<input type="text" class="form-control" id="numero" name="numero" value="{{ old('numero', $factura->numero) }}">
		</div>

		<div class="mb-3">
			<label for="fecha" class="form-label">Fecha</label>
			<input type="date" class="form-control" id="fecha" name="fecha" value="{{ old('fecha', $factura->fecha) }}">
		</div>

		<div class="mb-3">
			<label for="monto" class="form-label">Monto</label>
			<input type="number" step="0.01" class="form-control" id="monto" name="monto" value="{{ old('monto', $factura->monto) }}">
		</div>

		<!-- Agrega más campos según tu modelo -->

		<button type="submit" class="btn btn-primary">Guardar cambios</button>
	</form>
</div>
@endsection
