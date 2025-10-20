<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>SAFCO | Gestión de Asistencias</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background: url('https://blog.rotoplas.com.pe/wp-content/uploads/2023/02/5-Aspectos-a-tomar-en-cuenta-para-el-cultivo-de-uva-1.jpg') no-repeat center center fixed;
            background-size: cover;
            background-color: #f5f6fa;
        }
        .sidebar-safco {
            min-height: 100vh;
            background: #ee3a3a;
            color: #fff;
            border-right: none;
            border-radius: 0 1.5rem 1.5rem 0;
            box-shadow: 0 4px 20px 0 rgba(50,50,93,.07), 0 1.5px 7px 0 rgba(50,50,93,.06);
            padding: 2rem 0 2rem 0;
            width: 240px;
            position: fixed;
            left: 0; top: 0; bottom: 0;
            z-index: 1030;
            display: flex;
            flex-direction: column;
            transition: width .2s;
        }
        .sidebar-safco .logo-area {
            display: flex;
            align-items: center;
            justify-content: center;
            padding-bottom: 1.5rem;
            padding-left: 0;
            padding-top: 0.5rem;
            margin-bottom: 0.5rem;
        }
        .sidebar-safco .logo-area img {
            width: 75px;
            height: 75px;
            border-radius: 18px;
            object-fit: cover;
            box-shadow: 0 2px 12px 0 rgba(30,30,40,.11);
            display: block;
        }
        .sidebar-safco .modules-label {
            font-size: 0.8rem;
            color: #ffe4e0;
            font-weight: 700;
            letter-spacing: 1px;
            margin: 0 0 16px 2rem;
            text-transform: uppercase;
            transition: opacity .2s;
        }
        .sidebar-safco .nav-link {
            color: #fff;
            font-weight: 500;
            border-radius: 12px;
            margin: 0 12px 6px 12px;
            padding: 10px 18px;
            display: flex;
            align-items: center;
            transition: background .18s, color .18s, font-size .18s;
            font-size: 1.07rem;
            gap: 10px;
            white-space: nowrap;
        }
        .sidebar-safco .nav-link .icon-box {
            width: 2.2rem; height: 2.2rem;
            background: rgba(255,255,255,0.15);
            border-radius: 8px;
            display: flex; align-items: center; justify-content: center;
            font-size: 1.35rem;
            color: #fff;
            margin-right: 10px;
        }
        .sidebar-safco .nav-link.active,
        .sidebar-safco .nav-link:hover {
            background: #fff;
            color: #f44336 !important;
        }
        .sidebar-safco .nav-link.active .icon-box,
        .sidebar-safco .nav-link:hover .icon-box {
            background: #f44336;
            color: #fff;
            border: 2px solid #f44336;
        }
        .main-panel-safco {
            margin-left: 240px;
            padding: 2rem 2.5rem;
            min-height: 100vh;
            border-radius: 2rem;
            box-shadow: 0 8px 32px 0 rgba(0,0,0,.08);
            transition: margin-left .2s, padding .2s;
        }
        .card {
            background: rgba(255,255,255,0.97) !important;
            border-radius: 1.4rem !important;
            box-shadow: 0 6px 24px 0 rgba(50,50,93,.12) !important;
        }
        /* WEB RESPONSIVE: angosta el sidebar pero nunca lo esconde */
        @media (max-width: 1200px) {
            .sidebar-safco { width: 175px; }
            .main-panel-safco { margin-left: 175px; padding: 1rem; }
            .sidebar-safco .logo-area { padding-left: 0; }
            .sidebar-safco .modules-label { margin-left: 1rem; }
            .sidebar-safco .nav-link { font-size: .95rem; padding: 8px 11px; gap: 8px; }
            .sidebar-safco .nav-link .icon-box { width: 1.7rem; height: 1.7rem; font-size: 1.08rem; margin-right: 4px;}
        }
        /* Solo iconos, ideal para laptops/tablet web */
        @media (max-width: 900px) {
            .sidebar-safco { width: 60px; align-items: center; padding: 1.2rem 0; }
            .sidebar-safco .logo-area { padding-left: 0; justify-content: center; }
            .sidebar-safco .logo-area img { width: 42px; height: 42px; }
            .sidebar-safco .modules-label { display: none; }
            .sidebar-safco .nav-link { font-size: 0; padding: 10px 0; margin: 0 0 7px 0; justify-content: center;}
            .sidebar-safco .nav-link .icon-box { margin: 0; width: 2rem; height: 2rem; font-size: 1.28rem; }
            .sidebar-safco .nav-link span:not(.icon-box) { display: none; }
            .main-panel-safco { margin-left: 60px; padding: .8rem; }
        }
        /* Mantiene accesible siempre la última opción en cualquier tamaño */
        .sidebar-safco .nav-link:last-child {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
<div class="sidebar-safco">
    <div class="logo-area">
        <img src="https://scontent.fpio4-1.fna.fbcdn.net/v/t1.6435-9/160039911_208055031117744_1899946897685409851_n.jpg?_nc_cat=100&ccb=1-7&_nc_sid=6ee11a&_nc_ohc=-cEtrkNdZ-QQ7kNvwFNraUs&_nc_oc=Adk13R3Wqd_edKOOfDEjRTPWW6tsF9MQGTA7hzqRmkO6Sj-fizMc_JSUYDpOBfPWwyBcuNLWj2FtSJFPtNE-6VrL&_nc_zt=23&_nc_ht=scontent.fpio4-1.fna&_nc_gid=ZesaRUlTG_99ZhQyQDhF1g&oh=00_AfSRDHRKzVIzUh8ssNg6mL3UNTz57x7WEb5Qr_-CeTSc8w&oe=68ACBB1B"
             alt="Logo SAFCO">
    </div>
    <div class="modules-label">MÓDULOS</div>
    <nav class="nav flex-column">
        <a href="{{ url('/') }}" class="nav-link {{ request()->is('/') ? 'active' : '' }}">
            <span class="icon-box"><i class="bi bi-grid-fill"></i></span><span>Dashboard</span>
        </a>
        <a href="{{ url('empleados') }}" class="nav-link {{ request()->is('empleados*') ? 'active' : '' }}">
            <span class="icon-box"><i class="bi bi-person-badge"></i></span><span>Empleados</span>
        </a>
        <a href="{{ url('cargos') }}" class="nav-link {{ request()->is('cargos*') ? 'active' : '' }}">
            <span class="icon-box"><i class="bi bi-briefcase"></i></span><span>Cargos</span>
        </a>
        <a href="{{ url('areas') }}" class="nav-link {{ request()->is('areas*') ? 'active' : '' }}">
            <span class="icon-box"><i class="bi bi-buildings"></i></span><span>Áreas</span>
        </a>
        <a href="{{ url('documentos') }}" class="nav-link {{ request()->is('documentos*') ? 'active' : '' }}">
            <span class="icon-box"><i class="bi bi-file-earmark"></i></span><span>Documentos</span>
        </a>
        <a href="{{ url('contratos') }}" class="nav-link {{ request()->is('contratos*') ? 'active' : '' }}">
            <span class="icon-box"><i class="bi bi-journal-text"></i></span><span>Contratos</span>
        </a>
        <a href="{{ url('asistencias') }}" class="nav-link {{ request()->is('asistencias*') ? 'active' : '' }}">
            <span class="icon-box"><i class="bi bi-calendar-check"></i></span><span>Asistencias</span>
        </a>
        <a href="{{ url('pagos') }}" class="nav-link {{ request()->is('pagos*') ? 'active' : '' }}">
            <span class="icon-box"><i class="bi bi-cash-stack"></i></span><span>Pagos</span>
        </a>
        <a href="{{ url('usuarios') }}" class="nav-link {{ request()->is('usuarios*') ? 'active' : '' }}">
            <span class="icon-box"><i class="bi bi-people"></i></span><span>Usuarios</span>
        </a>
    </nav>
</div>
<div class="main-panel-safco">
    @yield('panel')
</div>
</body>
</html>
