<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>SAFCO | Gestión de Asistencias</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        :root {
            --safco-red: #e53935;
            --safco-red-dark: #c62828;
            --safco-cream: #fff7f4;
            --safco-night: #1f2a37;
            --sidebar-width: 260px;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'Public Sans', 'Segoe UI', sans-serif;
            color: var(--safco-night);
            background: radial-gradient(circle at top, rgba(229, 57, 53, 0.16) 0%, rgba(255, 255, 255, 0.72) 40%, rgba(255,255,255,1) 100%);
            min-height: 100vh;
            position: relative;
        }

        body::before {
            content: "";
            position: fixed;
            inset: 0;
            background: url('https://blog.rotoplas.com.pe/wp-content/uploads/2023/02/5-Aspectos-a-tomar-en-cuenta-para-el-cultivo-de-uva-1.jpg') center/cover no-repeat;
            filter: grayscale(0.1) contrast(0.9) brightness(0.95);
            opacity: 0.18;
            z-index: 0;
        }

        .app-shell {
            position: relative;
            z-index: 1;
            display: flex;
            min-height: 100vh;
            backdrop-filter: blur(0px);
        }

        .sidebar-safco {
            flex: 0 0 var(--sidebar-width);
            background: linear-gradient(165deg, var(--safco-red) 0%, #f76b5c 100%);
            color: #fff;
            padding: 2.2rem 1.5rem 2.5rem;
            display: flex;
            flex-direction: column;
            border-right: 1px solid rgba(255, 255, 255, 0.12);
            box-shadow: 0 18px 35px rgba(229, 57, 53, 0.2);
        }

        .sidebar-safco .logo-area {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1.75rem;
        }

        .sidebar-safco .logo-area img {
            width: 74px;
            height: 74px;
            border-radius: 18px;
            object-fit: cover;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.24);
        }

        .sidebar-safco .brand-text {
            text-align: center;
            font-weight: 700;
            font-size: 1.05rem;
            letter-spacing: 0.04em;
            text-transform: uppercase;
            margin-top: 0.75rem;
        }

        .sidebar-safco .modules-label {
            font-size: 0.75rem;
            color: rgba(255, 255, 255, 0.7);
            font-weight: 600;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            margin-bottom: 1rem;
        }

        .sidebar-safco nav {
            display: flex;
            flex-direction: column;
            gap: 0.4rem;
            margin-top: 0.8rem;
        }

        .sidebar-safco .nav-link {
            color: rgba(255, 255, 255, 0.92);
            font-weight: 500;
            border-radius: 1rem;
            padding: 0.75rem 1rem;
            display: flex;
            align-items: center;
            gap: 0.85rem;
            text-decoration: none;
            transition: transform 0.2s ease, box-shadow 0.2s ease, background 0.2s ease;
            position: relative;
        }

        .sidebar-safco .nav-link::after {
            content: "";
            position: absolute;
            inset: 0;
            border-radius: inherit;
            background: rgba(255, 255, 255, 0.12);
            opacity: 0;
            transition: opacity 0.2s ease;
        }

        .sidebar-safco .nav-link .icon-box {
            width: 2.3rem;
            height: 2.3rem;
            border-radius: 0.85rem;
            display: grid;
            place-items: center;
            background: rgba(255, 255, 255, 0.12);
            font-size: 1.3rem;
        }

        .sidebar-safco .nav-link span.label {
            flex: 1;
        }

        .sidebar-safco .nav-link.active,
        .sidebar-safco .nav-link:hover,
        .sidebar-safco .nav-link:focus {
            color: var(--safco-red);
            background: #fff;
            box-shadow: 0 12px 24px rgba(255, 255, 255, 0.18);
            transform: translateY(-1px);
        }

        .sidebar-safco .nav-link.active::after,
        .sidebar-safco .nav-link:hover::after,
        .sidebar-safco .nav-link:focus::after {
            opacity: 0;
        }

        .sidebar-safco .nav-link.active .icon-box,
        .sidebar-safco .nav-link:hover .icon-box {
            background: rgba(229, 57, 53, 0.14);
            color: var(--safco-red);
        }

        .sidebar-footer {
            margin-top: auto;
            padding-top: 1.5rem;
            border-top: 1px dashed rgba(255, 255, 255, 0.25);
            font-size: 0.85rem;
            color: rgba(255, 255, 255, 0.7);
        }

        .main-panel-safco {
            flex: 1;
            padding: 2.5rem 3rem;
            display: flex;
            flex-direction: column;
            gap: 1.75rem;
        }

        .panel-header {
            background: rgba(255, 255, 255, 0.92);
            border-radius: 1.8rem;
            padding: 1.6rem 2rem;
            box-shadow: 0 18px 45px rgba(15, 23, 42, 0.08);
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
            gap: 1.5rem;
        }

        .panel-header .headline {
            max-width: 520px;
        }

        .panel-header .headline .kicker {
            text-transform: uppercase;
            font-size: 0.7rem;
            letter-spacing: 0.3em;
            font-weight: 600;
            color: #9aa5b1;
        }

        .panel-header .headline h1 {
            font-size: clamp(1.55rem, 1.1rem + 1.2vw, 2.2rem);
            margin: 0.4rem 0 0.2rem;
            font-weight: 700;
        }

        .panel-header .headline p {
            margin: 0;
            color: #64748b;
            font-weight: 500;
        }

        .panel-header .actions {
            display: flex;
            align-items: center;
            gap: 0.8rem;
            flex-wrap: wrap;
        }

        .panel-header .search-bar {
            display: flex;
            align-items: center;
            background: rgba(148, 163, 184, 0.16);
            padding: 0.35rem 0.9rem;
            border-radius: 999px;
            gap: 0.6rem;
        }

        .panel-header .search-bar input {
            border: none;
            background: transparent;
            outline: none;
            font-size: 0.95rem;
            min-width: 180px;
            color: #475569;
        }

        .panel-header .search-bar i {
            color: var(--safco-red);
        }

        .panel-header .btn-rounded {
            border-radius: 999px;
            padding: 0.65rem 1.35rem;
            font-weight: 600;
            border: 1px solid transparent;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .panel-header .btn-rounded.btn-outline-light {
            color: var(--safco-red);
            background: rgba(229, 57, 53, 0.12);
            border-color: rgba(229, 57, 53, 0.24);
        }

        .panel-header .btn-rounded.btn-outline-light:hover {
            background: rgba(229, 57, 53, 0.18);
            transform: translateY(-1px);
        }

        .panel-header .user-pill {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.5rem 1rem;
            border-radius: 999px;
            background: rgba(15, 23, 42, 0.08);
            color: #1f2937;
        }

        .panel-header .user-pill span.avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--safco-red), #ff8a65);
            display: grid;
            place-items: center;
            color: #fff;
            font-size: 1.05rem;
            font-weight: 700;
        }

        .panel-header .user-pill .user-meta {
            display: flex;
            flex-direction: column;
            line-height: 1.2;
        }

        .panel-header .user-pill .user-meta .name {
            font-weight: 700;
            font-size: 0.95rem;
        }

        .panel-header .user-pill .user-meta .email {
            font-size: 0.75rem;
            color: #6b7280;
            font-weight: 500;
        }

        .panel-inner {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        .card {
            border-radius: 1.4rem !important;
            border: none;
            box-shadow: 0 18px 35px rgba(148, 163, 184, 0.22) !important;
        }

        @media (max-width: 1100px) {
            :root { --sidebar-width: 210px; }
            .sidebar-safco { padding-inline: 1.1rem; }
            .main-panel-safco { padding: 2rem; }
        }

        @media (max-width: 900px) {
            .app-shell {
                flex-direction: column;
            }

            .sidebar-safco {
                flex-direction: row;
                align-items: center;
                justify-content: space-between;
                gap: 1rem;
                padding: 1.5rem;
                border-radius: 0 0 2rem 2rem;
            }

            .sidebar-safco nav {
                flex-direction: row;
                flex-wrap: wrap;
                gap: 0.5rem;
            }

            .sidebar-safco .nav-link {
                padding: 0.55rem 0.85rem;
                border-radius: 0.9rem;
            }

            .sidebar-safco .nav-link span.label {
                display: none;
            }

            .sidebar-footer {
                display: none;
            }

            .main-panel-safco {
                padding: 1.5rem;
            }
        }

        @media (max-width: 600px) {
            .panel-header {
                padding: 1.2rem 1.4rem;
            }

            .panel-header .search-bar input {
                min-width: 140px;
            }
        }
    </style>
    @stack('styles')
</head>
<body>
<div class="app-shell">
    <aside class="sidebar-safco">
        <div class="logo-area">
            <img src="https://scontent.fpio4-1.fna.fbcdn.net/v/t1.6435-9/160039911_208055031117744_1899946897685409851_n.jpg?_nc_cat=100&ccb=1-7&_nc_sid=6ee11a&_nc_ohc=-cEtrkNdZ-QQ7kNvwFNraUs&_nc_oc=Adk13R3Wqd_edKOOfDEjRTPWW6tsF9MQGTA7hzqRmkO6Sj-fizMc_JSUYDpOBfPWwyBcuNLWj2FtSJFPtNE-6VrL&_nc_zt=23&_nc_ht=scontent.fpio4-1.fna&_nc_gid=ZesaRUlTG_99ZhQyQDhF1g&oh=00_AfSRDHRKzVIzUh8ssNg6mL3UNTz57x7WEb5Qr_-CeTSc8w&oe=68ACBB1B" alt="Logo SAFCO">
        </div>
        <div class="brand-text">SAFCO Gestión</div>
        <div class="modules-label">Módulos</div>
        <nav class="nav flex-column">
            <a href="{{ url('/') }}" class="nav-link {{ request()->is('/') ? 'active' : '' }}">
                <span class="icon-box"><i class="bi bi-grid-fill"></i></span>
                <span class="label">Dashboard</span>
            </a>
            <a href="{{ url('empleados') }}" class="nav-link {{ request()->is('empleados*') ? 'active' : '' }}">
                <span class="icon-box"><i class="bi bi-person-badge"></i></span>
                <span class="label">Empleados</span>
            </a>
            <a href="{{ url('cargos') }}" class="nav-link {{ request()->is('cargos*') ? 'active' : '' }}">
                <span class="icon-box"><i class="bi bi-briefcase"></i></span>
                <span class="label">Cargos</span>
            </a>
            <a href="{{ url('areas') }}" class="nav-link {{ request()->is('areas*') ? 'active' : '' }}">
                <span class="icon-box"><i class="bi bi-buildings"></i></span>
                <span class="label">Áreas</span>
            </a>
            <a href="{{ url('documentos') }}" class="nav-link {{ request()->is('documentos*') ? 'active' : '' }}">
                <span class="icon-box"><i class="bi bi-file-earmark"></i></span>
                <span class="label">Documentos</span>
            </a>
            <a href="{{ url('contratos') }}" class="nav-link {{ request()->is('contratos*') ? 'active' : '' }}">
                <span class="icon-box"><i class="bi bi-journal-text"></i></span>
                <span class="label">Contratos</span>
            </a>
            <a href="{{ url('asistencias') }}" class="nav-link {{ request()->is('asistencias*') ? 'active' : '' }}">
                <span class="icon-box"><i class="bi bi-calendar-check"></i></span>
                <span class="label">Asistencias</span>
            </a>
            <a href="{{ url('pagos') }}" class="nav-link {{ request()->is('pagos*') ? 'active' : '' }}">
                <span class="icon-box"><i class="bi bi-cash-stack"></i></span>
                <span class="label">Pagos</span>
            </a>
            <a href="{{ url('usuarios') }}" class="nav-link {{ request()->is('usuarios*') ? 'active' : '' }}">
                <span class="icon-box"><i class="bi bi-people"></i></span>
                <span class="label">Usuarios</span>
            </a>
        </nav>
        <div class="sidebar-footer">
            <div>© {{ date('Y') }} SAFCO.</div>
            <div>Control inteligente del talento agroindustrial.</div>
        </div>
    </aside>
    <main class="main-panel-safco">
        @php(
            $today = \Carbon\Carbon::now()->locale('es')
        )
        @php(
            $authUser = session('auth_user')
        )
        @php(
            $initial = $authUser && !empty($authUser['name'])
                ? mb_strtoupper(mb_substr($authUser['name'], 0, 1))
                : null
        )
        <header class="panel-header">
            <div class="headline">
                <div class="kicker">Panel general</div>
                <h1>
                    @if(!empty($authUser['name']))
                        Hola {{ $authUser['name'] }}, este es tu centro de control SAFCO
                    @else
                        Hola, bienvenido(a) a tu centro de control SAFCO
                    @endif
                </h1>
                <p>{{ $today->isoFormat('dddd D [de] MMMM [de] YYYY') }}</p>
            </div>
            <div class="actions">
                <div class="search-bar">
                    <i class="bi bi-search"></i>
                    <input type="text" placeholder="Buscar módulo o empleado">
                </div>
                <a href="{{ url('pagos/export/pdf') }}" class="btn btn-rounded btn-outline-light">
                    <i class="bi bi-graph-up"></i> Reportes
                </a>
                <a href="{{ route('logout') }}" class="btn btn-rounded btn-danger">
                    <i class="bi bi-box-arrow-right"></i> Salir
                </a>
                <div class="user-pill">
                    <span class="avatar">
                        @if($initial)
                            {{ $initial }}
                        @else
                            <i class="bi bi-person-fill"></i>
                        @endif
                    </span>
                    <div class="user-meta">
                        <span class="name">{{ $authUser['name'] ?? 'Usuario SAFCO' }}</span>
                        @if(!empty($authUser['email']))
                            <span class="email">{{ $authUser['email'] }}</span>
                        @endif
                    </div>
                </div>
            </div>
        </header>
        <section class="panel-inner">
            @yield('panel')
        </section>
    </main>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')
</body>
</html>
