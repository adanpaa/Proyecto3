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

<ul align=center>
<a href="{{ action([\App\Http\Controllers\CustomerController::class, 'create']) }}">Añadir nuevo cliente</a><br>
<a href="{{ route('customer.edit', [$customer->id]) }}">Editar Cliente</a><br>
<form action="{{ route('customer.destroy', [$customer]) }}" method="POST">
  @method('DELETE')
  @csrf

  <button type="submit">Eliminar Cliente</button>
</form>
</ul>

<table align=center border='1'>
  <tr>
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

<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">   
  </div>
</section><!-- End Breadcrumbs -->

</body>
</html>

@endsection