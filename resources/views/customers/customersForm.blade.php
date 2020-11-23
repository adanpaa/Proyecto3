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

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(isset($customer))
<form action="{{ route('customer.update', [$customer]) }}" method="POST">
@method('patch');
@else
<form action="{{ route('customer.store')}}" method="POST">
@endif
    @csrf
    <ul align=center>

    

    <br>
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" value="{{ old('nombre') ?? $customer->nombre ?? '' }}"><br>

    <label for="edad">Edad:</label>
    <input type="number" name="edad" value="{{ old('edad') ?? $customer->edad ?? '' }}"><br>

    <label for="plan">Plan:</label>
    <input type="text" name="plan" value="{{ old('plan') ?? $customer->area ?? '' }}"><br>

    <label for="sucursal">Sucursal a la que asiste:</label>
    <select name = branch_id>
        @foreach ($branches as $branch)
            <option value="{{ $branch->id }}">{{ $branch->nombre }}</option>
        @endforeach
    </select>

    <h4>Entrenadores Asignados</h4>
    <br>

    <select name="trainer_id[]" multiple>
        @foreach ($trainers as $trainer)
            <option value="{{ $trainer->id }}" {{ isset($customer) && in_array($trainer->id, $customer->trainers()->pluck('id')->toArray()) ? 'selected' : '' }}>{{$trainer->nombre}}</option>
        @endforeach
    </select>
    <br>

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