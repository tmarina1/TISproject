@extends('layouts.app')
@section('content')

<div class="row">
  <h1 id="titlePageProducts" class="mt-3 mb-5">{{ __('texts.wishes') }}</h1>
  @foreach ($viewData["wish"] as $wishes)
  <div class="col-md-4 col-lg-3 mb-2">
    <div class="card">
      <div class="card-body text-center">
        <p class="card-text"><strong>{{ __('texts.reference') }}:</strong> {{ $wishes->getProduct()->getReference()}}</p>
        <p class="card-text"><strong>{{ __('texts.brand') }}:</strong> {{ $wishes->getProduct()->getBrand()}}</p>
        <p class="card-text"><strong>{{ __('texts.price') }}:</strong> {{ $wishes->getProduct()->getPrice()}}</p>
        <p class="card-text"><strong>{{ __('texts.stock') }}:</strong> {{ $wishes->getProduct()->getStock()}}</p>
        <form method="POST" action="{{ route('cart.add', ['id'=> $wishes->getProduct()->getId()]) }}"> 
          @csrf 
          <div class="row justify-content-center"> 
            <div class="col-auto"> 
              <div class="input-group col-auto"> 
                <div class="input-group-text">{{ __('texts.quantity') }}</div> 
                <input type="number" min="1" max="10" class="form-control quantity-input" name="quantity" value="1"> 
              </div> 
            </div> 
            <div class="col-auto mt-3"> 
              <button class="btn bg-primary text-white" type="submit">{{ __('texts.addToCar') }}</button> 
            </div> 
          </div> 
        </form>
        <button onclick="window.location.href='{{ route('wish.delete', ['id'=> $wishes->getId()]) }}'" class="btn btn-danger text-white mt-3">{{ __('texts.delete') }}</button>
      </div>
    </div>
  </div>
  @endforeach
</div>

@endsection