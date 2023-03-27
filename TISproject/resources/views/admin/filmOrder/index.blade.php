@extends('layouts.admin') 
@section('content') 

  <div class="card mt-5"> 
    <div class="card-header">{{ __('texts.filmDevelopOrders') }}</div> 
      <div class="card-body"> 
        <table class="table table-bordered table-striped"> 
          <thead> 
            <tr> 
              <th scope="col">{{ __('texts.id') }}</th> 
              <th scope="col">{{ __('texts.reference') }}</th> 
              <th scope="col">{{ __('texts.state') }}</th> 
              <th scope="col">{{ __('texts.filmOfTheMonth') }}</th>
              <th scope="col">{{ __('texts.userPermission') }}</th>
              <th scope="col">{{ __('texts.edit') }}</th>
            </tr> 
          </thead> 
          <tbody> 
            @foreach ($viewData["orders"] as $order)
            <tr> 
              <td>{{ $order->getId() }}</td> 
              <td>{{ $order->getReferenceFilm() }}</td> 
              <td>{{ $order->getState() }}</td> 
              <td>{{ $order->getFilmOfTheMonth() }}</td> 
              <td>{{ $order->getUsePermission() }}</td> 
              <td><button onclick="window.location.href='{{ route('admin.filmOrder.update', ['id'=>$order->getId()]) }}'" class="btn bg-primary text-white">{{ __('texts.edit') }}</button></td> 
      
            @endforeach
          </tbody> 
        </table> 
      </div> 
    </div> 
   </div>
@endsection