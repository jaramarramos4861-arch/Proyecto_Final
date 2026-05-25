<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Administrador</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #faf7f2;
        }
        
        .header {
            background: #5c3a21;
            color: white;
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .header h1 {
            font-size: 1.5rem;
        }
        
        .nav {
            display: flex;
            gap: 1rem;
        }
        
        .nav a {
            color: white;
            text-decoration: none;
            padding: 0.5rem 1rem;
            background: rgba(255,255,255,0.2);
            border-radius: 8px;
        }
        
        .nav a:hover {
            background: #b8860b;
        }
        
        .container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 2rem;
        }
        
        .stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1.5rem;
            margin-bottom: 2rem;
        }
        
        .stat-card {
            background: white;
            padding: 1.5rem;
            border-radius: 15px;
            text-align: center;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }
        
        .stat-number {
            font-size: 2.5rem;
            font-weight: bold;
            color: #b8860b;
        }
        
        .stat-label {
            color: #5c3a21;
            margin-top: 0.5rem;
        }
        
        .btn-logout {
            background: #c95a3a;
            border: none;
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            cursor: pointer;
        }
        
        footer {
            text-align: center;
            padding: 2rem;
            color: #8b7355;
            border-top: 1px solid #e0d6cc;
            margin-top: 2rem;
        }
    </style>
</head>
<body>

<div class="header">
    <h1>👑 Panel de Administración</h1>
    <div class="nav">
        <a href="{{ route('paletas.index') }}"> Gestionar Productos</a>
        <a href="{{ route('admin.usuarios') }}"> Usuarios</a>
        <a href="{{ route('home') }}"> Tienda</a>
        <form action="{{ route('logout') }}" method="POST" style="display: inline;">
            @csrf
            <button type="submit" class="btn-logout">Cerrar Sesión</button>
        </form>
    </div>
</div>

<div class="container">
    <h2>Estadísticas Generales</h2>
    <br>
    
    <div class="stats">
        <div class="stat-card">
            <div class="stat-number">{{ $totalProductos ?? 0 }}</div>
            <div class="stat-label">Productos Registrados</div>
        </div>
        <div class="stat-card">
            <div class="stat-number">{{ $totalClientes ?? 0 }}</div>
            <div class="stat-label">Clientes Registrados</div>
        </div>
        <div class="stat-card">
            <div class="stat-number">{{ $stockBajo ?? 0 }}</div>
            <div class="stat-label">Productos con Stock Bajo</div>
        </div>
    </div>
    
    <div style="background: white; padding: 1.5rem; border-radius: 15px; margin-top: 1rem;">
        <h3>📋 Acciones rápidas</h3>
        <br>
        <div style="display: flex; gap: 1rem; flex-wrap: wrap;">
            <a href="{{ route('paletas.create') }}" style="background: #5c3a21; color: white; padding: 0.8rem 1.5rem; border-radius: 40px; text-decoration: none;">➕ Agregar nuevo producto</a>
            <a href="{{ route('paletas.index') }}" style="background: #b8860b; color: white; padding: 0.8rem 1.5rem; border-radius: 40px; text-decoration: none;">✏️ Gestionar inventario</a>
            <a href="{{ route('admin.usuarios') }}" style="background: #8b7355; color: white; padding: 0.8rem 1.5rem; border-radius: 40px; text-decoration: none;">👥 Ver usuarios</a>
        </div>
    </div>
</div>

<footer>
    <p>El Rincón de Michoacán - Paletería Artesanal</p>
</footer>

</body>
</html>