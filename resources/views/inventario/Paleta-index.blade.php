<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>El Rincón de Michoacán - Paletería Artesanal</title>
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
            position: sticky;
            top: 0;
            z-index: 100;
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
            gap: 1rem;
            align-items: center;
            flex-wrap: wrap;
        }
        
        .nav a {
            text-decoration: none;
            color: #5c3a21;
            font-weight: 500;
        }
        
        .btn-carrito {
            background: #5c3a21;
            color: white !important;
            padding: 8px 20px;
            border-radius: 40px;
        }
        
        .dropdown-admin {
            position: relative;
            display: inline-block;
        }
        
        .dropdown-admin .btn-admin {
            background: #b8860b;
            color: white !important;
            padding: 8px 16px;
            border-radius: 40px;
            text-decoration: none;
        }
        
        .dropdown-content {
            display: none;
            position: absolute;
            background: white;
            min-width: 200px;
            box-shadow: 0 8px 16px rgba(0,0,0,0.1);
            border-radius: 12px;
            z-index: 1;
            right: 0;
            top: 100%;
            margin-top: 5px;
        }
        
        .dropdown-content a {
            color: #5c3a21 !important;
            padding: 12px 16px;
            display: block;
            border-bottom: 1px solid #f0ebe3;
        }
        
        .dropdown-content a:hover {
            background: #faf7f2;
        }
        
        .dropdown-admin:hover .dropdown-content {
            display: block;
        }
        
        .container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 2rem;
        }
        
        .hero {
            text-align: center;
            margin-bottom: 3rem;
        }
        
        .hero h1 {
            font-size: 2.5rem;
            color: #5c3a21;
        }
        
        .hero p {
            font-size: 1.2rem;
            color: #b8860b;
            font-style: italic;
        }
        
        .categoria-seccion {
            margin-bottom: 3rem;
        }
        
        .categoria-titulo {
            font-size: 1.8rem;
            color: #5c3a21;
            border-left: 5px solid #b8860b;
            padding-left: 1rem;
            margin-bottom: 1.5rem;
        }
        
        .productos-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 2rem;
        }
        
        .producto-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            transition: transform 0.2s;
        }
        
        .producto-card:hover {
            transform: translateY(-5px);
        }
        
        .producto-imagen {
            width: 100%;
            height: 200px;
            background: #f0ebe3;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }
        
        .producto-imagen img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .producto-imagen .emoji-placeholder {
            font-size: 4rem;
        }
        
        .producto-info {
            padding: 1.2rem;
        }
        
        .producto-nombre {
            font-size: 1.1rem;
            font-weight: 600;
            color: #5c3a21;
        }
        
        .producto-categoria {
            font-size: 0.7rem;
            color: #b8860b;
            text-transform: uppercase;
        }
        
        .producto-precio {
            font-size: 1.3rem;
            font-weight: 700;
            color: #b8860b;
            margin: 0.5rem 0;
        }
        
        .btn-agregar {
            width: 100%;
            background: #5c3a21;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 40px;
            cursor: pointer;
            font-weight: 600;
        }
        
        .btn-agregar:hover {
            background: #b8860b;
        }
        
        .btn-agregar-deshabilitado {
            width: 100%;
            background: #8b7355;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 40px;
            font-weight: 600;
            cursor: not-allowed;
        }
        
        .btn-admin-accion {
            background: #b8860b;
            color: white;
            padding: 5px 10px;
            border-radius: 20px;
            text-decoration: none;
            font-size: 0.7rem;
            display: inline-block;
        }
        
        .btn-admin-eliminar {
            background: #c95a3a;
            color: white;
            padding: 5px 10px;
            border-radius: 20px;
            border: none;
            cursor: pointer;
            font-size: 0.7rem;
        }
        
        .acciones-admin {
            display: flex;
            gap: 8px;
            margin-top: 10px;
        }
        
        .mensaje-exito {
            background: #e8f5e9;
            color: #2e7d32;
            padding: 1rem;
            border-radius: 12px;
            margin-bottom: 1.5rem;
        }
        
        footer {
            text-align: center;
            padding: 2rem;
            color: #8b7355;
            font-size: 0.8rem;
            border-top: 1px solid #e0d6cc;
            margin-top: 3rem;
        }
        
        @media (max-width: 900px) {
            .productos-grid { grid-template-columns: repeat(2, 1fr); }
        }
        @media (max-width: 600px) {
            .productos-grid { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>

<div class="header">
    <div class="header-contenido">
        <div class="logo-area">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="logo-img">
            <div class="logo-texto">EL RINCÓN<br><span>DE MICHOACÁN</span></div>
        </div>
        <div class="nav">
            <a href="{{ route('home') }}">🍦 Productos</a>
            
            @auth
                <a href="{{ route('carrito.index') }}" class="btn-carrito">🛒 Mi Carrito</a>
                @if(Auth::user()->rol == 'admin')
                    <div class="dropdown-admin">
                        <a href="#" class="btn-admin">⚙️ Admin ▼</a>
                        <div class="dropdown-content">
                            <a href="{{ route('paletas.index') }}">📋 Gestionar</a>
                            <a href="{{ route('admin.dashboard') }}">📊 Dashboard</a>
                            <a href="{{ route('admin.usuarios') }}">👥 Usuarios</a>
                        </div>
                    </div>
                @endif
                <span>👤 {{ Auth::user()->name }}</span>
                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button style="background:none; border:none; color:#c95a3a; cursor:pointer;">🚪 Salir</button>
                </form>
            @else
                <a href="{{ route('login') }}">🔐 Iniciar Sesión</a>
                <a href="{{ route('register') }}">📝 Registrarse</a>
            @endauth
        </div>
    </div>
</div>

<div class="container">
    <div class="hero">
        <h1>🍦 Nuestros Productos</h1>
        <p>"Creados para refrescarte el alma"</p>
    </div>
    
    @if(session('success'))
        <div class="mensaje-exito">{{ session('success') }}</div>
    @endif
    
    @php
        $categorias = [
            'Paletas de Agua' => $productos->where('categoria.name', 'Paletas de Agua'),
            'Paletas de Crema' => $productos->where('categoria.name', 'Paletas de Crema'),
            'Helados' => $productos->where('categoria.name', 'Helados'),
            'Aguas Frescas' => $productos->where('categoria.name', 'Aguas Frescas'),
        ];
    @endphp
    
    @foreach($categorias as $nombreCategoria => $productosCat)
        @if($productosCat->count() > 0)
        <div class="categoria-seccion">
            <h2 class="categoria-titulo">{{ $nombreCategoria }}</h2>
            <div class="productos-grid">
                @foreach($productosCat as $producto)
                <div class="producto-card">
                    <div class="producto-imagen">
                        @if($producto->imagen && file_exists(public_path('images/'.$producto->imagen)))
                            <img src="{{ asset('images/'.$producto->imagen) }}" alt="{{ $producto->nombre }}">
                        @else
                            <span class="emoji-placeholder">🍦</span>
                        @endif
                    </div>
                    <div class="producto-info">
                        <div class="producto-nombre">{{ $producto->nombre }}</div>
                        <div class="producto-categoria">{{ $producto->categoria->name ?? '' }}</div>
                        <div class="producto-precio">${{ number_format($producto->precio, 2) }}</div>
                        
                        @auth
                            @if($producto->stock > 0)
                                <form action="{{ route('carrito.agregar', $producto->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn-agregar">🛒 Agregar al carrito</button>
                                </form>
                            @else
                                <button class="btn-agregar-deshabilitado" disabled>❌ Agotado</button>
                            @endif
                            
                            @if(Auth::user()->rol == 'admin')
                                <div class="acciones-admin">
                                    <a href="{{ route('paletas.edit', $producto->id) }}" class="btn-admin-accion">✏️ Editar</a>
                                    <form action="{{ route('paletas.destroy', $producto->id) }}" method="POST" onsubmit="return confirm('¿Eliminar?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-admin-eliminar">🗑️ Eliminar</button>
                                    </form>
                                    <a href="{{ route('paletas.show', $producto->id) }}" class="btn-admin-accion" style="background:#5c3a21;">👁️ Ver</a>
                                </div>
                            @endif
                        @else
                            <button class="btn-agregar" onclick="alert('Inicia sesión para comprar')">🔐 Inicia sesión</button>
                        @endauth
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif
    @endforeach
</div>

<footer>
    <p>El Rincón de Michoacán - Paletería Artesanal</p>
    <p>"Creados para refrescarte el alma"</p>
</footer>

</body>
</html>