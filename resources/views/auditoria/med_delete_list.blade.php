@extends('layouts.app')
@section('content')
<div class="container py-5">
    <h3 class="text-center mb-4">Eliminar Medicamento (Trigger Delete)</h3>
    <div class="card shadow">
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Medicamento</th>
                        <th>Marca</th>
                        <th>Stock</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($medicamentos as $m)
                    <tr>
                        <td>{{ $m->nombreMedicament }}</td>
                        <td>{{ $m->marcaMedicament }}</td>
                        <td>{{ $m->stockMedicament }}</td>
                        <td>
                            <form action="{{ route('auditoria.destroyMed', $m->idMedicament) }}" method="POST" onsubmit="return confirm('¿Borrar este medicamento?');">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">Eliminar <i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $medicamentos->links() }}
        </div>
    </div>
    <div class="text-center mt-3"><a href="{{ route('auditoria.index') }}" class="btn btn-secondary">Volver</a></div>
</div>
@endsection