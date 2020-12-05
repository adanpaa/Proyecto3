@extends('layouts.app2')
@section('contenido')

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Trainer</title>
</head>
<body>

<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">   
  </div>
</section><!-- End Breadcrumbs -->

<table class="table" align=center>
  <tr class="thead-dark">
    <th>ID</th>
    <th>Nombre</th>
    <th>Apellido</th>
    <th>Edad</th>
    <th>Area</th>
  </tr>
    <tr>
      <td>{{ $trainer->id }}</td>
      <td>{{ $trainer->nombre }}</td>
      <td>{{ $trainer->apellido }}</td>
      <td>{{ $trainer->edad }}</td>
      <td>{{ $trainer->area }}</td>
    </tr>
</table>

@can('admin')
<ul align=center>
<a class="btn btn-dark" href="{{ action([\App\Http\Controllers\TrainersController::class, 'create']) }}">Añadir nuevo entrenador</a>
<a class="btn btn-warning" href="{{ route('trainer.edit', [$trainer->id]) }}">Editar Entrenador</a>
<form action="{{ route('trainer.destroy', [$trainer]) }}" method="POST">
  @method('DELETE')
  @csrf

  <button class="btn btn-danger" type="submit">Eliminar Entrenador</button>
</form>
</ul>
@endcan

<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">   
  </div>
</section><!-- End Breadcrumbs -->

</body>
</html>

@endsection