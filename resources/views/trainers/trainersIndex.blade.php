@extends('layouts.app2')
@section('contenido')

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Trainers</title>
</head>
<body>

<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">   
  </div>
</section><!-- End Breadcrumbs -->

<p align=center>
<a href="/trainer/create">Add new trainer</a>
</p>

<table align=center border='1'>
  <tr>
    <th>ID</th>
    <th>Nombre</th>
    <th>Apellido</th>
    <th>Edad</th>
    <th>Area</th>
  </tr>
  @foreach ($trainers as $p)
    <tr>
      <td>{{ $p->id }}</td>
      <td><a href="/trainer/{{ $p->id }}">{{ $p->nombre }}</a></td>
      <td>{{ $p->apellido }}</td>
      <td>{{ $p->edad }}</td>
      <td>{{ $p->area }}</td>
    </tr>
  @endforeach
</table>

<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">   
  </div>
</section><!-- End Breadcrumbs -->
</html>

@endsection