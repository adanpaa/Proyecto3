@extends('layouts.app2')
@section('contenido')



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CustomerForm</title>
</head>
<body>

<!-- ======= Breadcrumbs ======= -->
<section class="breadcrumbs">
      <div class="container">


      </div>
    </section>
<!-- End Breadcrumbs -->

@include('partials.error-view');

@if(isset($customer))
<form action="{{ route('customer.update', [$customer]) }}" method="POST" class="card">
@method('patch');
@else
<form action="{{ route('customer.store')}}" method="POST" class="card">
@endif
    
    <div class="card-header" align=center>
      <h3>Formulario de Clientes</h3>
    </div>
    

    <div class="card-body col-6 align-self-md-center">
        @csrf
        <br>
        <div class="form-group">
        <p align=center><label class="col-form-label" for="nombre">Nombre:</label></p>
        <input class="form-control" style="text-align:center" type="text" name="nombre" value="{{ old('nombre') ?? $customer->nombre ?? '' }}"><br>
        </div>

        <div class="form-group">
        <p align=center><label class="col-form-label" for="edad">Edad:</label></p>
        <input class="form-control" style="text-align:center" type="number" name="edad" value="{{ old('edad') ?? $customer->edad ?? '' }}"><br>
        </div>

        <div class="form-group">
        <p align=center><label class="col-form-label" for="plan">Plan:</label></p>
        <input class="form-control" style="text-align:center" type="text" name="plan" value="{{ old('plan') ?? $customer->plan ?? '' }}"><br>
        </div>

        <div class="form-group">
        <p align=center><label class="col-form-label" for="sucursal">Sucursal a la que asiste:</label></p>
        <select class="form-control" name = branch_id>
            @foreach ($branches as $branch)
                <option value="{{ $branch->id }}">{{ $branch->nombre }}</option>
            @endforeach
        </select>
        </div>

        <h4 align=center>Entrenadores Asignados</h4>
        <br>

        <select class="form-control" name="trainer_id[]" multiple>
            @foreach ($trainers as $trainer)
                <option value="{{ $trainer->id }}" {{ isset($customer) && in_array($trainer->id, $customer->trainer()->pluck('id')->toArray()) ? 'selected' : '' }}>{{$trainer->nombre}}</option>
            @endforeach
        </select>
        <br>

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