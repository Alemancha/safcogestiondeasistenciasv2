<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Login | SAFCO</title>
  <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@400;600;700&display=swap" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    html, body {
      height: 100%;
      margin: 0;
      padding: 0;
      font-family: 'Public Sans', Arial, sans-serif;
      overflow: hidden;
    }
    body {
      min-height: 100vh;
      min-width: 100vw;
      display: flex;
      justify-content: center;
      align-items: center;
      position: relative;
      background: rgba(255,255,255,0.5);
    }
    .video-bg {
      position: fixed;
      top: 0; left: 0; width: 100vw; height: 100vh;
      object-fit: cover;
      z-index: 0;
      pointer-events: none;
      filter: none; /* SOLO brightness, NO blur */
    }
    .login-glass {
      z-index: 2;
      background: rgba(255,255,255,0.37);
      box-shadow: 0 4px 48px 0 rgba(30,30,60,0.18);
      border-radius: 1.7rem;
      width: 100%;
      max-width: 410px;
      padding: 2.5rem 2.5rem 2.2rem 2.5rem;
      margin: 0;
      display: flex;
      flex-direction: column;
      align-items: center;
      position: relative;
      backdrop-filter: blur(8px) saturate(1.2);
      border: 1.5px solid rgba(180,180,255,0.20);
    }
    .login-title {
      font-size: 2.1rem;
      font-weight: 800;
      color: #23233b;
      margin-bottom: 0.55rem;
      text-align: center;
      letter-spacing: -1px;
    }
    .emoji { font-size: 2rem; margin-left: .2rem; vertical-align: middle;}
    .login-desc {
      color: #454558;
      font-size: 1.1rem;
      margin-bottom: 1.5rem;
      font-weight: 500;
      text-align: center;
    }
    .login-label {
      color: #363457;
      font-weight: 600;
      font-size: 1.01rem;
      margin-bottom: 0.25rem;
      margin-top: 0.75rem;
      letter-spacing: -0.3px;
      display: block;
    }
    .login-input {
      width: 100%;
      padding: 0.93rem 1.13rem;
      border-radius: 0.67rem;
      border: 1.4px solid #d3d7e6;
      background: rgba(255,255,255,0.76);
      font-size: 1.04rem;
      color: #26283f;
      margin-bottom: 0.15rem;
      margin-top: 0.08rem;
      outline: none;
      transition: border .22s;
      box-shadow: 0 0 0 0 rgba(0,0,0,0.01);
    }
    .login-input:focus {
      border: 1.7px solid #8472fd;
      background: #f6f3fd;
    }
    .password-group {
      position: relative;
      margin-bottom: 0.1rem;
      width: 100%;
    }
    .toggle-password {
      position: absolute; top: 52%; right: 1rem; transform: translateY(-50%);
      cursor: pointer; color: #b7b6cb; font-size: 1.18rem; border: none; background: none; outline: none;
    }
    .login-row {
      display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.3rem; margin-top: 0.8rem;
      width: 100%;
    }
    .login-checkbox { accent-color: #7367f0; margin-right: 0.4em; }
    .forgot-link {
      color: #7367f0; font-size: 1.01rem; text-decoration: none; transition: color .16s;
      margin-left: 4px;
    }
    .forgot-link:hover { color: #4937e7;}
    .login-btn {
      width: 100%; padding: 1.07rem 0; border: none; border-radius: 0.7rem;
      font-size: 1.17rem; font-weight: 800; background: #7b6bfa;
      color: #fff;
      box-shadow: 0 5px 22px 0 rgba(130,110,240,0.09);
      cursor: pointer;
      margin-bottom: 0.8rem;
      margin-top: 1.2rem;
      transition: background .16s, transform .16s;
      letter-spacing: 0.02em;
    }
    .login-btn:hover {
      background: #5c4ed7;
      transform: scale(1.025);
    }
    .login-bottom { text-align: center; font-size: 1rem; color: #84839b;}
    .login-bottom a { color: #7367f0; text-decoration: none; font-weight: 500; transition: color .18s;}
    .login-bottom a:hover { color: #4937e7; text-decoration: underline;}
    @media (max-width: 500px) {
      .login-glass { padding: 1.1rem 0.7rem; }
      .login-title { font-size: 1.3rem; }
    }
  </style>
</head>
<body>
  <!-- VIDEO LOCAL COMO FONDO -->
  <video class="video-bg" autoplay loop muted playsinline>
    <source src="{{ asset('assets/Home - Safco.mp4') }}" type="video/mp4">
    Tu navegador no soporta el video de fondo.
  </video>

  <!-- Login box centrado -->
  <form class="login-glass" autocomplete="off" method="POST" action="{{ route('login.custom') }}">
    @csrf
    <div class="login-title">Bienvenido a SAFCO! <span class="emoji">👋</span></div>
    <div class="login-desc">Por favor ingrese sus credenciales</div>
    @if(session('error'))
      <div style="color:red; margin-bottom:12px;">{{ session('error') }}</div>
    @endif
    <label class="login-label" for="login-email">Email o Usuario</label>
    <input type="text" name="email" id="login-email" class="login-input" placeholder="Ingresa tu email o usuario" autocomplete="username" required>
    <label class="login-label" for="login-password">Contraseña</label>
    <div class="password-group">
      <input type="password" name="password" id="login-password" class="login-input" placeholder="********" autocomplete="current-password" required>
      <button type="button" class="toggle-password" tabindex="-1" onclick="togglePassword()">
        <svg height="20" width="20" viewBox="0 0 20 20" fill="none">
          <path d="M1 10C2.8 5.8 6.7 3 11 3s8.2 2.8 10 7c-1.8 4.2-5.7 7-10 7s-8.2-2.8-10-7z" stroke="#b6b6cb" stroke-width="1.5" fill="none"/>
          <circle cx="11" cy="10" r="3" stroke="#b6b6cb" stroke-width="1.5" fill="none"/>
