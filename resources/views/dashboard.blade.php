@extends('layouts.app')

@push('styles')
<style>
    .dashboard-grid {
        display: flex;
        flex-direction: column;
        gap: 1.5rem;
    }

    .welcome-banner {
        background: linear-gradient(120deg, rgba(229, 57, 53, 0.9), rgba(255, 138, 101, 0.88)), url('https://images.unsplash.com/photo-1542838132-92c53300491e?auto=format&fit=crop&w=1400&q=80') center/cover;
        color: #fff;
        border-radius: 1.8rem !important;
        overflow: hidden;
    }

    .welcome-banner .card-body {
        display: flex;
        flex-direction: column;
        gap: 1.2rem;
    }

    .welcome-banner h2 {
        font-size: clamp(1.7rem, 1.1rem + 1.4vw, 2.4rem);
        font-weight: 700;
        margin-bottom: 0.35rem;
    }

    .welcome-banner p {
        font-size: 1rem;
        max-width: 560px;
        color: rgba(255, 255, 255, 0.85);
    }

    .welcome-banner .badge-pill {
        align-self: flex-start;
        background: rgba(255, 255, 255, 0.2);
        color: #fff;
        border-radius: 999px;
        font-weight: 600;
        padding: 0.45rem 1.1rem;
        letter-spacing: 0.02em;
    }

    .quick-actions {
        display: flex;
        flex-wrap: wrap;
        gap: 0.8rem;
    }

    .quick-actions .btn {
        border-radius: 1rem;
        font-weight: 600;
        backdrop-filter: blur(2px);
        border: none;
    }

    .quick-metric .metric-label {
        font-size: 0.9rem;
        text-transform: uppercase;
        letter-spacing: 0.12em;
        color: #94a3b8;
        font-weight: 600;
    }

    .quick-metric .metric-value {
        font-size: 2.4rem;
        font-weight: 700;
        color: #1f2937;
    }

    .quick-metric canvas {
        margin-top: 1.2rem;
    }

    .table-card .list-group-item {
        border: none;
        border-radius: 1rem;
        margin-bottom: 0.8rem;
        box-shadow: 0 12px 30px rgba(15, 23, 42, 0.06);
    }

    .table-card .avatar {
        width: 44px;
        height: 44px;
        border-radius: 50%;
        background: linear-gradient(135deg, rgba(229, 57, 53, 0.2), rgba(255, 138, 101, 0.25));
        display: grid;
        place-items: center;
        color: #e53935;
        font-weight: 700;
    }

    .progress-soft {
        height: 10px;
        border-radius: 999px;
        background: rgba(226, 232, 240, 0.8);
    }

    .progress-soft .progress-bar {
        border-radius: inherit;
    }

    .status-pill {
        display: inline-flex;
        align-items: center;
        gap: 0.35rem;
        font-size: 0.85rem;
        font-weight: 600;
        color: #0f172a;
        padding: 0.35rem 0.9rem;
        border-radius: 999px;
        background: rgba(14, 165, 233, 0.12);
    }

    .status-pill i {
        color: #0284c7;
    }

    .card-divider {
        height: 1px;
        background: rgba(148, 163, 184, 0.2);
        margin: 1.2rem 0;
    }

    .announcement-card {
        background: rgba(15, 23, 42, 0.92);
        color: #f8fafc;
        border-radius: 1.6rem !important;
    }

    .announcement-card .list-group-item {
        background: transparent;
        border: none;
        color: rgba(248, 250, 252, 0.85);
        padding-left: 0;
    }

    @media (max-width: 992px) {
        .quick-metric canvas {
            max-height: 180px;
        }
    }

    @media (max-width: 576px) {
        .welcome-banner .card-body {
            padding: 1.6rem !important;
        }
    }
</style>
@endpush

