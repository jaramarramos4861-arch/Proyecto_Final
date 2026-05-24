<!DOCTYPE html>
<html>
<head>
<title>Editar producto</title>
</head>

<body>

<h1>Editar Producto</h1>

<p>
<a href="{{ route('paletas.index') }}">Volver a la lista de productos</a>
</p>

<form action="{{ route('paletas.update', $paleta) }}" method="POST">

@csrf
@method('PATCH')

<label>Producto:</label>
<input type="text" name="nombre" value="{{ old('nombre') ?? $paleta->nombre }}">
<br><br>

<label>Precio:</label>
<input type="number" step="0.01" name="precio" value="{{ old('precio') ?? $paleta->precio }}">
<br><br>

<label>Stock:</label>
<input type="number" step="0.01" name="stock" value="{{ old('stock') ?? $paleta->stock }}">
<br><br>

<input type="submit" value="Actualizar oferta">

</form>

</body>
</html>