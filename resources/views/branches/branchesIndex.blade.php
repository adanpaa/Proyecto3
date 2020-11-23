@extends('layouts.app2')
@section('contenido')

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Branches</title>
</head>
<body>

<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">   
  </div>
</section><!-- End Breadcrumbs -->

<p align=center>
<a href="/branch/create">Add new branch</a>
</p>

<h1>Listado de Sucursales y sus Clientes</h1>

    @foreach ($branches as $branch)

    <h3 align=center>{{ $branch->nombre }}</h3>

        <table align=center border='1'>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Edad</th>
                <th>Plan</th>
            </tr>
            @foreach ($branch->customers as $p)
                <tr>
                <td>{{ $p->id }}</td>
                <td><a href="/trainer/{{ $p->id }}">{{ $p->nombre }}</a></td>
                <td>{{ $p->edad }}</td>
                <td>{{ $p->plan }}</td>
                </tr>
            @endforeach
        </table>

    <hr>
    @endforeach


<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">   
  </div>
</section><!-- End Breadcrumbs -->
</html>

@endsection