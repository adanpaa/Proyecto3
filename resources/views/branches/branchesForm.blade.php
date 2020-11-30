@extends('layouts.app2')
@section('contenido')



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BranchForm</title>
</head>
<body>

<!-- ======= Breadcrumbs ======= -->
<section class="breadcrumbs">
      <div class="container">


      </div>
    </section>
<!-- End Breadcrumbs -->

@include('partials.error-view');

@if(isset($branch))
<form action="{{ route('branch.update', [$branch]) }}" method="POST">
@method('patch');
@else
<form action="{{ route('branch.store')}}" method="POST">
@endif
    @csrf
    <ul align=center>
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" value="{{ old('nombre') ?? $branch->nombre ?? '' }}"><br>

    <label for="direccion">Direccion:</label>
    <input type="text" name="direccion" value="{{ old('direccion') ?? $branch->direccion ?? '' }}"><br>

    <label for="correo">Correo:</label>
    <input type="text" name="correo" value="{{ old('correo') ?? $branch->correo ?? '' }}"><br>

    <label for="telefono">Telefono:</label>
    <input type="text" name="telefono" value="{{ old('telefono') ?? $branch->telefono ?? '' }}"><br>


    <button type="submit">Guardar</button>
</ul>
</form>
<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">   
  </div>
</section><!-- End Breadcrumbs -->

</body>
</html>

@endsection