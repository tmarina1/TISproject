@extends('layouts.app')
@section('content')
<div class="card mb-3">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="https://laravel.com/img/logotype.min.svg" class="img-fluid rounded-start">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">
          Referencia: {{ $viewData["product"]->getReference() }}
        </h5>
        <p class="card-text">Marca: {{ $viewData["product"]->getBrand() }}</p>
        <p class="card-text">Precio: {{ $viewData["product"]->getPrice() }}</p>
        <p class="card-text">Stock: {{ $viewData["product"]->getStrock() }}</p>
        <p class="card-text">Descripción: {{ $viewData["product"]->getDescription() }}</p>
        <p class="card-text">Peso: {{ $viewData["product"]->getWeight() }} kg</p>
        <p class="card-text">Reviews: {{ $viewData["product"]->getReview() }}</p>
        <button onclick="window.location.href='{{ route('product.buy', ['id'=>$viewData["id"]]) }}'" class="btn btn-primary">Comprar productor</button>
      </div>
    </div>
  </div>
</div>
@endsection