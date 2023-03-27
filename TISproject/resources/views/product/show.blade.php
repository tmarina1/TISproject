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
        {{ __('texts.reference') }}: {{ $viewData["product"]->getReference() }}
        </h5>
        <p class="card-text"><strong>{{ __('texts.brand') }}:</strong> {{ $viewData["product"]->getBrand() }}</p>
        <p class="card-text"><strong>{{ __('texts.price') }}:</strong> {{ $viewData["product"]->getPrice() }}</p>
        <p class="card-text"><strong>{{ __('texts.stock') }}:</strong> {{ $viewData["product"]->getStock() }}</p>
        <p class="card-text"><strong>{{ __('texts.description') }}:</strong> {{ $viewData["product"]->getDescription() }}</p>
        <p class="card-text"><strong>{{ __('texts.weight') }}:</strong> {{ $viewData["product"]->getWeight() }} g</p>
        <p class="card-text"><strong>{{ __('texts.reviews') }}:</strong></p>
        @foreach($viewData["product"]->reviews as $review)
          ° {{ $review->getReview() }} <strong>{{ __('texts.user') }}:</strong> {{ $review->getUser()->getName() }} <br>
        @endforeach
      </div>
    </div>
  </div>
</div>
@auth
<form method="POST" action="{{ route('cart.add', ['id'=> $viewData['product']->getId()]) }}"> 
  @csrf 
  <div class="row justify-content-end"> 
    <div class="col-auto"> 
      <div class="input-group col-auto"> 
        <div class="input-group-text">{{ __('texts.quantity') }}</div> 
        <input type="number" min="1" max="10" class="form-control quantity-input" name="quantity" value="1"> 
      </div> 
    </div> 
    <div class="col-auto"> 
      <button class="btn bg-primary text-white" type="submit">{{ __('texts.addToCar') }}</button> 
    </div> 
  </div> 
</form>
@endauth
<div class="text-center">
  <button onclick="window.location.href='{{ route('product.index') }}'" class="btn bg-primary text-white">{{ __('texts.return') }}</button>
  @auth
  <button onclick="window.location.href='{{ route('review.create', ['id'=> $viewData['product']->getId()]) }}'" class="btn btn-danger text-white">{{ __('texts.makeReview') }}</button>
  <button onclick="window.location.href='{{ route('wish.save', ['id'=> $viewData['product']->getId()]) }}'" class="btn btn-success text-white">Lista de deseos</button>
  @endauth
</div>
@endsection