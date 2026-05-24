<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>El Rincón de Michoacán - Paletería</title>
    
    
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700&display=swap" rel="stylesheet">
    
   <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    
    body {
        font-family: 'Montserrat', sans-serif;
        background: #faf7f2;
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 1rem;
    }
    
    .contenedor {
        max-width: 480px; 
        width: 100%;
    }
    
    
    .logo-area {
        text-align: center;
        margin-bottom: 2.5rem;
    }
    
    /* Para imagen PNG con fondo blanco - HACER TRANSPARENTE */
    .logo-img {
        width: 250px;      /* Aumentado de 100 a 180px */
        height: auto;
        margin-bottom: 0px;
        /* Mezcla la imagen con el fondo */
        mix-blend-mode: multiply;
    }
    
    /* También funciona con estas opciones:
       mix-blend-mode: darken;
       mix-blend-mode: color-burn;
    */
    
    
    .titulo-logo {
        font-size: 2.2rem;   /* Aumentado */
        font-weight: 700;
        color: #5c3a21;
        letter-spacing: 2px;
    }
    
    .subtitulo {
        font-size: 1.8rem;
        letter-spacing: 4px;
        color: #b8860b;
        text-transform: uppercase;
        margin-top: 0px;
    }
    
    /
    .tarjeta {
        background: white;
        border-radius: 20px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.08);
        overflow: hidden;
    }
    
    .tarjeta-header {
        padding: 1.8rem 1.8rem 0 1.8rem;
        text-align: center;
    }
    
    .tarjeta-header h2 {
        font-size: 2.2rem;
        font-weight: 600;
        color: #5c3a21;
        margin-bottom: 0.5rem;
    }
    
    .eslogan {
        font-size: 0.95rem;
        color: #b8860b;
        font-style: italic;
    }
    
    .tarjeta-body {
        padding: 1.5rem 1.8rem 1.8rem 1.8rem;
    }
    
    .grupo-tabs {
        display: flex;
        gap: 10px;
        background: #f0ebe3;
        padding: 5px;
        border-radius: 50px;
        margin-bottom: 1.5rem;
    }
    
    .tab {
        flex: 1;
        padding: 10px;
        background: transparent;
        border: none;
        font-weight: 600;
        font-size: 0.85rem;
        border-radius: 50px;
        cursor: pointer;
        color: #8b7355;
    }
    
    .tab.activo {
        background: white;
        color: #5c3a21;
        box-shadow: 0 2px 6px rgba(0,0,0,0.05);
    }
    
    .campo {
        margin-bottom: 1.2rem;
    }
    
    .campo label {
        display: block;
        font-size: 0.8rem;
        font-weight: 500;
        color: #5c3a21;
        margin-bottom: 0.4rem;
    }
    
    .campo input {
        width: 100%;
        padding: 12px 14px;
        border: 1px solid #e0d6cc;
        border-radius: 12px;
        font-size: 0.9rem;
        transition: 0.2s;
    }
    
    .campo input:focus {
        outline: none;
        border-color: #b8860b;
    }
    
    .btn-primary {
        width: 100%;
        background: #5c3a21;
        color: white;
        border: none;
        padding: 14px;
        font-weight: 600;
        font-size: 0.9rem;
        border-radius: 40px;
        cursor: pointer;
        margin-top: 0.5rem;
        transition: 0.2s;
    }
    
    .btn-primary:hover {
        background: #b8860b;
    }
    
    .alerta {
        background: #fef2e8;
        color: #c95a3a;
        padding: 12px;
        border-radius: 12px;
        font-size: 0.85rem;
        margin-bottom: 1.2rem;
        border-left: 3px solid #c95a3a;
    }
    
    .panel {
        display: none;
    }
    
    .panel.activo {
        display: block;
        animation: fade 0.3s ease;
    }
    
    @keyframes fade {
        from { opacity: 0; transform: translateY(5px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    .enlace-productos {
        text-align: center;
        margin-top: 1.5rem;
    }
    
    .enlace-productos a {
        color: #8b7355;
        font-size: 0.8rem;
        text-decoration: none;
    }
    
    .enlace-productos a:hover {
        color: #b8860b;
    }
    
    @media (max-width: 480px) {
        .tarjeta-header {
            padding: 1.3rem 1.3rem 0 1.3rem;
        }
        .tarjeta-body {
            padding: 1.2rem 1.3rem 1.3rem 1.3rem;
        }
        .logo-img {
            width: 140px;
        }
        .titulo-logo {
            font-size: 1.8rem;
        }
    }
</style>
    </style>
</head>
<body>

<div class="contenedor">
    
    <!-- Logo centrado -->
    
        <div class="logo-area">
    <img src="{{ asset('images/logo.png') }}" alt="El Rincón de Michoacán" class="logo-img">
    <div class="subtitulo">PALETERÍA ARTESANAL</div>
</div>

    <!-- Tarjeta de login/registro -->
    <div class="tarjeta">
        <div class="tarjeta-header">
            <h2>Bienvenido</h2>
            <div class="eslogan">"Creados para refrescarte el alma"</div>
        </div>
        <div class="tarjeta-body">
            
            <!-- Mensajes de error -->
            @if(session('error'))
                <div class="alerta">
                    {{ session('error') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alerta">
                    @foreach($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <!-- Pestañas -->
            <div class="grupo-tabs">
                <button class="tab activo" onclick="mostrarPanel('login')">Iniciar Sesión</button>
                <button class="tab" onclick="mostrarPanel('registro')">Registrarse</button>
            </div>

            <!-- Panel de Login -->
            <div id="panel-login" class="panel activo">
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="campo">
                        <label>Correo electrónico</label>
                        <input type="email" name="email" value="{{ old('email') }}" placeholder="ejemplo@correo.com" required>
                    </div>
                    <div class="campo">
                        <label>Contraseña</label>
                        <input type="password" name="password" placeholder="••••••••" required>
                    </div>
                    <button type="submit" class="btn-primary">INGRESAR</button>
                </form>
            </div>

            <!-- Panel de Registro -->
            <div id="panel-registro" class="panel">
                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="campo">
                        <label>Nombre(s)</label>
                        <input type="text" name="name" value="{{ old('name') }}" placeholder="Ej: Juan" required>
                    </div>
                    <div class="campo">
                        <label>Apellidos</label>
                        <input type="text" name="apellidos" value="{{ old('apellidos') }}" placeholder="Ej: Pérez López" required>
                    </div>
                    <div class="campo">
                        <label>Correo electrónico</label>
                        <input type="email" name="email" value="{{ old('email') }}" placeholder="ejemplo@correo.com" required>
                    </div>
                    <div class="campo">
                        <label>Teléfono</label>
                        <input type="tel" name="telefono" value="{{ old('telefono') }}" placeholder="555 123 4567" required>
                    </div>
                    <div class="campo">
                        <label>Dirección</label>
                        <input type="text" name="direccion" value="{{ old('direccion') }}" placeholder="Calle, número, colonia" required>
                    </div>
                    <div class="campo">
                        <label>Contraseña</label>
                        <input type="password" name="password" placeholder="Mínimo 6 caracteres" required>
                    </div>
                    <div class="campo">
                        <label>Confirmar contraseña</label>
                        <input type="password" name="password_confirmation" placeholder="Repite tu contraseña" required>
                    </div>
                    <button type="submit" class="btn-primary">CREAR CUENTA</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Enlace a productos -->
    <div class="enlace-productos">
        <a href="{{ route('productos.index') }}">🍦 Ver catálogo de productos →</a>
    </div>
</div>


<script>
    function mostrarPanel(panel) {
        const loginPanel = document.getElementById('panel-login');
        const registroPanel = document.getElementById('panel-registro');
        const tabs = document.querySelectorAll('.tab');
        
        if (panel === 'login') {
            loginPanel.classList.add('activo');
            registroPanel.classList.remove('activo');
            tabs[0].classList.add('activo');
            tabs[1].classList.remove('activo');
        } else {
            loginPanel.classList.remove('activo');
            registroPanel.classList.add('activo');
            tabs[0].classList.remove('activo');
            tabs[1].classList.add('activo');
        }
    }
</script>

</body>
</html>