@extends('layouts.app2')
@section('contenido')



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TrainerForm</title>
</head>
<body>

<!-- ======= Breadcrumbs ======= -->
<section class="breadcrumbs">
      <div class="container">


      </div>
    </section>
<!-- End Breadcrumbs -->

@include('partials.error-view');

@if(isset($trainer))
<form action="{{ route('trainer.update', [$trainer]) }}" method="POST" class="card">
@method('patch');
@else
<form action="{{ route('trainer.store')}}" method="POST" class="card">
@endif

    <div class="card-header" align=center>
      <h3>Formulario de Entrenadores</h3>
    </div>

    <div class="card-body col-6 align-self-md-center">
      @csrf
      <div class="form-group">
      <p align=center><label for="nombre">Nombre:</label></p>
      <input class="form-control" style="text-align:center" type="text" name="nombre" value="{{ old('nombre') ?? $trainer->nombre ?? '' }}"><br>
      </div>

      <div class="form-group">
      <p align=center><label for="apellido">Apellido:</label></p>
      <input class="form-control" style="text-align:center" type="text" name="apellido" value="{{ old('apellido') ?? $trainer->apellido ?? '' }}"><br>
      </div>

      <div class="form-group">
      <p align=center><label for="edad">Edad:</label></p>
      <input class="form-control" style="text-align:center" type="number" name="edad" value="{{ old('edad') ?? $trainer->edad ?? '' }}"><br>
      </div>

      <div class="form-group">
      <p align=center><label for="area">Area:</label></p>
      <input class="form-control" style="text-align:center" type="text" name="area" value="{{ old('area') ?? $trainer->area ?? '' }}"><br>
      </div>

      <p align=center><button class="btn btn-dark" type="submit">Guardar</button></p>
    </div>
</form>
<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">   
  </div>
</section><!-- End Breadcrumbs -->

</body>
</html>

@endsection