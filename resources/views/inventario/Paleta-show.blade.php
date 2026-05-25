<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle del Producto - El Rincón de Michoacán</title>
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
        }
        
        .header {
            background: white;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            padding: 1rem 2rem;
        }
        
        .header-contenido {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1rem;
        }
        
        .logo-area {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .logo-img {
            width: 50px;
            height: auto;
            mix-blend-mode: multiply;
        }
        
        .logo-texto {
            font-size: 1.2rem;
            font-weight: 700;
            color: #5c3a21;
        }
        
        .nav a {
            text-decoration: none;
            color: #5c3a21;
            margin-left: 1.5rem;
        }
        
        .container {
            max-width: 800px;
            margin: 2rem auto;
            padding: 0 2rem;
        }
        
        .tarjeta {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
        }
        
        .tarjeta-header {
            background: #5c3a21;
            color: white;
            padding: 1.5rem;
        }
        
        .tarjeta-header h1 {
            font-size: 1.5rem;
        }
        
        .tarjeta-body {
            padding: 2rem;
        }
        
        .detalle {
            display: flex;
            margin-bottom: 1rem;
            padding-bottom: 0.5rem;
            border-bottom: 1px solid #e0d6cc;
        }
        
        .detalle-label {
            width: 150px;
            font-weight: 600;
            color: #5c3a21;
        }
        
        .detalle-valor {
            color: #333;
        }
        
        .descripcion {
            background: #f0ebe3;
            padding: 1rem;
            border-radius: 12px;
            margin: 1rem 0;
            font-style: italic;
        }
        
        .acciones {
            display: flex;
            gap: 1rem;
            margin-top: 2rem;
        }
        
        .btn-editar {
            background: #b8860b;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 40px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
        }
        
        .btn-eliminar {
            background: #c95a3a;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 40px;
            cursor: pointer;
        }
        
        .btn-volver {
            background: #8b7355;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 40px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
        }
        
        .alerta {
            background: #fef2e8;
            color: #c95a3a;
            padding: 1rem;
            border-radius: 12px;
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>

<div class="header">
    <div class="header-contenido">
        <div class="logo-area">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="logo-img">
            <div class="logo-texto">EL RINCÓN DE MICHOACÁN</div>
        </div>
        <div class="nav">
            <a href="{{ route('home') }}">🍦 Productos</a>
            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" style="background: none; border: none; color: #c95a3a; cursor: pointer;">🚪 Salir</button>
            </form>
        </div>
    </div>
</div>

<div class="container">
    <div class="tarjeta">
        <div class="tarjeta-header">
            <h1>📋 Información del Producto</h1>
        </div>
        <div class="tarjeta-body">
            
            @if(session('success'))
                <div class="alerta" style="background:#e8f5e9; color:#2e7d32;">{{ session('success') }}</div>
            @endif
            
            <div class="detalle">
                <div class="detalle-label">ID:</div>
                <div class="detalle-valor">{{ $paleta->id }}</div>
            </div>
            
            <div class="detalle">
                <div class="detalle-label">Nombre:</div>
                <div class="detalle-valor">{{ $paleta->nombre }}</div>
            </div>
            
            <div class="detalle">
                <div class="detalle-label">Categoría:</div>
                <div class="detalle-valor">{{ $paleta->categoria->name ?? 'Sin categoría' }}</div>
            </div>
            
            <div class="descripcion">
                <strong>📝 Descripción:</strong><br>
                {{ $paleta->descripcion ?? 'No hay descripción disponible para este producto.' }}
            </div>
            
            <div class="detalle">
                <div class="detalle-label">Precio:</div>
                <div class="detalle-valor">${{ number_format($paleta->precio, 2) }}</div>
            </div>
            
            <div class="detalle">
                <div class="detalle-label">Stock disponible:</div>
                <div class="detalle-valor">{{ $paleta->stock }} unidades</div>
            </div>
            
            <div class="detalle">
                <div class="detalle-label">Fecha de creación:</div>
                <div class="detalle-valor">{{ $paleta->created_at->format('d/m/Y H:i:s') }}</div>
            </div>
            
            <div class="detalle">
                <div class="detalle-label">Última actualización:</div>
                <div class="detalle-valor">{{ $paleta->updated_at->format('d/m/Y H:i:s') }}</div>
            </div>
            
            <div class="acciones">
                <a href="{{ route('paletas.edit', $paleta) }}" class="btn-editar">✏️ Editar producto</a>
                
                <form action="{{ route('paletas.destroy', $paleta) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-eliminar" onclick="return confirm('¿Eliminar este producto?')">🗑️ Eliminar</button>
                </form>
                
                <a href="{{ route('paletas.index') }}" class="btn-volver">← Volver al listado</a>
            </div>
        </div>
    </div>
</div>

</body>
</html>