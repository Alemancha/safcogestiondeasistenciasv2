@extends('layouts.app')
@section('panel')

<style>
    .table-hover tbody tr:hover {
        background-color: #f6fafd !important;
        transition: background 0.2s;
    }
    .btn-action:hover {
        transform: scale(1.08);
        box-shadow: 0 3px 14px -5px #17c39744;
        transition: all .18s;
    }
    .btn-action:active { transform: scale(1.01);}
    .th-id i          { color: #7b8fa1; }
    .th-empleado i    { color: #2563eb; }
    .th-tipopago i    { color: #00bfff; }
    .th-monto i       { color: #13b16d; }
    .th-moneda i      { color: #fdba08; }
    .th-fecha i       { color: #2b2d42; }
    .th-compensacion i{ color: #13b16d; }
    .th-acciones i    { color: #e11d48; }

    /* Responsive: Botón PDF debajo en pantallas chicas */
    @media (max-width: 768px) {
        .pagos-header-flex { flex-wrap: wrap; gap: 0.5rem; }
        .pagos-header-flex .export-btn { width: 100%; margin-left: 0 !important; }
    }
</style>

<div class="container py-5" style="min-height: 100vh;">
    <div class="mx-auto" style="max-width:1200px;">
        <div class="card border-0 shadow-lg rounded-4" style="overflow:hidden;">
            <div class="card-body px-4 py-4">
                <div class="d-flex align-items-center gap-2 mb-3 pagos-header-flex">
                    <i class="bi bi-cash-coin" style="font-size:2rem; color:#17c397;"></i>
                    <span class="fs-2 fw-bold" style="color:#17c397;">Pagos</span>
                    
                    <!-- Botón Exportar PDF -->
                    <a href="{{ route('pagos.export.pdf') }}" target="_blank"
                        class="btn btn-outline-danger rounded-3 px-4 fw-semibold ms-3 export-btn"
                        style="box-shadow:0 2px 10px -6px #c54f4444;">
                        <i class="bi bi-file-earmark-pdf-fill me-1"></i> Exportar PDF
                    </a>

                    <div class="ms-auto">
                        <a href="{{ route('pagos.create') }}" class="btn rounded-pill px-4 py-2 fw-semibold"
                            style="background:#17c397; color:#fff; font-size:1.1rem; box-shadow:0 2px 10px -6px #17c39744;">
                            <i class="bi bi-plus-circle"></i> Nuevo Pago
                        </a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="pagosTable"
                        class="table align-middle table-hover table-borderless mb-0"
                        style="background:#fff; border-radius:1.5rem; overflow:hidden;">
                        <thead class="table-light">
                            <tr>
                                <th class="text-center th-id">#</th>
                                <th class="text-center th-empleado">
                                    <i class="bi bi-person-badge"></i>
                                    <span class="fw-bold ms-1">Id Empleado</span>
                                </th>
                                <th class="text-center th-tipopago">
                                    <i class="bi bi-wallet2"></i>
                                    <span class="fw-bold ms-1">Tipo Pago</span>
                                </th>
                                <th class="text-center th-monto">
                                    <i class="bi bi-currency-dollar"></i>
                                    <span class="fw-bold ms-1">Monto</span>
                                </th>
                                <th class="text-center th-moneda">
                                    <i class="bi bi-cash-stack"></i>
                                    <span class="fw-bold ms-1">Moneda</span>
                                </th>
                                <th class="text-center th-fecha">
                                    <i class="bi bi-calendar-date"></i>
                                    <span class="fw-bold ms-1">Fecha</span>
                                </th>
                                <th class="text-center th-compensacion">
                                    <i class="bi bi-patch-check"></i>
                                    <span class="fw-bold ms-1">Compensación</span>
                                </th>
                                <th class="text-center th-acciones">
                                    <i class="bi bi-gear"></i>
                                    <span class="fw-bold ms-1">Acciones</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($pagos as $pago)
                            <tr>
                                <td class="text-center fw-semibold text-secondary">{{ $pago->IdPago }}</td>
                                <td class="text-center">{{ $pago->IdEmpleado }}</td>
                                <td class="text-center">
                                    <span class="badge" style="background:#e6faff; color:#00bfff; font-weight:600;">
                                        {{ $pago->IdTipoPago ?? '-' }}
                                    </span>
                                </td>
                                <td class="text-center">
                                    <span class="badge" style="background:#e0f8ea; color:#13b16d; font-weight:500;">
                                        ${{ number_format($pago->Monto, 2) }}
                                    </span>
                                </td>
                                <td class="text-center">{{ $pago->Moneda }}</td>
                                <td class="text-center">
                                    <span class="badge" style="background:#f2f2f2; color:#2b2d42; font-weight:500;">
                                        {{ \Carbon\Carbon::parse($pago->Fecha_pago)->format('d/m/Y') }}
                                    </span>
                                </td>
                                <td class="text-center">
                                    @if($pago->TipoCompensacion)
                                        <span class="badge" style="background:#e0f8ea; color:#13b16d; font-weight:600;">
                                            {{ $pago->TipoCompensacion }}
                                        </span>
                                    @else
                                        <span class="badge bg-secondary-subtle text-secondary">-</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <div class="d-flex gap-1 justify-content-center">
                                        <!-- BOTÓN DE BOLETA PDF -->
                                        <a href="{{ route('pagos.boleta', $pago) }}" 
                                            class="btn btn-sm btn-outline-success rounded-circle btn-action" 
                                            title="Boleta de Pago" target="_blank">
                                            <i class="bi bi-receipt"></i>
                                        </a>
                                        <!-- BOTÓN DE EDITAR -->
                                        <a href="{{ route('pagos.edit', $pago) }}" class="btn btn-sm btn-outline-warning rounded-circle btn-action" title="Editar">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <!-- BOTÓN DE ELIMINAR -->
                                        <form action="{{ route('pagos.destroy', $pago) }}" method="POST" onsubmit="return confirm('¿Eliminar pago?')" style="display:inline;">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger rounded-circle btn-action" title="Eliminar">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- DataTables scripts -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css"/>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function() {
        $('#pagosTable').DataTable({
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json'
            }
        });
    });
</script>
@endsection