@section('panel')
<div class="container-fluid px-0 px-xl-2 dashboard-grid">
    <div class="card welcome-banner border-0">
        <div class="card-body p-4 p-md-5">
            <span class="badge-pill"><i class="bi bi-activity me-1"></i> Semana dinámica</span>
            <h2>Gestiona asistencias, pagos y contratos desde un solo tablero</h2>
            <p>
                Visualiza los indicadores clave de la fuerza laboral agrícola y toma decisiones con datos en tiempo real.
                Usa los accesos directos para registrar nuevos eventos en segundos.
            </p>
            <div class="quick-actions">
                <a href="{{ url('asistencias/create') }}" class="btn btn-light text-danger">
                    <i class="bi bi-calendar-plus me-2"></i> Registrar asistencia
                </a>
                <a href="{{ url('empleados/create') }}" class="btn btn-outline-light">
                    <i class="bi bi-person-plus me-2"></i> Nuevo colaborador
                </a>
                <a href="{{ url('pagos') }}" class="btn btn-outline-light">
                    <i class="bi bi-receipt me-2"></i> Revisar pagos
                </a>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-12 col-lg-4">
            <div class="card quick-metric h-100">
                <div class="card-body p-4">
                    <div class="metric-label">Asistencias semana</div>
                    <div class="d-flex align-items-baseline gap-3 mt-1">
                        <div class="metric-value">48</div>
                        <span class="status-pill"><i class="bi bi-arrow-up-right"></i> +12%</span>
                    </div>
                    <p class="text-muted mb-0">Promedio general de equipos operativos</p>
                    <canvas id="asistChart" height="140"></canvas>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-4">
            <div class="card quick-metric h-100">
                <div class="card-body p-4">
                    <div class="metric-label">Pagos realizados</div>
                    <div class="d-flex align-items-baseline gap-3 mt-1">
                        <div class="metric-value text-success">S/ 4,580</div>
                        <span class="status-pill" style="background: rgba(34, 197, 94, 0.12); color: #047857;"><i class="bi bi-cash-stack"></i> 32 depósitos</span>
                    </div>
                    <p class="text-muted mb-0">Liquidaciones netas de la última semana</p>
                    <canvas id="balanceChart" height="140"></canvas>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-4">
            <div class="card quick-metric h-100">
                <div class="card-body p-4">
                    <div class="metric-label">Clima laboral</div>
                    <div class="d-flex align-items-baseline gap-3 mt-1">
                        <div class="metric-value text-primary">92%</div>
                        <span class="status-pill" style="background: rgba(59, 130, 246, 0.12); color: #1d4ed8;"><i class="bi bi-emoji-smile"></i> Excelente</span>
                    </div>
                    <p class="text-muted mb-0">Encuesta semanal de satisfacción</p>
                    <div class="card-divider"></div>
                    <div class="mb-3">
                        <div class="d-flex justify-content-between mb-1"><span>Compromiso</span><span>95%</span></div>
                        <div class="progress progress-soft" role="progressbar" aria-label="Compromiso" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100">
                            <div class="progress-bar bg-primary" style="width: 95%"></div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="d-flex justify-content-between mb-1"><span>Puntualidad</span><span>88%</span></div>
                        <div class="progress progress-soft" role="progressbar" aria-label="Puntualidad" aria-valuenow="88" aria-valuemin="0" aria-valuemax="100">
                            <div class="progress-bar bg-info" style="width: 88%"></div>
                        </div>
                    </div>
                    <div>
                        <div class="d-flex justify-content-between mb-1"><span>Retención</span><span>90%</span></div>
                        <div class="progress progress-soft" role="progressbar" aria-label="Retención" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">
                            <div class="progress-bar bg-success" style="width: 90%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-12 col-xl-7">
            <div class="card table-card h-100">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <h5 class="mb-0 fw-semibold">Pagos recientes</h5>
                        <a href="{{ url('pagos') }}" class="btn btn-sm btn-outline-danger rounded-pill"><i class="bi bi-list"></i> Ver todo</a>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center gap-3">
                                <div class="avatar">AT</div>
                                <div>
                                    <div class="fw-semibold">Ana Torres</div>
                                    <small class="text-muted">Pago sueldo • 12/07</small>
                                </div>
                            </div>
                            <span class="fw-semibold text-success">+S/ 1,200</span>
                        </li>
                        <li class="list-group-item d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center gap-3">
                                <div class="avatar">JP</div>
                                <div>
                                    <div class="fw-semibold">Juan Pérez</div>
                                    <small class="text-muted">Bono puntualidad • 10/07</small>
                                </div>
                            </div>
                            <span class="fw-semibold text-success">+S/ 250</span>
                        </li>
                        <li class="list-group-item d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center gap-3">
                                <div class="avatar">PD</div>
                                <div>
                                    <div class="fw-semibold">Pedro Díaz</div>
                                    <small class="text-muted">Descuento • 09/07</small>
                                </div>
                            </div>
                            <span class="fw-semibold text-danger">-S/ 30</span>
                        </li>
                        <li class="list-group-item d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center gap-3">
                                <div class="avatar">MG</div>
                                <div>
                                    <div class="fw-semibold">María Gómez</div>
                                    <small class="text-muted">Liquidación extraordinaria • 08/07</small>
                                </div>
                            </div>
                            <span class="fw-semibold text-success">+S/ 860</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-12 col-xl-5">
            <div class="card announcement-card h-100">
                <div class="card-body p-4">
                    <h5 class="fw-semibold mb-3">Próximas actividades</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item px-0 py-3">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <div class="fw-semibold text-white">Capacitación de seguridad agrícola</div>
                                    <small>15 de julio • 09:30 a.m.</small>
                                </div>
                                <span class="badge rounded-pill bg-light text-dark">Áreas</span>
                            </div>
                        </li>
                        <li class="list-group-item px-0 py-3">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <div class="fw-semibold text-white">Auditoría de contratos temporales</div>
                                    <small>17 de julio • 04:00 p.m.</small>
                                </div>
                                <span class="badge rounded-pill bg-primary">Contratos</span>
                            </div>
                        </li>
                        <li class="list-group-item px-0 py-3">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <div class="fw-semibold text-white">Cierre de nómina quincenal</div>
                                    <small>18 de julio • 06:00 p.m.</small>
                                </div>
                                <span class="badge rounded-pill bg-warning text-dark">Pagos</span>
                            </div>
                        </li>
                    </ul>
                    <div class="card-divider"></div>
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <div class="fw-semibold text-white">Tareas completadas esta semana</div>
                            <small>28 de 32 actividades programadas</small>
                        </div>
                        <div class="text-end">
                            <h2 class="mb-0 text-white">87%</h2>
                            <small class="text-white-50">+5% vs semana anterior</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const asistCtx = document.getElementById('asistChart');
    const balanceCtx = document.getElementById('balanceChart');

    if (asistCtx) {
        new Chart(asistCtx, {
            type: 'bar',
            data: {
                labels: ['Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'Sáb'],
                datasets: [{
                    label: 'Asistencias',
                    data: [8, 7, 9, 8, 10, 6],
                    backgroundColor: 'rgba(229, 57, 53, 0.7)',
                    borderRadius: 12,
                    borderSkipped: false
                }]
            },
            options: {
                plugins: { legend: { display: false } },
                scales: {
                    x: { grid: { display: false } },
                    y: { grid: { color: 'rgba(148, 163, 184, 0.2)' }, beginAtZero: true, ticks: { stepSize: 2 } }
                }
            }
        });
    }

    if (balanceCtx) {
        new Chart(balanceCtx, {
            type: 'line',
            data: {
                labels: ['Abr', 'May', 'Jun', 'Jul'],
                datasets: [{
                    label: 'Ingresos',
                    data: [3200, 3800, 4100, 4580],
                    borderColor: 'rgba(16, 185, 129, 1)',
                    backgroundColor: 'rgba(16, 185, 129, 0.18)',
                    fill: true,
                    tension: 0.45,
                    pointRadius: 6,
                    pointHoverRadius: 8,
                    pointBackgroundColor: '#10b981'
                }]
            },
            options: {
                plugins: { legend: { display: false } },
                scales: {
                    x: { grid: { display: false } },
                    y: { grid: { color: 'rgba(148, 163, 184, 0.2)' }, beginAtZero: false }
                }
            }
        });
    }
</script>
@endpush
