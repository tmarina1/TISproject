@extends('layouts.admin') 
@section('content') 

  <div class="card mt-5"> 
    <div class="card-header">{{ __('texts.availableReviews') }}</div> 
      <div class="card-body"> 
        <table class="table table-bordered table-striped"> 
          <thead> 
            <tr> 
              <th scope="col">{{ __('texts.id') }}</th> 
              <th scope="col">{{ __('texts.review') }}</th>
              <th scope="col">{{ __('texts.rate') }}</th> 
              <th scope="col">{{ __('texts.userName') }}</th> 
              <th scope="col">{{ __('texts.productName') }}</th>
              <th scope="col">{{ __('texts.createdAt') }}</th>
              <th scope="col" colspan="2" style="text-align:center">{{ __('texts.modify') }}</th> 
            </tr> 
          </thead> 
          <tbody> 
            @foreach ($viewData["reviews"] as $review)
            <tr> 
              <td>{{ $review->getId() }}</td> 
              <td>{{ $review->getReview() }}</td>
              <td>{{ $review->getRate() }}</td> 
              <td>{{ $review->getUser()->getLastName() }}, {{ $review->getUser()->getName() }}</td>
              <td>{{ $review->getProduct()->getBrand() }} - {{ $review->getProduct()->getReference() }}</td>
              <td>{{ $review->getCreatedAt() }}</td>
              <td>
                <button onclick="window.location.href='{{ route('admin.review.update', ['id'=>$review->getId()]) }}'" style="display:block; margin: 0 auto;" class="btn bg-primary text-white">{{ __('texts.edit') }}</button>
              </td> 
              <td>
                <button onclick="window.location.href='{{ route('admin.review.delete', ['id'=>$review->getId()]) }}'"style="display:block; margin: 0 auto;" class="btn btn-danger text-white">{{ __('texts.delete') }}</button>
              </td>
            </tr> 
            @endforeach
          </tbody> 
        </table> 
      </div> 
    </div> 

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
      <form method="POST" action="{{ route('admin.review.save') }}" enctype="multipart/form-data">
        @csrf
        <input type="text" class="form-control mb-2" placeholder="{{ __('texts.review') }}" name="review" value="{{ old('review') }}" required/>
        <input type="number" class="form-control mb-2" placeholder="{{ __('texts.rate') }}" name="rate" value="{{ old('rate') }}" required />
        <input type="number" class="form-control mb-2" placeholder="{{ __('texts.userId') }}" name="user_id" value="{{ old('user_id') }}" required/>
        <input type="number" class="form-control mb-2" placeholder="{{ __('texts.productId') }}" name="product_id" value="{{ old('product_id') }}" required/>
        <input type="submit" class="btn bg-primary text-white" value="{{ __('texts.createReview') }}" />
      </form>
    </div>
  </div>
</div>
@endsection