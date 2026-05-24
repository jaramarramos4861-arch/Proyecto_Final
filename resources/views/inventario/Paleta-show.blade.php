<!DOCTYPE html>
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

</body>
</html>