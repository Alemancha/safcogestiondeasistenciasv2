@extends('layouts.app')
@section('panel')

<style>
    .table-contratos thead th {
        background: #f5f6fa;
        font-weight: 700;
        color: #222;
        font-size: 1.07rem;
        border-bottom: 2px solid #e0e6ed;
    }
    .table-contratos tbody td {
        background: #fff;
        vertical-align: middle;
        font-size: 1.05rem;
        border-bottom: 1px solid #f1f3f7;
    }
    .table-contratos .badge {
        border-radius: 7px;
        padding: 5px 14px;
        font-size: 0.96rem;
    }
    .table-contratos .badge-fecha {
        background: #e0f8ea;
        color: #13b16d;
    }
    .table-contratos .badge-fin {
        background: #fee2e2;
        color: #e11d48;
    }
    .table-contratos .badge-firma {
        background: #e7e9fc;
        color: #7c3aed;
    }
    .table-contratos .badge-tipo {
        background: #e6f0fa;
        color: #2563eb;
        font-weight: 600;
    }
    .btn-action {
        transition: 0.14s;
    }
    .btn-action:hover {
        transform: scale(1.10);
        box-shadow: 0 3px 14px -5px #17c39733;
        background: #f5f7fb;
    }
</style>

<div class="container py-5" style="min-height: 100vh;">
    <div class="mx-auto" style="max-width:1200px;">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show mb-4" role="alert" style="font-size:1.05rem;">
                <i class="bi bi-check-circle-fill"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="table-responsive shadow-lg rounded-4" style="background: #fff;">
            <div class="d-flex align-items-center gap-2 mb-2 pt-4 px-4">
                <i class="bi bi-journal-text" style="font-size:2rem; color:#17c397;"></i>
                <span class="fs-2 fw-bold" style="color:#17c397;">Contratos</span>
                <div class="ms-auto">
                    <a href="{{ route('contratos.create') }}" class="btn btn-success rounded-pill px-4 fw-semibold shadow-sm">
                        <i class="bi bi-plus-circle"></i> Nuevo Contrato
                    </a>
                </div>
            </div>
            <table class="table table-contratos align-middle mb-0">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center"><i class="bi bi-clock"></i> Horario</th>
                        <th class="text-center"><i class="bi bi-arrow-repeat"></i> Turno</th>
                        <th class="text-center"><i class="bi bi-calendar3"></i> Periodo</th>
                        <th class="text-center"><i class="bi bi-calendar-check"></i> Inicio</th>
                        <th class="text-center"><i class="bi bi-calendar-x"></i> Fin</th>
                        <th class="text-center"><i class="bi bi-calendar-event"></i> Firma</th>
                        <th class="text-center"><i class="bi bi-currency-dollar"></i> Sueldo</th>
                        <th class="text-center"><i class="bi bi-cash-stack"></i> Moneda</th>
                        <th class="text-center"><i class="bi bi-file-earmark-text"></i> Tipo</th>
                        <th class="text-center"><i class="bi bi-gear"></i> Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($contratos as $contrato)
                        <tr>
                            <td class="text-center text-secondary fw-semibold">{{ $contrato->IdContrato }}</td>
                            <td class="text-center">{{ $contrato->Horario }}</td>
                            <td class="text-center">{{ $contrato->Turno }}</td>
                            <td class="text-center fw-semibold" style="color:#365;">{{ $contrato->PeriodoContr }}</td>
                            <td class="text-center">
                                <span class="badge badge-fecha">
                                    <i class="bi bi-calendar-check"></i> {{ $contrato->Fecha_inicioContr }}
                                </span>
                            </td>
                            <td class="text-center">
                                <span class="badge badge-fin">
                                    <i class="bi bi-calendar-x"></i> {{ $contrato->Fecha_FinContr }}
                                </span>
                            </td>
                            <td class="text-center">
                                <span class="badge badge-firma">
                                    <i class="bi bi-calendar-event"></i> {{ $contrato->Fecha_Firma }}
                                </span>
                            </td>
                            <td class="text-center">
                                <span class="badge badge-fecha">
                                    <i class="bi bi-currency-dollar"></i> {{ number_format($contrato->SueldoContr, 2) }}
                                </span>
                            </td>
                            <td class="text-center">{{ $contrato->Moneda }}</td>
                            <td class="text-center">
                                <span class="badge badge-tipo">
                                    {{ $contrato->TipoContrato }}
                                </span>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('contratos.edit', $contrato->IdContrato) }}"
                                   class="btn btn-sm btn-outline-primary rounded-circle me-2 btn-action"
                                   title="Editar">
                                    <i class="bi bi-pencil" style="font-size:1.2rem;"></i>
                                </a>
                                <form action="{{ route('contratos.destroy', $contrato->IdContrato) }}" method="POST" style="display:inline;">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger rounded-circle btn-action"
                                        title="Eliminar" onclick="return confirm('¿Seguro?')">
                                        <i class="bi bi-trash" style="font-size:1.2rem;"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="11" class="text-center text-muted py-4">No hay contratos registrados.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if(method_exists($contratos, 'links'))
        <div class="d-flex justify-content-end mt-4 px-3 pb-3">
            {{ $contratos->links() }}
        </div>
        @endif
    </div>
</div>
@endsection
