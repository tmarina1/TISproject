@extends('layouts.app') 
@section('content') 
@if(session('fail'))
  <div class="card-body">
    <div class="alert alert-warning" role="alert">
      {{ __('texts.notEnoughMony') }}
    </div>
  </div>
@endif 
@if(session('success'))
  <div class="card-body">
    <div class="alert alert-success" role="alert">
      {{ __('texts.orderSuccessful')}}
    </div>
  </div>
@endif
<div class="card mt-5">
    <div class="card-header">{{ __('texts.filmDevelopOrders') }}</div>
      <div class="card-body">
        @if($errors->any())
        <ul id="errors" class="alert alert-danger list-unstyled">
          @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
        @endif
        <form method="POST" action="{{ route('filmOrder.save') }}" enctype="multipart/form-data">
          @csrf
          <input type="text" class="form-control mb-2" placeholder="{{ __('texts.reference') }}" name="referenceFilm" value="{{ old('reference') }}" required/>
          <label  class="form-control mb-2"><input type="checkbox"  name="usePermission" /> {{ __('texts.usePermissionWarning') }}</label>
          <input type="submit" class="btn bg-primary text-white" value="{{ __('texts.createOrder') }}" />
        </form>
      </div>
    </div>
  </div>
  @endsection