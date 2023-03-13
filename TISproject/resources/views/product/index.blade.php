@extends('layouts.app')
@section('title', "Point 'n Shoot")
@section('content')
<div class="row">
  <h2> Producto recomendado del mes </h2>

  <h1 id="titlePageProducts">Productos</h1>
  @foreach ($viewData["product"] as $product)
  <div class="col-md-4 col-lg-3 mb-2">
    <div class="card">
      <img src="{{ URL::asset('storage/'.$product->image) }}" class="card-img-top img-card">
      <div class="card-body text-center">
        <a href="{{ route('product.show', ['id'=> $product->getId()]) }}"
          class="btn bg-primary text-white">{{ $product->getBrand() }} : {{ $product->getReference() }}</a>
      </div>
    </div>
  </div>
  @endforeach

  <h2>Top 3 productos</h2>

  <h2> Foto del mes </h2>

@endsection