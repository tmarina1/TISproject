@extends('layouts.app')
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
    {{ __('texts.order')}} # {{ $viewData['order']->getId() }}
   </div>
   <div class="card-body">
      <b>{{ __('texts.createdAt')}}</b> {{ $viewData['order']->getCreatedAt() }}<br />
      <b>{{ __('texts.total')}}</b> ${{ $viewData['order']->getTotalPrice() }}<br />
      <table class="table table-bordered table-striped text-center mt-3">
         <thead>
            <tr>
            <th scope="col">{{ __('texts.itemId')}}</th>
            <th scope="col">{{ __('texts.reference')}}</th>
            <th scope="col">{{ __('texts.price')}}</th>
            <th scope="col">{{ __('texts.quantity')}}</th>
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