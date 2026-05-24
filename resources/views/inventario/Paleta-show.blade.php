<!DOCTYPE html>
<<<<<<< HEAD
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle del Producto</title>
    <style>
        .card { border: 1px solid #ddd; padding: 20px; margin: 20px 0; border-radius: 5px; }
        .detail { margin: 10px 0; }
        .label { font-weight: bold; display: inline-block; width: 150px; }
        .btn { display: inline-block; padding: 8px 15px; margin: 5px; text-decoration: none; border-radius: 4px; }
        .btn-edit { background: #ffc107; color: #000; }
        .btn-delete { background: #dc3545; color: #fff; border: none; cursor: pointer; }
        .btn-back { background: #6c757d; color: #fff; }
    </style>
</head>
<body>

@extends('layouts.app')

@section('title', 'Detalle del Producto')

@section('content')
<h1>Detalle del Producto</h1>

<div class="card">
    <div class="detail">
        <span class="label">ID:</span>
        <span>{{ $paleta->id }}</span>
    </div>
    
    <div class="detail">
        <span class="label">Nombre:</span>
        <span>{{ $paleta->nombre }}</span>
    </div>
    
    <div class="detail">
        <span class="label">Categoría:</span>
        <span>{{ $paleta->categoria->name ?? 'Sin categoría' }}</span>
    </div>
    
    <div class="detail">
        <span class="label">Descripción de categoría:</span>
        <span>{{ $paleta->categoria->Descripcion ?? 'No disponible' }}</span>
    </div>
    
    <div class="detail">
        <span class="label">Precio:</span>
        <span>${{ number_format($paleta->precio, 2) }}</span>
    </div>
    
    <div class="detail">
        <span class="label">Stock disponible:</span>
        <span>{{ $paleta->stock }} unidades</span>
    </div>
    
    <div class="detail">
        <span class="label">Fecha de creación:</span>
        <span>{{ $paleta->created_at->format('d/m/Y H:i:s') }}</span>
    </div>
    
    <div class="detail">
        <span class="label">Última actualización:</span>
        <span>{{ $paleta->updated_at->format('d/m/Y H:i:s') }}</span>
    </div>
</div>

<div>
    <a href="{{ route('paletas.edit', $paleta) }}" class="btn btn-edit">Editar producto</a>
    
    <form action="{{ route('paletas.destroy', $paleta) }}" method="POST" style="display: inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-delete" onclick="return confirm('¿Estás seguro de eliminar este producto?')">Eliminar producto</button>
    </form>
    
    <a href="{{ route('paletas.index') }}" class="btn btn-back">Volver al listado</a>
</div>
@endsection
=======
<html>
<head>
<title>Detalle del producto</title>
</head>

<body>

<h1>Información del producto</h1>

<ul>

<li><strong>Producto:</strong> {{ $paleta->nombre }}</li>

<li><strong>Precio:</strong> {{ $paleta->precio }}</li>

<li><strong>Stock:</strong> {{ $paleta->stock }}</li>

</ul>

<p>

{-- <a href="{{ route('paletas.edit', $paleta) }}">Editar</a> --}

{-- <form action="{{ route('paletas.destroy', $paleta) }}" method="POST"> --}

@csrf
@method('DELETE')

<button type="submit">Eliminar</button>

</form>

</p>

<p>
<a href="{{ route('paletas.index') }}">Volver a la lista</a>
</p>

>>>>>>> upstream/main
</body>
</html>