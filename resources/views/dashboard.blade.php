@extends('layouts.app')

@section('panel')
<!DOCTYPE html>
<html lang="es">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<head>
    <meta charset="UTF-8">
    <title>Dashboard | SAFCO Gestión de Asistencias</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body { background: #f5f6fa; }
        .sidebar { min-height: 100vh; background: #fff; border-right: 1px solid #eaeaea; }
        /* Sidebar estilo Sneat con color SAFCO */
.sidebar {
    min-height: 100vh;
    background: #ea4335 !important;      /* Rojo SAFCO */
    color: #fff !important;
    border-right: none !important;
    border-radius: 0 1.5rem 1.5rem 0;
    box-shadow: 0 4px 20px 0 rgba(50,50,93,.07), 0 1.5px 7px 0 rgba(50,50,93,.06);
    padding-top: 2rem;
    padding-bottom: 2rem;
}

.sidebar .nav-link,
.sidebar .nav-link.active {
    background: transparent !important;
    color: #fff !important;
    font-weight: 500;
    border-radius: 12px;
    margin-bottom: 6px;
    padding: 10px 16px;
    transition: background .2s;
}

.sidebar .nav-link.active,
.sidebar .nav-link:hover {
    background: #fff !important;
    color: #ea4335 !important;
}

.icon-box {
    background: rgba(255,255,255,0.12) !important;
    color: #fff !important;
    margin-right: 12px;
    border-radius: 10px;
}

.sidebar .nav-link i {
    color: #fff !important;
    font-size: 1.25rem;
    margin-right: 10px;
}

.sidebar .nav-link.active i,
.sidebar .nav-link:hover i {
    color: #ea4335 !important;
}

        .icon-box { width: 2.2rem; height: 2.2rem; background: #e9ecef; border-radius: 10px; display: flex; align-items: center; justify-content: center; margin-right: 10px;}
        .card-summary { border-radius: 1.5rem; }
        .bi { vertical-align: -.125em; }
        .shadow-sm { box-shadow: 0 4px 20px 0 rgba(50,50,93,.05), 0 1.5px 7px 0 rgba(50,50,93,.08) !important; }
        .dashboard-label { font-size: .95rem; color: #636e72; }
        .dashboard-stat { font-size: 2.2rem; font-weight: 700; }
        .avatar-sm { width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center;}
    </style>
</head>
<body>
<div class="d-flex">

    <!-- Main -->
    <div class="flex-grow-1 p-4">
        <!-- BIENVENIDA GRANDE -->
        <div class="card shadow-sm mb-4" style="border-radius: 22px;">
            <div class="card-body d-flex justify-content-between align-items-center" style="background: #fff;">
                <div>
                    <h2 class="fw-bold mb-1" style="font-size:2.1rem;">Bienvenido(a) a SAFCO | Gestión de Asistencias</h2>
                    <div class="mb-0 text-muted" style="font-size:1.08rem;">
                        Panel general de monitoreo y control
                    </div>
                </div>
                <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt="Usuario" width="72" style="border-radius: 60px; background:#e5edfa;">
            </div>
        </div>
        <!-- TARJETA DE FELICITACIÓN SNEAT -->
        <div class="card shadow-sm mb-4" style="border-radius: 22px;">
            <div class="card-body d-flex justify-content-between align-items-center" style="background: #fff;">
                <div>
                    <h5 class="fw-bold mb-2" style="color: #696cff;">
                        ¡Felicidades, Ali! 🎉
                    </h5>
                    <div class="mb-2 text-muted" style="font-size:1rem;">
                        Has gestionado 72% más asistencias esta semana.<br>
                        Consulta tu nuevo logro en el perfil.
                    </div>
                    <a href="#" class="btn btn-outline-primary btn-sm px-3 mt-1" style="border-radius: 8px;">Ver Logros</a>
                </div>
                <img src="https://cdni.iconscout.com/illustration/premium/thumb/man-working-on-laptop-6003730-4985033.png" alt="Celebración" width="100" style="border-radius: 12px; background:#f5f6fa;">
            </div>
        </div>
        <!-- Dashboard principal -->
        <div class="row g-4">

            <!-- CARD 1 - Estadísticas Asistencias -->
            <div class="col-12 col-md-4">
                <div class="card card-summary shadow-sm h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <span class="fw-semibold">Asistencias esta semana</span>
                            <span class="avatar-sm bg-primary bg-opacity-10"><i class="bi bi-person-check text-primary fs-4"></i></span>
                        </div>
                        <div class="dashboard-stat text-primary">48</div>
                        <div class="dashboard-label mb-3">Total asistencias</div>
                        <canvas id="asistBarChart" height="80"></canvas>
                    </div>
                </div>
            </div>

            <!-- CARD 2 - Balance Semanal -->
            <div class="col-12 col-md-4">
                <div class="card card-summary shadow-sm h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <span class="fw-semibold">Balance Semanal</span>
                            <span class="avatar-sm bg-success bg-opacity-10"><i class="bi bi-currency-dollar text-success fs-4"></i></span>
                        </div>
                        <div class="dashboard-stat text-success">S/ 4,580</div>
                        <div class="dashboard-label mb-3">Pagos netos</div>
                        <canvas id="balanceChart" height="80"></canvas>
                    </div>
                </div>
            </div>

            <!-- CARD 3 - Pagos Recientes -->
            <div class="col-12 col-md-4">
                <div class="card card-summary shadow-sm h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <span class="fw-semibold">Pagos Recientes</span>
                            <span class="avatar-sm bg-info bg-opacity-10"><i class="bi bi-cash-stack text-info fs-4"></i></span>
                        </div>
                        <ul class="list-unstyled mb-0">
                            <li class="d-flex align-items-center mb-3">
                                <span class="avatar-sm bg-primary bg-opacity-10 me-2"><i class="bi bi-person-circle text-primary"></i></span>
                                <div class="flex-grow-1">
                                    <div class="fw-bold">Ana Torres</div>
                                    <small class="text-muted">Pago sueldo • 12/07</small>
                                </div>
                                <div class="fw-semibold text-success">+S/ 1200</div>
                            </li>
                            <li class="d-flex align-items-center mb-3">
                                <span class="avatar-sm bg-success bg-opacity-10 me-2"><i class="bi bi-person-circle text-success"></i></span>
                                <div class="flex-grow-1">
                                    <div class="fw-bold">Juan Pérez</div>
                                    <small class="text-muted">Bono puntualidad • 10/07</small>
                                </div>
                                <div class="fw-semibold text-success">+S/ 250</div>
                            </li>
                            <li class="d-flex align-items-center">
                                <span class="avatar-sm bg-danger bg-opacity-10 me-2"><i class="bi bi-person-circle text-danger"></i></span>
                                <div class="flex-grow-1">
                                    <div class="fw-bold">Pedro Díaz</div>
                                    <small class="text-muted">Descuento • 09/07</small>
                                </div>
                                <div class="fw-semibold text-danger">-S/ 30</div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Segunda fila -->
        <div class="row g-4 mt-1">
            <div class="col-12 col-md-4">
                <div class="card card-summary shadow-sm h-100">
                    <div class="card-body">
                        <div class="fw-semibold mb-2">Empleados activos</div>
                        <div class="d-flex align-items-center">
                            <span class="avatar-sm bg-info bg-opacity-10 me-3"><i class="bi bi-person-badge text-info"></i></span>
                            <span class="fs-3 fw-bold text-primary">52</span>
                            <span class="ms-2 dashboard-label">/ 58</span>
                        </div>
                        <div class="dashboard-label mt-2">En nómina</div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="card card-summary shadow-sm h-100">
                    <div class="card-body">
                        <div class="fw-semibold mb-2">Contratos vigentes</div>
                        <div class="d-flex align-items-center">
                            <span class="avatar-sm bg-warning bg-opacity-10 me-3"><i class="bi bi-file-earmark-text text-warning"></i></span>
                            <span class="fs-3 fw-bold text-warning">49</span>
                        </div>
                        <div class="dashboard-label mt-2">A la fecha</div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="card card-summary shadow-sm h-100">
                    <div class="card-body">
                        <div class="fw-semibold mb-2">Vacaciones solicitadas</div>
                        <div class="d-flex align-items-center">
                            <span class="avatar-sm bg-danger bg-opacity-10 me-3"><i class="bi bi-calendar3 text-danger"></i></span>
                            <span class="fs-3 fw-bold text-danger">5</span>
                        </div>
                        <div class="dashboard-label mt-2">Este mes</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Chart.js Script -->
<script>
document.addEventListener("DOMContentLoaded", function () {
    // Asistencias - Barras
    new Chart(document.getElementById('asistBarChart'), {
        type: 'bar',
        data: {
            labels: ['Lun', 'Mar', 'Mié', 'Jue', 'Vie'],
            datasets: [{
                label: 'Asistencias',
                data: [7, 6, 5, 8, 9],
                backgroundColor: '#6366f1',
                borderRadius: 12,
                maxBarThickness: 22
            }]
        },
        options: { 
            plugins: { legend: { display: false } }, 
            scales: { y: { beginAtZero: true } }
        }
    });
    // Balance semanal - Línea
    new Chart(document.getElementById('balanceChart'), {
        type: 'line',
        data: {
            labels: ['Semana 1', 'Semana 2', 'Semana 3', 'Semana 4'],
            datasets: [{
                label: 'Balance S/.', data: [1200, 1150, 1100, 1130],
                fill: true,
                backgroundColor: 'rgba(99,102,241,0.1)',
                borderColor: '#22c55e',
                tension: .35
            }]
        },
        options: { plugins: { legend: { display: false } } }
    });
});
</script>
</body>
</html>
@endsection