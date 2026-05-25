<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Carrito - El Rincón de Michoacán</title>
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
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 2rem;
        }
        
        .titulo {
            font-size: 2rem;
            font-weight: 700;
            color: #5c3a21;
            margin-bottom: 2rem;
        }
        
        table {
            width: 100%;
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
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
        
        .btn-actualizar {
            background: #b8860b;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 8px;
            cursor: pointer;
        }
        
        .btn-eliminar {
            background: #c95a3a;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 8px;
            cursor: pointer;
        }
        
        .btn-comprar {
            background: #2e7d32;
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 40px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            margin-top: 1rem;
        }
        
        .btn-seguir {
            background: #5c3a21;
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 40px;
            text-decoration: none;
            display: inline-block;
        }
        
        .total {
            text-align: right;
            font-size: 1.3rem;
            font-weight: 700;
            color: #5c3a21;
            margin-top: 1.5rem;
        }
        
        .carrito-vacio {
            text-align: center;
            padding: 3rem;
            background: white;
            border-radius: 20px;
            color: #8b7355;
        }
        
        .acciones {
            display: flex;
            gap: 1rem;
            margin-top: 2rem;
            justify-content: space-between;
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
            margin-top: 3rem;
        }
        
        input[type="number"] {
            width: 60px;
            padding: 5px;
            border: 1px solid #e0d6cc;
            border-radius: 8px;
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
            <a href="{{ route('carrito.index') }}" class="btn-carrito">🛒 Mi Carrito</a>
            <span class="usuario">👤 {{ Auth::user()->name }}</span>
            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" style="background: none; border: none; color: #c95a3a; cursor: pointer;">🚪 Cerrar Sesión</button>
            </form>
        </div>
    </div>
</div>

<div class="container">
    <h1 class="titulo">🛒 Mi Carrito de Compras</h1>
    
    @if(session('success'))
        <div class="mensaje-exito">{{ session('success') }}</div>
    @endif
    
    @if(empty($carrito))
        <div class="carrito-vacio">
            <p>🍦 Tu carrito está vacío</p>
            <br>
            <a href="{{ route('home') }}" class="btn-seguir">Ver productos</a>
        </div>
    @else
        <table>
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Subtotal</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($carrito as $id => $item)
                <tr>
                    <td>{{ $item['nombre'] }}</td>
                    <td>${{ number_format($item['precio'], 2) }}</td>
                    <td>
                        <form action="{{ route('carrito.actualizar', $id) }}" method="POST" style="display: flex; gap: 5px;">
                            @csrf
                            @method('PUT')
                            <input type="number" name="cantidad" value="{{ $item['cantidad'] }}" min="1" max="{{ $item['stock'] }}">
                            <button type="submit" class="btn-actualizar">Actualizar</button>
                        </form>
                    </td>
                    <td>${{ number_format($item['precio'] * $item['cantidad'], 2) }}</td>
                    <td>
                        <form action="{{ route('carrito.eliminar', $id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-eliminar">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
        <div class="total">
            Total: ${{ number_format($total, 2) }}
        </div>
        
        <div class="acciones">
            <a href="{{ route('home') }}" class="btn-seguir">Seguir comprando</a>
            <form action="{{ route('carrito.comprar') }}" method="POST">
                @csrf
                <button type="submit" class="btn-comprar">✅ Realizar compra</button>
            </form>
        </div>
    @endif
</div>

<footer>
    <p>El Rincón de Michoacán - Paletería Artesanal</p>
    <p>"Creados para refrescarte el alma"</p>
</footer>

</body>
</html>