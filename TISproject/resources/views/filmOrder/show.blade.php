@extends('layouts.app')
@section('content')
<div class="card">
<div class="card mb-4">
   <div class="card-header">
    {{ __('texts.order') }} #{{ $viewData['order']->getId() }}
   </div>
   <div class="card-body">
      <b>{{ __('texts.createdAt') }}:</b> {{ $viewData['order']->getCreatedAt() }}<br />
      <b>{{ __('texts.total') }}:</b> ${{ $viewData['order']->getPrice() }}<br />
      <b>{{ __('texts.photos') }}:</b> 
      <div class="card mb-3">
      <div class="row g-0">
        @foreach($viewData["images"] as $image)
          <div class="col-md-3" >
          <div class="containerImg">
            <img src="{{ URL::asset('storage/'.$image) }}" class="img-thumbnail rounded-start" id="photo">
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</div>
</div>
@endsection