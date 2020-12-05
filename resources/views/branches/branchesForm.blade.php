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
<form action="{{ route('branch.update', [$branch]) }}" method="POST" class="card">
@method('patch');
@else
<form action="{{ route('branch.store')}}" method="POST" class="card">
@endif

    <div class="card-header" align=center>
      <h3>Formulario de Sucursales</h3>
    </div>

      <div class="card-body col-6 align-self-md-center">
        @csrf
          <div class="form-group">
            <p align=center><label class="col-form-label" for="nombre">Nombre:</label></p>
            <input class="form-control" style="text-align:center" type="text" name="nombre" value="{{ old('nombre') ?? $branch->nombre ?? '' }}"><br>
          </div>

          <div class="form-group">
            <p align=center><label class="col-form-label" for="direccion">Direccion:</label></p>
            <input class="form-control" style="text-align:center" type="text" name="direccion" value="{{ old('direccion') ?? $branch->direccion ?? '' }}"><br>
          </div>

          <div class="form-group">
            <p align=center><label class="col-form-label" for="correo">Correo:</label></p>
            <input class="form-control" style="text-align:center" type="text" name="correo" value="{{ old('correo') ?? $branch->correo ?? '' }}"><br>
          </div>

          <div class="form-group">
            <p align=center><label class="col-form-label" for="telefono">Telefono:</label></p>
            <input class="form-control" style="text-align:center" type="text" name="telefono" value="{{ old('telefono') ?? $branch->telefono ?? '' }}"><br>
          </div>

          <p align=center><button class="btn btn-dark" type="submit" class="button-primary">Guardar</button></p>
      </div>
</form>
<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">   
  </div>
</section><!-- End Breadcrumbs -->

</body>
</html>

@endsection