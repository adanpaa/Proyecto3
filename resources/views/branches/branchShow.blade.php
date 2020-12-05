@extends('layouts.app2')
@section('contenido')

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Branch</title>
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
    <th>Direccion</th>
    <th>Correo</th>
    <th>Telefono</th>
  </tr>
    <tr>
      <td>{{ $branch->id }}</td>
      <td>{{ $branch->nombre }}</td>
      <td>{{ $branch->direccion }}</td>
      <td>{{ $branch->correo }}</td>
      <td>{{ $branch->telefono }}</td>
    </tr>
</table>

@can('admin')
<ul class="navega" align=center>
<a class="btn btn-dark" href="{{ action([\App\Http\Controllers\BranchController::class, 'create']) }}">Agregar Nueva Sucursal</a>
<a class="btn btn-warning" href="{{ route('branch.edit', [$branch->id]) }}">Editar Sucursal</a>
<form action="{{ route('branch.destroy', [$branch]) }}" method="POST">
  @method('DELETE')
  @csrf
  <button class="btn btn-danger" type="submit">Eliminar Sucursal</button>
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