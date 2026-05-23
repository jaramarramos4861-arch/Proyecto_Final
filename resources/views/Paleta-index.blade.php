<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title></title>
</head>
<body>



<h1>Lista de Ofertas</h1>



<p>

<a href="{{ route('Paleta-create') }}">Crear nueva oferta</a>

</p>



@if($paletas->isEmpty())

<p>No hay ofertas registradas</p>

@endif



<ul>

@foreach ($ofertas as $oferta)



<li>



{{ $oferta->titulo }} - {{ $oferta->tienda }}



<a href="{{ route('Paleta-show', $oferta) }}">

Ver detalle

</a>



</li>



@endforeach

</ul>



</body>

</html>