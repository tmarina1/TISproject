@extends('layouts.app')
@section('title', "Point 'n Shoot")
@section('content')
<div class="row">
  @foreach ($viewData["product"] as $product)
  <div class="col-md-4 col-lg-3 mb-2">
    <div class="card">
      <img src="{{ $product["image"] }}" class="card-img-top img-card">
      <div class="card-body text-center">
        <a href="{{ route('product.show', ['id'=> $product["id"]]) }}"
          class="btn bg-primary text-white">{{ $product["brand"] }} : {{ $product["reference"] }}</a>
      </div>
    </div>
  </div>
  @endforeach
@endsection