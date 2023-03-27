@extends('layouts.app') 
@section('content') 
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
          <input type="text" class="form-control mb-2" placeholder="{{ __('texts.reference') }}" name="reference" value="{{ old('reference') }}" required/>
          <label  class="form-control mb-2"><input type="checkbox"  name="usePermission" /> {{ __('texts.usePermissionWarning') }}</label>
          <input type="submit" class="btn bg-primary text-white" value="Crear Orden" />
        </form>
      </div>
    </div>
  </div>
  @endsection