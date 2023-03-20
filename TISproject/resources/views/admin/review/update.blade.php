@extends('layouts.admin')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('texts.modifyReview') }}</div>
          <div class="card-body">
            @if($errors->any())
            <ul id="errors" class="alert alert-danger list-unstyled">
              @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
            @endif
            <form method="POST" action="{{ route('admin.review.saveUpdate', ['id'=>$viewData["review"]->getId()]) }}" enctype="multipart/form-data">
              @csrf
              <input type="text" class="form-control mb-2" placeholder="{{ __('texts.review') }}" name="review" value="{{ old('review') }}" required/>
              <input type="number" class="form-control mb-2" placeholder="{{ __('texts.rate') }}" name="rate" value="{{ old('rate') }}" required/>
              <input type="number" class="form-control mb-2" placeholder="{{ __('texts.userId') }}" name="user_id" value="{{ $viewData["review"]->getUser()->getId() }}" required/>
              <input type="number" class="form-control mb-2" placeholder="{{ __('texts.productId') }}" name="product_id" value="{{ $viewData["review"]->getProduct()->getId() }}" required/>
              <input type="submit" class="btn bg-primary text-white" value="{{ __('texts.saveReview') }}" />
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
