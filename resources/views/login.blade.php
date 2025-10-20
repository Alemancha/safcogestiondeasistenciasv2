<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Login | SAFCO</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@400;600;700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
  <style>
    :root {
      --safco-red: #e53935;
      --safco-red-dark: #c62828;
      --safco-gradient: linear-gradient(135deg, rgba(229, 57, 53, 0.95), rgba(255, 138, 101, 0.9));
      --surface: #ffffff;
      --text-main: #1f2a37;
      --text-muted: #6b7280;
      --card-shadow: 0 22px 48px rgba(15, 23, 42, 0.18);
    }

    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body, html {
      width: 100%;
      height: 100%;
      font-family: 'Public Sans', Arial, sans-serif;
      background: radial-gradient(circle at top, rgba(229, 57, 53, 0.18), rgba(255,255,255,0.8) 45%, rgba(255,255,255,1) 90%);
      color: var(--text-main);
      overflow: hidden;
    }

    .main-login-container {
      display: grid;
      grid-template-columns: 1.2fr 1fr;
      height: 100vh;
      width: 100vw;
    }

    .login-hero {
      position: relative;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 3.5rem;
      background: #0f172a;
      overflow: hidden;
    }

    .login-hero::before {
      content: "";
      position: absolute;
      inset: 0;
      background: var(--safco-gradient);
      opacity: 0.88;
      z-index: 1;
    }

    .login-hero::after {
      content: "";
      position: absolute;
      width: 70%;
      height: 70%;
      border-radius: 50%;
      background: radial-gradient(circle, rgba(255, 255, 255, 0.22), transparent 65%);
      z-index: 2;
    }

    .login-hero img {
      position: absolute;
      inset: 0;
      width: 100%;
      height: 100%;
      object-fit: cover;
      filter: grayscale(0.2) brightness(0.9);
      opacity: 0.45;
    }

    .hero-content {
      position: relative;
      z-index: 3;
      color: #fff;
      max-width: 420px;
      display: flex;
      flex-direction: column;
      gap: 1.4rem;
      text-align: left;
    }

    .hero-content .badge {
      display: inline-flex;
      align-items: center;
      gap: 0.5rem;
      padding: 0.45rem 1.1rem;
      border-radius: 999px;
      background: rgba(15, 23, 42, 0.35);
      font-weight: 600;
      letter-spacing: 0.05em;
      text-transform: uppercase;
      font-size: 0.75rem;
    }

    .hero-content h1 {
      font-size: clamp(2rem, 1.6rem + 1.5vw, 2.6rem);
      font-weight: 700;
      line-height: 1.15;
    }

    .hero-content p {
      font-size: 1rem;
      color: rgba(255, 255, 255, 0.88);
    }

    .hero-highlights {
      display: grid;
      gap: 0.9rem;
    }

    .hero-highlights li {
      list-style: none;
      display: flex;
      align-items: center;
      gap: 0.7rem;
      font-weight: 600;
    }

    .hero-highlights li i {
      font-size: 1.3rem;
      color: #fbbf24;
    }

    .login-panel {
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 2.5rem;
      background: transparent;
    }

    .login-card {
      background: var(--surface);
      border-radius: 1.8rem;
      box-shadow: var(--card-shadow);
      max-width: 420px;
      width: 100%;
      padding: 2.8rem 2.6rem;
      position: relative;
      overflow: hidden;
    }

    .login-card::before {
      content: "";
      position: absolute;
      inset: 0;
      border-radius: inherit;
      background: linear-gradient(135deg, rgba(229, 57, 53, 0.08), transparent 60%);
      pointer-events: none;
    }

    .logo {
      width: 58px;
      height: 58px;
      border-radius: 16px;
      background: var(--safco-gradient);
      color: #fff;
      display: grid;
      place-items: center;
      font-size: 1.9rem;
      margin-bottom: 1.2rem;
      box-shadow: 0 12px 32px rgba(229, 57, 53, 0.35);
    }

    .login-title {
      font-size: 2.05rem;
      font-weight: 700;
      color: var(--text-main);
      margin-bottom: 0.7rem;
      letter-spacing: -0.5px;
    }

    .login-desc {
      color: var(--text-muted);
      font-size: 1.02rem;
      margin-bottom: 1.8rem;
    }

    .alert-error {
      background: rgba(229, 57, 53, 0.1);
      border-left: 4px solid var(--safco-red);
      color: var(--safco-red-dark);
      padding: 0.75rem 1rem;
      border-radius: 0.9rem;
      margin-bottom: 1.2rem;
      font-weight: 600;
    }

    .login-label {
      color: var(--text-main);
      font-weight: 600;
      font-size: 0.98rem;
      margin-bottom: 0.35rem;
      display: block;
    }

    .input-icon-box {
      position: relative;
      width: 100%;
      margin-bottom: 1.2rem;
    }

    .login-input {
      width: 100%;
      padding: 0.9rem 3rem 0.9rem 1.05rem;
      border-radius: 1rem;
      border: 1.5px solid rgba(15, 23, 42, 0.08);
      background: rgba(248, 250, 252, 0.7);
      font-size: 1rem;
      color: var(--text-main);
      outline: none;
      transition: border-color 0.2s ease, box-shadow 0.2s ease;
    }

    .login-input:focus {
      border-color: rgba(229, 57, 53, 0.35);
      box-shadow: 0 0 0 4px rgba(229, 57, 53, 0.08);
      background: #fff;
    }

    .input-icon-box .bx {
      position: absolute;
      right: 1.1rem;
      top: 50%;
      transform: translateY(-50%);
      color: rgba(100, 116, 139, 0.8);
      font-size: 1.25rem;
      cursor: pointer;
    }

    .login-row {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 1.6rem;
      gap: 1rem;
    }

    .login-checkbox {
      accent-color: var(--safco-red);
      margin-right: 0.45rem;
    }

    .forgot-link {
      color: var(--safco-red);
      font-size: 0.96rem;
      text-decoration: none;
      font-weight: 600;
    }

    .forgot-link:hover {
      text-decoration: underline;
    }

    .login-btn {
      width: 100%;
      padding: 1rem 0;
      border: none;
      border-radius: 1rem;
      font-size: 1.15rem;
      font-weight: 700;
      background: var(--safco-gradient);
      color: #fff;
      cursor: pointer;
      box-shadow: 0 20px 40px rgba(229, 57, 53, 0.32);
      transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .login-btn:hover {
      transform: translateY(-1px);
      box-shadow: 0 24px 50px rgba(229, 57, 53, 0.4);
    }

    .login-bottom {
      margin-top: 2.4rem;
      display: flex;
      justify-content: center;
      gap: 1.2rem;
      font-size: 0.9rem;
      color: var(--text-muted);
    }

    .login-bottom span {
      display: inline-flex;
      align-items: center;
      gap: 0.4rem;
    }

    @media (max-width: 1100px) {
      .main-login-container {
        grid-template-columns: 1fr;
      }
      .login-hero {
        display: none;
      }
      body, html {
        overflow: auto;
        background: radial-gradient(circle at top, rgba(229, 57, 53, 0.16), rgba(255,255,255,0.92) 65%);
      }
      .login-panel {
        padding: 3rem 1.2rem;
      }
    }

    @media (max-width: 500px) {
      .login-card {
        padding: 2.1rem 1.7rem;
      }
      .login-title {
        font-size: 1.6rem;
      }
      .login-row {
        flex-direction: column;
        align-items: flex-start;
      }
      .login-bottom {
        flex-direction: column;
      }
    }
  </style>
</head>
<body>
  <div class="main-login-container">
    <div class="login-hero">
      <img src="{{ asset('assets/9866-AGRO-EUROPA-1.jpg') }}" alt="Operaciones SAFCO">
      <div class="hero-content">
        <span class="badge"><i class='bx bx-leaf'></i> Gestión agrícola</span>
        <h1>Control inteligente de asistencias y talento en campo</h1>
        <p>Administra turnos, pagos y contratos en cuestión de minutos. Un acceso único para mantener tus equipos organizados y con datos confiables.</p>
        <ul class="hero-highlights">
          <li><i class='bx bx-check-shield'></i> Seguridad en cada sesión</li>
          <li><i class='bx bx-time-five'></i> Registro rápido de asistencias</li>
          <li><i class='bx bx-line-chart'></i> Indicadores con impacto real</li>
        </ul>
      </div>
    </div>
    <div class="login-panel">
      <form class="login-card" autocomplete="off" method="POST" action="{{ route('login.custom') }}">
        @csrf
        <div class="logo">
          <i class='bx bx-package'></i>
        </div>
        <div class="login-title">Bienvenido a SAFCO <span class="emoji">👋</span></div>
        <div class="login-desc">Ingrese sus credenciales corporativas para acceder al panel de control.</div>
        @if(session('error'))
          <div class="alert-error"><i class='bx bxs-error-circle'></i>{{ session('error') }}</div>
        @endif
        @if ($errors->any())
          <div class="alert-error"><i class='bx bxs-error-circle'></i>{{ $errors->first() }}</div>
        @endif
        <label class="login-label" for="login-email">Email o Usuario</label>
        <div class="input-icon-box">
          <input type="text" name="email" id="login-email" class="login-input" placeholder="Ingresa tu correo corporativo" autocomplete="username" required value="{{ old('email') }}">
          <i class='bx bxs-user'></i>
        </div>
        <label class="login-label" for="login-password">Contraseña</label>
        <div class="input-icon-box">
          <input type="password" name="password" id="login-password" class="login-input" placeholder="********" autocomplete="current-password" required>
          <i class='bx bx-hide' id="togglePassword" onclick="togglePassword()"></i>
        </div>
        <div class="login-row">
          <label for="remember" style="display:flex; align-items:center; color: var(--text-muted); font-weight:500;">
            <input type="checkbox" id="remember" name="remember" class="login-checkbox" value="1">
            Recordar sesión
          </label>
          <a href="#" class="forgot-link">¿Olvidaste tu contraseña?</a>
        </div>
        <button class="login-btn" type="submit">Iniciar sesión</button>
        <div class="login-bottom">
          <span><i class='bx bx-support'></i> Mesa de ayuda: soporte@safco.com</span>
          <span><i class='bx bx-shield-quarter'></i> Acceso privado para personal autorizado</span>
        </div>
      </form>
    </div>
  </div>
  <script>
    function togglePassword() {
      const input = document.getElementById('login-password');
      const icon = document.getElementById('togglePassword');
      if (input.type === 'password') {
        input.type = 'text';
        icon.classList.remove('bx-hide');
        icon.classList.add('bx-show');
      } else {
        input.type = 'password';
        icon.classList.remove('bx-show');
        icon.classList.add('bx-hide');
      }
    }
  </script>
</body>
</html>
