<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse - El Rincón de Michoacán</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #faf7f2;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 1rem;
        }
        
        .contenedor {
            max-width: 500px;
            width: 100%;
        }
        
        .logo-area {
            text-align: center;
            margin-bottom: 2rem;
        }
        
        .logo-img {
            width: 120px;
            height: auto;
            margin-bottom: 0px;
            mix-blend-mode: multiply;
        }
        
        .subtitulo {
            font-size: 0.7rem;
            letter-spacing: 4px;
            color: #b8860b;
            text-transform: uppercase;
            margin-top: 5px;
        }
        
        .tarjeta {
            background: white;
            border-radius: 20px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
            overflow: hidden;
        }
        
        .tarjeta-header {
            padding: 1.5rem 1.5rem 0 1.5rem;
            text-align: center;
        }
        
        .tarjeta-header h2 {
            font-size: 1.5rem;
            font-weight: 600;
            color: #5c3a21;
            margin-bottom: 0.5rem;
        }
        
        .eslogan {
            font-size: 0.85rem;
            color: #b8860b;
            font-style: italic;
        }
        
        .tarjeta-body {
            padding: 1.3rem 1.8rem 1.8rem 1.8rem;
        }
        
        .campo {
            margin-bottom: 1rem;
        }
        
        .campo label {
            display: block;
            font-size: 0.75rem;
            font-weight: 500;
            color: #5c3a21;
            margin-bottom: 0.3rem;
        }
        
        .campo input {
            width: 100%;
            padding: 10px 14px;
            border: 1px solid #e0d6cc;
            border-radius: 12px;
            font-size: 0.85rem;
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
            padding: 12px;
            font-weight: 600;
            font-size: 0.9rem;
            border-radius: 40px;
            cursor: pointer;
            margin-top: 0.5rem;
        }
        
        .btn-primary:hover {
            background: #b8860b;
        }
        
        .alerta {
            background: #fef2e8;
            color: #c95a3a;
            padding: 10px;
            border-radius: 12px;
            font-size: 0.8rem;
            margin-bottom: 1rem;
            border-left: 3px solid #c95a3a;
        }
        
        .enlace {
            text-align: center;
            margin-top: 1.2rem;
            font-size: 0.85rem;
            color: #8b7355;
        }
        
        .enlace a {
            color: #b8860b;
            text-decoration: none;
            font-weight: 600;
        }
        
        .enlace a:hover {
            text-decoration: underline;
        }
        
        .productos-link {
            text-align: center;
            margin-top: 1.5rem;
        }
        
        .productos-link a {
            color: #8b7355;
            font-size: 0.85rem;
            text-decoration: none;
        }
        
        .productos-link a:hover {
            color: #b8860b;
        }
        
        .fila-doble {
            display: flex;
            gap: 15px;
        }
        
        .fila-doble .campo {
            flex: 1;
        }
    </style>
</head>
<body>

<div class="contenedor">
    
    <div class="logo-area">
        <img src="{{ asset('images/logo.png') }}" alt="El Rincón de Michoacán" class="logo-img">
        <div class="subtitulo">PALETERÍA ARTESANAL</div>
    </div>

    <div class="tarjeta">
        <div class="tarjeta-header">
            <h2>Crear Cuenta</h2>
            <div class="eslogan">"Creados para refrescarte el alma"</div>
        </div>
        <div class="tarjeta-body">
            
            @if($errors->any())
                <div class="alerta">
                    @foreach($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <form action="{{ route('register') }}" method="POST">
                @csrf
                
                <div class="fila-doble">
                    <div class="campo">
                        <label>Nombre(s)</label>
                        <input type="text" name="name" value="{{ old('name') }}" placeholder="Juan" required>
                    </div>
                    <div class="campo">
                        <label>Apellidos</label>
                        <input type="text" name="apellidos" value="{{ old('apellidos') }}" placeholder="Pérez" required>
                    </div>
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
                
                <div class="fila-doble">
                    <div class="campo">
                        <label>Contraseña</label>
                        <input type="password" name="password" placeholder="Mínimo 6 caracteres" required>
                    </div>
                    <div class="campo">
                        <label>Confirmar</label>
                        <input type="password" name="password_confirmation" placeholder="Repite contraseña" required>
                    </div>
                </div>
                
                <button type="submit" class="btn-primary">REGISTRARSE</button>
            </form>

            <div class="enlace">
                ¿Ya tienes cuenta? <a href="{{ route('login') }}">Inicia sesión aquí</a>
            </div>
        </div>
    </div>

    <div class="productos-link">
        <a href="{{ route('productos.index') }}">🍦 Ver catálogo de productos sin iniciar sesión →</a>
    </div>
</div>

</body>
</html>