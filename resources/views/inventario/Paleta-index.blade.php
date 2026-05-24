<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title></title>
</head>
<body>



<h1>Lista de Productos</h1>



<p>

<a href="{{ route('paletas.create') }}">Crear nueva oferta</a>

</p>



@if($productos->isEmpty())

<p>No hay productos registrados</p>

@endif



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



</body>

</html>