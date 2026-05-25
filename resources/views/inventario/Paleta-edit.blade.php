<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto - El Rincón de Michoacán</title>
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
        
        .logo-texto span {
            font-size: 0.7rem;
            color: #b8860b;
            letter-spacing: 2px;
        }
        
        .nav {
            display: flex;
            gap: 1.5rem;
            align-items: center;
        }
        
        .nav a {
            text-decoration: none;
            color: #5c3a21;
            font-weight: 500;
        }
        
        .nav a:hover {
            color: #b8860b;
        }
        
        .container {
            max-width: 600px;
            margin: 2rem auto;
            padding: 0 2rem;
        }
        
        .tarjeta {
            background: white;
            border-radius: 20px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
            overflow: hidden;
        }
        
        .tarjeta-header {
            background: #5c3a21;
            color: white;
            padding: 1.5rem;
        }
        
        .tarjeta-header h1 {
            font-size: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .tarjeta-body {
            padding: 2rem;
        }
        
        .campo {
            margin-bottom: 1.5rem;
        }
        
        .campo label {
            display: block;
            font-size: 0.85rem;
            font-weight: 600;
            color: #5c3a21;
            margin-bottom: 0.5rem;
        }
        
        .campo input, .campo select {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #e0d6cc;
            border-radius: 12px;
            font-size: 1rem;
            transition: all 0.2s;
        }
        
        .campo input:focus, .campo select:focus {
            outline: none;
            border-color: #b8860b;
            box-shadow: 0 0 0 3px rgba(184, 134, 11, 0.1);
        }
        
        .campo input[readonly] {
            background: #f5f0e8;
            cursor: not-allowed;
        }
        
        .btn-actualizar {
            width: 100%;
            background: #5c3a21;
            color: white;
            border: none;
            padding: 14px;
            font-weight: 600;
            font-size: 1rem;
            border-radius: 40px;
            cursor: pointer;
            transition: all 0.2s;
            margin-top: 0.5rem;
        }
        
        .btn-actualizar:hover {
            background: #b8860b;
        }
        
        .btn-volver {
            display: inline-block;
            background: #8b7355;
            color: white;
            text-decoration: none;
            padding: 12px 20px;
            border-radius: 40px;
            text-align: center;
            margin-top: 1rem;
        }
        
        .btn-volver:hover {
            background: #5c3a21;
        }
        
        .mensaje-exito {
            background: #e8f5e9;
            color: #2e7d32;
            padding: 12px;
            border-radius: 12px;
            margin-bottom: 1rem;
            border-left: 4px solid #2e7d32;
        }
        
        .mensaje-error {
            background: #fef2e8;
            color: #c95a3a;
            padding: 12px;
            border-radius: 12px;
            margin-bottom: 1rem;
            border-left: 4px solid #c95a3a;
        }
        
        .acciones {
            display: flex;
            gap: 1rem;
            margin-top: 1rem;
        }
        
        footer {
            text-align: center;
            padding: 2rem;
            color: #8b7355;
            font-size: 0.8rem;
            margin-top: 2rem;
        }
    </style>
</head>
<body>

<div class="header">
    <div class="header-contenido">
        <div class="logo-area">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="logo-img">
            <div class="logo-texto">
                EL RINCÓN<br>
                <span>DE MICHOACÁN</span>
            </div>
        </div>
        <div class="nav">
            <a href="{{ route('home') }}">🍦 Productos</a>
            <a href="{{ route('paletas.index') }}">📋 Gestionar</a>
            <span>👤 {{ Auth::user()->name }}</span>
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
            <h1>✏️ Editar Producto</h1>
        </div>
        <div class="tarjeta-body">
            
            @if(session('success'))
                <div class="mensaje-exito">{{ session('success') }}</div>
            @endif
            
            @if($errors->any())
                <div class="mensaje-error">
                    @foreach($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <form action="{{ route('paletas.update', $paleta) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="campo">
                    <label> Nombre del Producto</label>
                    <input type="text" name="nombre" value="{{ old('nombre', $paleta->nombre) }}" required>
                </div>

                <div class="campo">
                    <label> Categoría</label>
                    <select name="categoria_id" required>
                        <option value="">Selecciona una categoría</option>
                        @foreach($categorias as $categoria)
                            <option value="{{ $categoria->id }}" {{ $paleta->categoria_id == $categoria->id ? 'selected' : '' }}>
                                {{ $categoria->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="campo">
                    <label> Precio</label>
                    <input type="number" step="0.01" name="precio" value="{{ old('precio', $paleta->precio) }}" required>
                </div>

                <div class="campo">
                    <label>Stock (Cantidad)</label>
                    <input type="number" name="stock" value="{{ old('stock', $paleta->stock) }}" required>
                </div>

                <div class="campo">
                    <label> Imagen (nombre del archivo)</label>
                    <input type="text" name="imagen" value="{{ old('imagen', $paleta->imagen) }}" placeholder="ejemplo.jpg">
                    <small style="color: #8b7355;">Imagen debe estar en public/images/</small>
                </div>

                <div class="campo">
                    <label> Descripción</label>
                    <textarea name="descripcion" rows="3" style="width: 100%; padding: 12px; border: 1px solid #e0d6cc; border-radius: 12px; font-family: inherit;">{{ old('descripcion', $paleta->descripcion) }}</textarea>
                </div>

                <button type="submit" class="btn-actualizar">Actualizar Producto</button>
                
                <div class="acciones">
                    <a href="{{ route('paletas.show', $paleta) }}" class="btn-volver">Ver detalles</a>
                    <a href="{{ route('paletas.index') }}" class="btn-volver" style="background: #8b7355;">← Volver al listado</a>
                </div>
            </form>
        </div>
    </div>
</div>

<footer>
    <p>El Rincón de Michoacán - Paletería Artesanal</p>
    <p>"Creados para refrescarte el alma"</p>
</footer>

</body>
</html>