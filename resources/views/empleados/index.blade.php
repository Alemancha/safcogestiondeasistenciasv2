@extends('layouts.app')

@section('panel')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="fw-bold" style="color:#22b573;">
            <i class="bi bi-people"></i> Empleados
        </h2>
        <a href="{{ route('empleados.create') }}" class="btn btn-success rounded-pill px-4 shadow-sm">
            <i class="bi bi-plus-circle"></i> Nuevo Empleado
        </a>
    </div>

    {{-- Bloque de botones de exportación --}}
    <div class="mb-3 d-flex gap-2">
        <button class="btn btn-outline-success rounded-3 px-4" disabled>
            <i class="bi bi-file-earmark-excel-fill"></i> Exportar Excel
        </button>
        <button class="btn btn-outline-primary rounded-3 px-4" disabled>
            <i class="bi bi-filetype-csv"></i> Exportar CSV
        </button>
        <a href="{{ route('empleados.export.pdf') }}" class="btn btn-outline-danger rounded-3 px-4" target="_blank">
            <i class="bi bi-file-earmark-pdf-fill"></i> Exportar PDF
        </a>
    </div>

    <div class="card border-0 shadow-lg rounded-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table align-middle table-hover mb-0" style="background: #f9fafb;">
                    <thead class="table-light align-middle">
                        <tr>
                            <th class="text-center">👤<br>Avatar</th>
                            <th class="text-center">🪪<br>Nombre</th>
                            <th class="text-center">🏢<br>Área</th>
                            <th class="text-center">📝<br>Tarea</th>
                            <th class="text-center">📅<br>Fecha Ingreso</th>
                            <th class="text-center">✅<br>Estado</th>
                            <th class="text-center">⚙️<br>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($empleados as $empleado)
                        <tr>
                            <td class="text-center align-middle">
                                <img src="{{ $empleado->avatar_url ?? 'https://i.imgur.com/UqsO8cM.jpeg' }}"
                                     class="rounded-circle shadow-sm" alt="Avatar" width="44" height="44">
                            </td>
                            <td class="text-center align-middle">
                                <span class="fw-semibold" style="font-size:1.08rem;">{{ $empleado->NomEmp }}</span>
                                <div class="text-muted small">{{ $empleado->ApellidoEmp }}</div>
                            </td>
                            <td class="text-center align-middle">
                                <span class="badge bg-info text-dark" style="font-size:.97rem;">
                                    {{ $empleado->Area ?? '---' }}
                                </span>
                            </td>
                            <td class="text-center align-middle">
                                <span class="badge bg-secondary text-white" style="font-size:.97rem;">
                                    {{ $empleado->Tarea ?? '---' }}
                                </span>
                            </td>
                            <td class="text-center align-middle">
                                {{ $empleado->FechaIngreso ? \Carbon\Carbon::parse($empleado->FechaIngreso)->format('d/m/Y') : '---' }}
                            </td>
                            <td class="text-center align-middle">
                                @if($empleado->Estado)
                                    <span class="badge bg-success bg-opacity-10 text-success border px-3">Activo</span>
                                @else
                                    <span class="badge bg-danger bg-opacity-10 text-danger border px-3">Inactivo</span>
                                @endif
                            </td>
                            <td class="text-center align-middle">
                                <a href="{{ route('empleados.edit', $empleado->IdEmpleado) }}" class="btn btn-outline-primary btn-sm rounded-circle me-1" title="Editar">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('empleados.destroy', $empleado->IdEmpleado) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar este empleado?')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-outline-danger btn-sm rounded-circle" title="Eliminar">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted">Sin empleados registrados.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="mt-2" style="font-size:.95rem;color:#888;">
                Mostrando {{ $empleados->count() }} empleados
            </div>
        </div>
    </div>
</div>
@endsection
