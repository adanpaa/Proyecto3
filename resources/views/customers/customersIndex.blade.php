@extends('layouts.app2')
@section('contenido')

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Customers</title>
</head>
<body>

<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">   
  </div>
</section><!-- End Breadcrumbs -->

<p align=center>
<a href="/customer/create">Add new customer</a>
</p>

<table align=center border='1'>
  <tr>
    <th>ID</th>
    <th>Nombre</th>
    <th>Edad</th>
    <th>Plan</th>
    <th>Sucursal a la que asiste</th>
  </tr>
  @foreach ($customers as $p)
    <tr>
      <td>{{ $p->id }}</td>
      <td><a href="/trainer/{{ $p->id }}">{{ $p->nombre }}</a></td>
      <td>{{ $p->edad }}</td>
      <td>{{ $p->plan }}</td>
      <td>{{ $p->branch->nombre }}</td>
    </tr>
  @endforeach
</table>

<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">   
  </div>
</section><!-- End Breadcrumbs -->
</html>

@endsection