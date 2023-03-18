@extends('layouts.app') 
@section('subtitle', $viewData["subtitle"]) 
@section('content') 
<div class="card"> 
  <div class="card-header">{{ __('texts.productsInCart') }}</div> 
    <div class="card-body"> 
      <table class="table table-bordered table-striped text-center"> 
        <thead> 
          <tr> 
            <th scope="col">{{ __('texts.id') }}</th> 
            <th scope="col">{{ __('texts.reference') }}</th> 
            <th scope="col">{{ __('texts.brand') }}</th> 
            <th scope="col">{{ __('texts.price') }}</th> 
            <th scope="col">{{ __('texts.quantity') }}</th> 
            <th scope="col">{{ __('texts.delete') }}</th>
          </tr> 
        </thead>
        <tbody> 
          @foreach ($viewData["products"] as $product) 
          <tr> 
            <td>{{ $product->getId() }}</td> 
            <td>{{ $product->getReference() }}</td> 
            <td>{{ $product->getBrand() }}</td> 
            <td>${{ $product->getPrice() }}</td> 
            <td>{{ session('products')[$product->getId()] }}</td> 
            <td><a href="{{ route('cart.removeElement', ['id'=> $product->getId()]) }}"><button class="btn btn-danger mb-2">{{ __('texts.deleteProduct') }}</button> </a> </td>
          </tr>
          @endforeach 
        </tbody> 
      </table> 

      <div class="row">
        <div class="text-end"> 
          <a class="btn btn-outline-secondary mb-2">{{ __('texts.totalToPay') }}: ${{ $viewData["total"] }}</a> 
          <a class="btn bg-primary text-white mb-2" href="{{ route('cart.purchase') }}">{{ __('texts.generateOrder')}}</a> 
          <a href="{{ route('cart.remove') }}">
            <button class="btn btn-danger mb-2">{{ __('texts.deleteAllProductsForCart') }}</button> 
          </a> 
        </div> 
      </div> 
      <button onclick="window.location.href='{{route('product.index')}}'" class="btn bg-primary text-white mb-2">{{ __('texts.listProducts') }}</button>
    </div> 
  </div>
</div> 
@endsection