@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')

<div class="text-center">
  <div class="row justify-content-center">
    <div class="col-lg-3 mb-2 mt-3">
      <h1 id="titlePageProducts" > {{ __('texts.productOfTheMonth') }} </h1>
      <div class="card">
        @foreach ($viewData["productOfTheMonth"] as $productOfTheMonth)
          <img src="{{ URL::asset('storage/'.$productOfTheMonth->getImage()) }}" class="card-img-top img-card">
          <div class="card-body text-center">
            <a href="{{ route('product.show', ['id'=> $productOfTheMonth->getId()]) }}"
              class="btn bg-primary text-white"><strong>{{ $productOfTheMonth->getBrand() }}</strong> : {{ $productOfTheMonth->getReference() }}</a>
            <a href="{{ route('product.show', ['id'=> $productOfTheMonth->getId()]) }}"
              class="btn text-black"><strong>{{ __('texts.price') }}: {{ $productOfTheMonth->getPrice() }}</strong></a>
          </div>
        @endforeach
      </div>
    </div>
  </div>
</div>

<h4 class="mt-3">{{ __('texts.filterByPrice') }}</h4>
<form method="POST" action="{{ route('product.filter') }}">
  @csrf
  <label><input type="radio" name="price" value="50"> $0 - $50 </label>
  <label><input type="radio" name="price" value="100" id="filterPriceItem"> $50 - $100 </label>
  <label><input type="radio" name="price" value="200" id ="filterPriceItem"> $100 - $200</label>
  <label><input type="radio" name="price" value="300" id ="filterPriceItem"> $200 - $300</label>
  <label><input type="radio" name="price" value="301" id ="filterPriceItem"> $300 - $1000</label>
  <input type="submit" class="btn bg-primary text-white" id="buttonOrderByPrice" value="{{ __('texts.filter') }}" />
</form>

<h4>{{ __('texts.filterByBrand') }}</h4>
<form method="POST" action="{{ route('product.filterBrand') }}">
  @csrf
  <select class="mb-3" name="brands" id="selectIndexProducts">
    <option value="minolta">Minolta</option>
    <option value="kentmere">Kentmere</option>
    <option value="olympus">Olympus</option>
    <option value="sony">Sony</option>
    <option value="fujifilm">Fujifilm</option>
    <option value="lomography">Lomography</option>
    <option value="panasonic">Panasonic</option>
    <option value="nikon">Nikon</option>
    <option value="canon">Canon</option>
  </select>
  <input type="submit" class="btn bg-primary text-white" value="{{ __('texts.filter') }}" />
</form>

<div class="row">
  <h1 id="titlePageProducts" class="mt-3 mb-5">{{ __('texts.products') }}</h1>
  @foreach ($viewData["product"] as $product)
  <div class="col-md-4 col-lg-3 mb-2">
    <div class="card">
      <img src="{{ URL::asset('storage/'.$product->getImage()) }}" class="card-img-top img-card">
      <div class="card-body text-center">
        <a href="{{ route('product.show', ['id'=> $product->getId()]) }}" class="btn bg-primary text-white"><strong>{{ $product->getBrand() }}</strong> : {{ $product->getReference() }}</a>
        <a href="{{ route('product.show', ['id'=> $product->getId()]) }}" class="btn text-black"><strong>{{ __('texts.price') }}: {{ $product->getPrice() }}</strong></a>
      </div>
    </div>
  </div>
  @endforeach
</div>

@if($viewData["images"])
<div class="text-center mt-5">
  <div class="row justify-content-center">
    <h1 id="titlePageProducts" >{{ __('texts.filmOfTheMonth') }} </h1>
    <div class="card mb-3 mt-5">
      <div class="row g-0">
        @foreach($viewData["images"] as $image)
          <div class="col-md-3" id="space">
            <img src="{{ URL::asset('storage/'.$image) }}" class="img-fluid rounded-start" id="photo">
          </div>
        @endforeach
      </div>
    </div>
  </div>
</div>
@endif

@endsection