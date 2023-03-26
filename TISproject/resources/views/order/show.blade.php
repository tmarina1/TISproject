@extends('layouts.app')
@section('title', 'Purchase')
@section('content')

@if(session('success'))
   <div class="card-body">
      <div class="alert alert-success" role="alert">
         {{ __('texts.orderSuccessful')}}
      </div>
   </div>
@endif
<div class="card">
<div class="card mb-4">
   <div class="card-header">
      Order #{{ $viewData['order']->getId() }}
   </div>
   <div class="card-body">
      <b>Date:</b> {{ $viewData['order']->getCreatedAt() }}<br />
      <b>Total:</b> ${{ $viewData['order']->getTotalPrice() }}<br />
      <table class="table table-bordered table-striped text-center mt-3">
         <thead>
            <tr>
            <th scope="col">Item ID</th>
            <th scope="col">Product Name</th>
            <th scope="col">Price</th>
            <th scope="col">Quantity</th>
            </tr>
         </thead>
         <tbody>
            @foreach ($viewData['order']->getItems() as $item)
               <tr>
                  <td>{{ $item->getId() }}</td>
                  <td>
                     <a class="link-success" href="{{ route('product.show', ['id'=> $item->getProduct()->getId()]) }}">
                     {{ $item->getProduct()->getReference() }}
                     </a>
                  </td>
                  <td>${{ $item->getPrice() }}</td>
                  <td>{{ $item->getQuantity() }}</td>
               </tr>
            @endforeach
         </tbody>
      </table>
      </div>
   </div>
   </div>
@endsection