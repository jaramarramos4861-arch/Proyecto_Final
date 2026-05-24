<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Producto</title>
    <style>
        .error { color: red; }
        .success { color: green; }
    </style>
</head>
<body>
    <h1>Ingreso de productos</h1>

    @if($errors->any())
        <div class="error">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('paletas.store') }}" method="POST">
        @csrf

        <label>Producto:</label>
        <input type="text" name="nombre" value="{{ old('nombre') }}" required>
        <br><br>

        <label>Categoría:</label>
        <select name="categoria_id" required>
            <option value="">Selecciona una categoría</option>
            @foreach($categorias as $categoria)
                <option value="{{ $categoria->id }}" {{ old('categoria_id') == $categoria->id ? 'selected' : '' }}>
                    {{ $categoria->name }}
                </option>
            @endforeach
        </select>
        <br><br>

        <label>Precio:</label>
        <input type="number" step="0.01" min="0" name="precio" value="{{ old('precio') }}" required>
        <br><br>

        <label>Cantidad (Stock):</label>
        <input type="number" step="1" min="0" name="stock" value="{{ old('stock') }}" required>
        <br><br>

        <input type="submit" value="Guardar producto">
        <a href="{{ route('paletas.index') }}">Cancelar</a>
    </form>
</body>
</html>