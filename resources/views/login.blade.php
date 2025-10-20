<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Login | SAFCO</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@400;600;700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
  <style>
    * { box-sizing: border-box; margin: 0; padding: 0; }
    body, html {
      width: 100vw;
      height: 100vh;
      font-family: 'Public Sans', Arial, sans-serif;
      background: #f7f7fa;
      overflow: hidden;
    }
    .main-login-container {
      display: flex;
      height: 100vh;
      width: 100vw;
      background: #f7f7fa;
    }
    /* Izquierda: Imagen de fondo */
    .login-image-bg {
      flex: 1.2;
      display: flex;
      align-items: center;
      justify-content: center;
      background: #edeffd;
      overflow: hidden;
      min-width: 0;
    }
    .login-image-bg img {
      width: 100%;
      height: 100vh;
      object-fit: cover;
      border: none;
    }
    /* Derecha: Login Card */
    .login-right-panel {
      flex: 1;
      display: flex;
      justify-content: center;
      align-items: center;
      background: #f7f7fa;
      min-width: 420px;
    }
    .login-card {
      background: #fff;
      border-radius: 20px;
      box-shadow: 0 10px 36px 0 rgba(80,70,180,0.11), 0 1.5px 4px 0 rgba(80,70,180,0.06);
      max-width: 390px;
      width: 100%;
      padding: 2.6rem 2.4rem 2.3rem 2.4rem;
      margin: 2rem;
      display: flex;
      flex-direction: column;
      align-items: center;
      position: relative;
    }
    .login-card .logo {
      background: #7367f0;
      color: #fff;
      font-size: 2rem;
      border-radius: 14px;
      width: 50px;
      height: 50px;
      display: flex;
      align-items: center;
      justify-content: center;
      margin-bottom: 16px;
    }
    .login-title {
      font-size: 2rem;
      font-weight: 700;
      color: #23243c;
      text-align: center;
      margin-bottom: .6rem;
      letter-spacing: -1px;
    }
    .emoji { font-size: 1.35rem; margin-left: .1rem; }
    .login-desc {
      color: #7c7b8d;
      font-size: 1.05rem;
      margin-bottom: 1.5rem;
      text-align: center;
    }
    .login-label {
      color: #22243d;
      font-weight: 600;
      font-size: 1.01rem;
      margin-bottom: 0.25rem;
      margin-top: 0.95rem;
      letter-spacing: -0.3px;
      display: block;
    }
    .input-icon-box {
      position: relative;
      width: 100%;
      margin-bottom: 10px;
    }
    .login-input {
      width: 100%;
      padding: 0.87rem 2.5rem 0.87rem 1rem;
      border-radius: 10px;
      border: 1.4px solid #c7c5ea;
      background: #fafaff;
      font-size: 1.07rem;
      color: #23233c;
      outline: none;
      margin-bottom: 0.5rem;
      transition: border .18s;
    }
    .login-input:focus {
      border: 1.7px solid #7b6bfa;
      background: #f6f3fd;
    }
    .input-icon-box .bx {
      position: absolute;
      right: 1rem;
      top: 50%;
      transform: translateY(-50%);
      color: #bcbcf1;
      font-size: 1.24rem;
      cursor: pointer;
    }
    /* Mostrar/Ocultar password */
    .input-icon-box .bx-show, .input-icon-box .bx-hide {
      right: 1rem;
      left: unset;
      z-index: 2;
    }
    /* Remember/Forgot */
    .login-row {
      display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.1rem; width: 100%;
    }
    .login-checkbox { accent-color: #7367f0; margin-right: 0.5em; }
    .forgot-link {
      color: #7367f0; font-size: 1.01rem; text-decoration: none; transition: color .16s;
      margin-left: 4px;
    }
    .forgot-link:hover { color: #4937e7;}
    /* Button */
    .login-btn {
      width: 100%; padding: 1.05rem 0; border: none; border-radius: 10px;
      font-size: 1.13rem; font-weight: 800; background: #7367f0;
      color: #fff;
      box-shadow: 0 5px 22px 0 rgba(130,110,240,0.09);
      cursor: pointer;
      margin-top: .5rem;
      transition: background .14s;
      letter-spacing: 0.02em;
    }
    .login-btn:hover {
      background: #574be4;
    }
    @media (max-width: 900px) {
      .main-login-container { flex-direction: column; }
      .login-image-bg { display: none; }
      .login-right-panel { min-width: 0; width: 100vw;}
    }
    @media (max-width: 500px) {
      .login-card { padding: 1rem 0.3rem; }
      .login-title { font-size: 1.25rem; }
    }
  </style>
</head>
<body>
  <div class="main-login-container">
    <!-- Fondo Izquierda -->
    <div class="login-image-bg">
      <img src="{{ asset('assets/9866-AGRO-EUROPA-1.jpg') }}" alt="Imagen Agro" />
    </div>
    <!-- Login Derecha -->
    <div class="login-right-panel">
      <form class="login-card" autocomplete="off" method="POST" action="{{ route('login.custom') }}">
        @csrf
        <div class="logo">
          <i class='bx bx-package'></i>
        </div>
        <div class="login-title">Bienvenido a <b>SAFCO!</b> <span class="emoji">👋</span></div>
        <div class="login-desc">Por favor ingrese sus credenciales para continuar</div>
        @if(session('error'))
          <div style="color:red; margin-bottom:12px;">{{ session('error') }}</div>
        @endif
        <label class="login-label" for="login-email">Email o Usuario</label>
        <div class="input-icon-box">
          <input type="text" name="email" id="login-email" class="login-input" placeholder="Enter your email or username" autocomplete="username" required>
          <i class='bx bxs-user'></i>
        </div>
        <label class="login-label" for="login-password">Contraseña</label>
        <div class="input-icon-box">
          <input type="password" name="password" id="login-password" class="login-input" placeholder="********" autocomplete="current-password" required>
          <i class='bx bx-hide' id="togglePassword" onclick="togglePassword()"></i>
        </div>
        <div class="login-row">
          <div>
            <input type="checkbox" id="remember" class="login-checkbox">
            <label for="remember" style="color:#6f6b7d; font-size:0.99rem; font-weight:400;">Recordar</label>
          </div>
          <a href="#" class="forgot-link">¿Olvidaste la contraseña?</a>
        </div>
        <button class="login-btn" type="submit">Inicio de Sesión</button>
        <div class="login-bottom"></div>
      </form>
    </div>
  </div>
  <script>
    function togglePassword() {
      const input = document.getElementById('login-password');
      const icon = document.getElementById('togglePassword');
      if (input.type === "password") {
        input.type = "text";
        icon.classList.remove("bx-hide");
        icon.classList.add("bx-show");
      } else {
        input.type = "password";
        icon.classList.remove("bx-show");
        icon.classList.add("bx-hide");
      }
    }
  </script>
</body>
</html>
