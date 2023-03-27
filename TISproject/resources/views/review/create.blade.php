@extends('layouts.app') 
@section('content') 
<div class="card mt-5">
    <div class="card-header">{{ __('texts.createReview') }}</div>
      <div class="card-body">
        @if($errors->any())
        <ul id="errors" class="alert alert-danger list-unstyled">
          @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
        @endif
        <form method="POST" action="{{ route('review.save', ['id'=> $viewData['productId']]) }}" enctype="multipart/form-data">
          @csrf
          <input type="text" class="form-control mb-2" placeholder="{{ __('texts.review') }}" name="review" value="{{ old('review') }}" required/>
          <input type="number" class="form-control mb-2" min="1" max="5" placeholder="{{ __('texts.rate') }}" name="rate" value="{{ old('rate') }}" required />
          <input type="submit" class="btn bg-primary text-white" value="{{ __('texts.createReview') }}" />
        </form>
      </div>
    </div>
  </div>
  @endsection