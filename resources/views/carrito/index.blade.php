<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Carrito - El Rincón de Michoacán</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #faf7f2;
            padding: 20px;
        }
        .header {
            background: white;
            padding: 1rem 2rem;
            margin-bottom: 2rem;
            border-radius: 20px;
        }
        .header-contenido {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .logo-area {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        .logo-img {
            width: 50px;
        }
        .logo-texto {
            font-size: 1.2rem;
            font-weight: 700;
            color: #5c3a21;
        }
        .nav a {
            text-decoration: none;
            color: #5c3a21;
            margin-left: 1rem;
        }
        .container {
            max-width: 1000px;
            margin: 0 auto;
            background: white;
            padding: 2rem;
            border-radius: 20px;
        }
        h1 {
            color: #5c3a21;
            margin-bottom: 2rem;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th {
            background: #5c3a21;
            color: white;
            padding: 1rem;
            text-align: left;
        }
        td {
            padding: 1rem;
            border-bottom: 1px solid #ddd;
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
            cursor: pointer;
        }
        .btn-seguir {
            background: #5c3a21;
            color: white;
            padding: 12px 30px;
            border-radius: 40px;
            text-decoration: none;
            display: inline-block;
        }
        .total {
            text-align: right;
            font-size: 1.3rem;
            font-weight: bold;
            color: #5c3a21;
            margin-top: 1.5rem;
        }
        .carrito-vacio {
            text-align: center;
            padding: 3rem;
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
            margin-bottom: 1rem;
        }
        input[type="number"] {
            width: 60px;
            padding: 5px;
            border: 1px solid #ddd;
            border-radius: 8px;
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
            <a href="{{ route('carrito.index') }}">🛒 Mi Carrito</a>
            <span>👤 {{ Auth::user()->name }}</span>
            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" style="background:#c95a3a; border:none; color:white; padding:5px 15px; border-radius:20px; cursor:pointer;">Salir</button>
            </form>
        </div>
    </div>
</div>

<div class="container">
    <h1>🛒 Mi Carrito de Compras</h1>
    
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
        </table>
            <thead>
                <tr><th>Producto</th><th>Precio</th><th>Cantidad</th><th>Subtotal</th><th>Acciones</th></tr>
            </thead>
            <tbody>
                @foreach($carrito as $id => $item)
                <tr>
                    <td>{{ $item['nombre'] }}</td>
                    <td>${{ number_format($item['precio'], 2) }}</td>
                    <td>
                        <form action="{{ route('carrito.actualizar', $id) }}" method="POST" style="display: flex; gap: 5px;">
                            @csrf @method('PUT')
                            <input type="number" name="cantidad" value="{{ $item['cantidad'] }}" min="1">
                            <button type="submit" class="btn-actualizar">Actualizar</button>
                        </form>
                    </td>
                    <td>${{ number_format($item['precio'] * $item['cantidad'], 2) }}</td>
                    <td>
                        <form action="{{ route('carrito.eliminar', $id) }}" method="POST">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn-eliminar">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="total">Total: ${{ number_format($total, 2) }}</div>
        <div class="acciones">
            <a href="{{ route('home') }}" class="btn-seguir">Seguir comprando</a>
            <form action="{{ route('carrito.comprar') }}" method="POST">
                @csrf
                <button type="submit" class="btn-comprar">✅ Realizar compra</button>
            </form>
        </div>
    @endif
</div>

</body>
</html>