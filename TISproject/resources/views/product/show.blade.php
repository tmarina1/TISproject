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
        <p class="card-text"><strong>Marca:</strong> {{ $viewData["product"]->getBrand() }}</p>
        <p class="card-text"><strong>Precio:</strong> {{ $viewData["product"]->getPrice() }}</p>
        <p class="card-text"><strong>Stock:</strong> {{ $viewData["product"]->getStrock() }}</p>
        <p class="card-text"><strong>Descripción:</strong> {{ $viewData["product"]->getDescription() }}</p>
        <p class="card-text"><strong>Peso:</strong> {{ $viewData["product"]->getWeight() }} kg</p>
        <p class="card-text"><strong>Reviews:</strong></p>
        @foreach($viewData["product"]->getReviews() as $review)
          <p class="card-text">{{ $review->getReview() }}</p>
        @endforeach
        <button onclick="window.location.href='{{ route('cart.addToCart', ['id'=>$viewData["id"]]) }}'" class="btn btn-primary">Agregar al carrito</button>
      </div>
    </div>
  </div>
  <h1>Hacer una review</h1>

</div>
@endsection