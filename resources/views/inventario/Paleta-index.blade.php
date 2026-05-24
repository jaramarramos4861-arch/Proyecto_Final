<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Productos - Paletería</title>
    <style>
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background: #f0f0f0; }
        .success { color: green; background: #d4edda; padding: 10px; margin: 10px 0; }
        .btn { display: inline-block; padding: 5px 10px; margin: 2px; text-decoration: none; }
        .btn-edit { background: #ffc107; color: #000; }
        .btn-delete { background: #dc3545; color: #fff; border: none; cursor: pointer; }
        .btn-show { background: #17a2b8; color: #fff; }
    </style>
</head>
<body>

@extends('layouts.app')

@section('title', 'Lista de Productos')

@section('content')
<h1>Lista de Productos</h1>

<p>
    <a href="{{ route('paletas.create') }}" class="btn" style="background: #28a745; color: #fff;">+ Crear nuevo producto</a>
</p>

@if(session('success'))
    <div class="success">
        {{ session('success') }}
    </div>
@endif

@if($productos->isEmpty())
    <p>No hay productos registrados.</p>
@else
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Categoría</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($productos as $producto)
            <tr>
                <td>{{ $producto->id }}</td>
                <td>{{ $producto->nombre }}</td>
                <td>{{ $producto->categoria->name ?? 'Sin categoría' }}</td>
                <td>${{ number_format($producto->precio, 2) }}</td>
                <td>{{ $producto->stock }}</td>
                <td>
                    <a href="{{ route('paletas.show', $producto) }}" class="btn btn-show">Ver</a>
                    <a href="{{ route('paletas.edit', $producto) }}" class="btn btn-edit">Editar</a>
                    <form action="{{ route('paletas.destroy', $producto) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-delete" onclick="return confirm('¿Eliminar este producto?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endif

<<<<<<< HEAD
<br>
<a href="{{ url('/') }}" class="btn btn-primary">Volver al inicio</a>
@endsection
=======

<ul>

@foreach ($productos as $producto)



<li>



{{ $producto->nombre }} - {{ $producto->precio }} - {{ $producto->stock }}



{-- <a href="{{ route('paletas.show', $producto) }}"> --}

{-- Ver detalle --}

{-- </a> --}



</li>



@endforeach

</ul>



>>>>>>> upstream/main
</body>
</html>