@extends('layouts.app2')
@section('contenido')

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Customer</title>
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
    <th>Edad</th>
    <th>Plan</th>
    <th>Sucursal</th>
    <th>Entrenadores Asignados</th>
  </tr>
    <tr>
      <td>{{ $customer->id }}</td>
      <td>{{ $customer->nombre }}</td>
      <td>{{ $customer->edad }}</td>
      <td>{{ $customer->plan }}</td>
      <td>{{ $customer->branch->nombre }}</td>
      <td>
        @foreach ($customer->trainer as $trainer)
          {{ $trainer->nombre }} <br>
        @endforeach
      </td>
    </tr>
</table>

<ul class="navega" align=center>
@can('create', App\Models\Customer::class)
<a class="btn btn-dark" href="{{ action([\App\Http\Controllers\CustomerController::class, 'create']) }}">Agregar Nuevo cliente</a>
@endcan
@can('update', $customer)
<a class="btn btn-warning" href="{{ route('customer.edit', [$customer->id]) }}">Editar Cliente</a>
@endcan
@can('admin')
<form action="{{ route('customer.destroy', [$customer]) }}" method="POST">
  @method('DELETE')
  @csrf

  <button class="btn btn-danger" type="submit">Eliminar Cliente</button>
</form>
@endcan
</ul>

<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">   
  </div>
</section><!-- End Breadcrumbs -->

</body>
</html>

@endsection