@extends('layouts.app')
@section('content')

<div class="row">
  <h1 id="titlePageProducts" class="mt-3 mb-5">{{ __('texts.filmDevelopOrders') }}</h1>
  @foreach ($viewData["order"] as $orders)
  <div class="col-md-4 col-lg-3 mb-2">
    <div class="card">
      <div class="card-body text-center">
        <a href="{{ route('filmOrder.show', ['id'=> $orders->getId()]) }}" class="btn bg-primary text-white"><strong>{{ __('texts.order') }} #{{ $orders->getId() }} </strong></a>
        <p class="card-text mt-3">{{ __('texts.reference') }}: {{ $orders->getReferenceFilm() }}</p>
      </div>
    </div>
  </div>
  @endforeach
  <div class="text-center mt-2">
    <a href="{{ route('filmOrder.create') }}" class="btn bg-primary text-white ">{{ __('texts.createOrder') }}</a>
  </div>
</div>

@endsection