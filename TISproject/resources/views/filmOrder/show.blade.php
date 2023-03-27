@extends('layouts.app')
@section('title', 'Ordenes de revelado')
@section('content')
<div class="card">
<div class="card mb-4">
   <div class="card-header">
      Order #{{ $viewData['order']->getId() }}
   </div>
   <div class="card-body">
      <b>Date:</b> {{ $viewData['order']->getCreatedAt() }}<br />
      <b>Total:</b> ${{ $viewData['order']->getPrice() }}<br />
      <b>Fotos:</b> 
      <div class="card mb-3">
      <div class="row g-0">
        @foreach($viewData["images"] as $image)
          <div class="col-md-2">
            <img src="{{ URL::asset('storage/'.$image) }}" class="img-fluid rounded-start">
          </div>
        @endforeach
      </div>
    </div>
   </div>
</div>
</div>
@endsection