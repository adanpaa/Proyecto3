@extends('layouts.app')
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

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(isset($trainer))
<form action="{{ route('trainer.update', [$trainer]) }}" method="POST">
@method('patch');
@else
<form action="{{ route('trainer.store')}}" method="POST">
@endif
    @csrf
    <ul align=center>
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" value="{{ old('nombre') ?? $trainer->nombre ?? '' }}"><br>

    <label for="apellido">Apellido:</label>
    <input type="text" name="apellido" value="{{ old('apellido') ?? $trainer->apellido ?? '' }}"><br>

    <label for="edad">Edad:</label>
    <input type="number" name="edad" value="{{ old('edad') ?? $trainer->edad ?? '' }}"><br>

    <label for="area">Area:</label>
    <input type="text" name="area" value="{{ old('area') ?? $trainer->area ?? '' }}"><br>

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