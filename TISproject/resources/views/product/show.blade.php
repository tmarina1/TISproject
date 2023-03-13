@extends('layouts.app')
@section('content')
<div class="card mb-3">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="{{ URL::asset('storage/'.$viewData["product"]->getImage()) }}" class="img-fluid rounded-start">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">
          Referencia: {{ $viewData["product"]->getReference() }}
        </h5>
        <p class="card-text"><strong>Marca:</strong> {{ $viewData["product"]->getBrand() }}</p>
        <p class="card-text"><strong>Precio:</strong> {{ $viewData["product"]->getPrice() }}</p>
        <p class="card-text"><strong>Stock:</strong> {{ $viewData["product"]->getStock() }}</p>
        <p class="card-text"><strong>Descripción:</strong> {{ $viewData["product"]->getDescription() }}</p>
        <p class="card-text"><strong>Peso:</strong> {{ $viewData["product"]->getWeight() }} kg</p>
        <p class="card-text"><strong>Reviews:</strong></p>
        @foreach($viewData["product"]->reviews as $review)
          ° {{ $review->getReview() }} Usuario: {{ $review->getUser()->getName() }}
        @endforeach

      </div>
    </div>
    
    <form method="POST" action="{{ route('cart.add', ['id'=> $viewData['product']->getId()]) }}"> 
      @csrf 
      <div class="row justify-content-end"> 
        <div class="col-auto"> 
          <div class="input-group col-auto"> 
            <div class="input-group-text">Cantidad</div> 
            <input type="number" min="1" max="10" class="form-control quantity-input" name="quantity" value="1"> 
          </div> 
        </div> 
        <div class="col-auto"> 
          <button class="btn bg-primary text-white" type="submit">Add to cart</button> 
        </div> 
      </div> 
    </form>
    
  </div>
</div>
<h2>Hacer una review</h2>
@endsection