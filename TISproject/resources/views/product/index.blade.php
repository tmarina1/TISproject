@extends('layouts.app')
@section('title', "Point 'n Shoot")
@section('content')

<div class="text-center">
<div class="row justify-content-center">
  <h2 id="titlePageProducts" > {{ __('texts.productOfTheMonth') }} </h2>
  @foreach ($viewData["productOfTheMonth"] as $productOfTheMonth)
  <div class="col-lg-3 mb-2 mt-3">
    <div class="card">
      <img src="{{ URL::asset('storage/'.$productOfTheMonth->image) }}" class="card-img-top img-card">
      <div class="card-body text-center">
        <a href="{{ route('product.show', ['id'=> $productOfTheMonth->getId()]) }}"
          class="btn bg-primary text-white">{{ $productOfTheMonth->getBrand() }} : {{ $productOfTheMonth->getReference() }}</a>
        <a href="{{ route('product.show', ['id'=> $productOfTheMonth->getId()]) }}"
          class="btn text-black"><strong>Price: {{ $productOfTheMonth->getPrice() }}</strong></a>
      </div>
    </div>
  </div>
  @endforeach
</div>
</div>

<h4 class="mt-3">{{ __('texts.orderByPrice') }}</h4>
<form method="POST" action="{{ route('product.filter') }}">
  @csrf
  <label><input type="radio" name="price" value="50"> $0 - $50 </label>
  <label><input type="radio" name="price" value="100" id="filterPriceItem"> $50 - $100 </label>
  <label><input type="radio" name="price" value="200" id ="filterPriceItem"> $100 - $200</label>
  <label><input type="radio" name="price" value="300" id ="filterPriceItem"> $200 - $300</label>
  <label><input type="radio" name="price" value="301" id ="filterPriceItem"> Mayor a $300</label>
  <input type="submit" class="btn bg-primary text-white" value="ordenar" />
</form>

<div class="row">

  <h1 id="titlePageProducts" class="mt-3">Productos</h1>
  @foreach ($viewData["product"] as $product)
  <div class="col-md-4 col-lg-3 mb-2">
    <div class="card">
      <img src="{{ URL::asset('storage/'.$product->image) }}" class="card-img-top img-card">
      <div class="card-body text-center">
        <a href="{{ route('product.show', ['id'=> $product->getId()]) }}"
          class="btn bg-primary text-white">{{ $product->getBrand() }} : {{ $product->getReference() }}</a>
          <a href="{{ route('product.show', ['id'=> $product->getId()]) }}"
          class="btn text-black"><strong>Price: {{ $product->getPrice() }}</strong></a>
        </div>
    </div>
  </div>
  @endforeach

@endsection