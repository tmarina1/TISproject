@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Crear producto</div>
          <div class="card-body">
            @if($errors->any())
            <ul id="errors" class="alert alert-danger list-unstyled">
              @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
            @endif

            <form method="POST" action="{{ route('product.save') }}" enctype="multipart/form-data">
              @csrf
              <input type="text" class="form-control mb-2" placeholder="Ingrese la referencia" name="reference" value="{{ old('name') }}" />
              <input type="file" class="form-control mb-2" placeholder="Ingrese la imagen" name="image" value="{{ old('price') }}" />
              <input type="text" class="form-control mb-2" placeholder="Ingrese la marca" name="brand" value="{{ old('price') }}" />
              <input type="number" class="form-control mb-2" placeholder="Ingrese el precio" name="price" value="{{ old('price') }}" />
              <input type="number" class="form-control mb-2" placeholder="Ingrese el stock" name="stock" value="{{ old('price') }}" />
              <input type="text" class="form-control mb-2" placeholder="Ingrese la descripción" name="description" value="{{ old('price') }}" />
              <input type="text" class="form-control mb-2" placeholder="Ingrese el peso" name="weight" value="{{ old('price') }}" />

              <input type="submit" class="btn btn-primary" value="Send" />
            </form>

            <div id="mensajeExito">
              {{ session('success') }}
            </div>
          </div>
        </div>
        <div class="text-center">
          <button onclick="window.location.href='{{route('product.index')}}'" class="btn btn-primary">volver</button>
        <div>
      </div>
    </div>
  </div>
</div>
@endsection
