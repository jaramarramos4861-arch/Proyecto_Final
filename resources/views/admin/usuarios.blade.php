<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios - Administrador</title>
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
        
        .container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 2rem;
        }
        
        table {
            width: 100%;
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }
        
        th {
            background: #5c3a21;
            color: white;
            padding: 1rem;
            text-align: left;
        }
        
        td {
            padding: 1rem;
            border-bottom: 1px solid #e0d6cc;
        }
        
        .badge-admin {
            background: #b8860b;
            color: white;
            padding: 0.3rem 0.8rem;
            border-radius: 20px;
            font-size: 0.8rem;
        }
        
        .badge-cliente {
            background: #5c3a21;
            color: white;
            padding: 0.3rem 0.8rem;
            border-radius: 20px;
            font-size: 0.8rem;
        }
        
        .btn-logout {
            background: #c95a3a;
            border: none;
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            cursor: pointer;
        }
    </style>
</head>
<body>

<div class="header">
    <h1>👥 Gestión de Usuarios</h1>
    <div class="nav">
        <a href="{{ route('admin.dashboard') }}"> Dashboard</a>
        <a href="{{ route('paletas.index') }}"> Productos</a>
        <a href="{{ route('home') }}"> Tienda</a>
        <form action="{{ route('logout') }}" method="POST" style="display: inline;">
            @csrf
            <button type="submit" class="btn-logout">Cerrar Sesión</button>
        </form>
    </div>
</div>

<div class="container">
    <h2>Lista de Usuarios Registrados</h2>
    <br>
    
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>Dirección</th>
                <th>Rol</th>
            </tr>
        </thead>
        <tbody>
            @foreach($usuarios as $usuario)
            <tr>
                <td>{{ $usuario->id }}</td>
                <td>{{ $usuario->name }} {{ $usuario->apellidos }}</td>
                <td>{{ $usuario->email }}</td>
                <td>{{ $usuario->telefono }}</td>
                <td>{{ $usuario->direccion }}</td>
                <td>
                    <span class="badge-{{ $usuario->rol }}">
                        {{ ucfirst($usuario->rol) }}
                    </span>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

</body>
</html>