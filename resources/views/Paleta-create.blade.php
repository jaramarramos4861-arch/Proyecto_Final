<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Ingreso de prodcutos</h1>


@csrf

<label>Producto:</label>
<input type="text" name="nombre" value="{{ old('nombre') }}">
<br><br>

<label>Precio:</label>
<input type="number" step="0.01" min="0" name="precio">
<br><br>

<label>Cantidad:</label>
<input type="number" step="1" min="0" name="stock">
<br><br>

<input type="submit" value="Guardar producto">

</form>
</body>
</html>