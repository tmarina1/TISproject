@extends('layouts.admin')
@section("title", $viewData["title"])
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('texts.editProduct') }}</div>
          <div class="card-body">
            @if($errors->any())
            <ul id="errors" class="alert alert-danger list-unstyled">
              @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
            @endif

            <form method="POST" action="{{ route('admin.product.upDate', ['id'=>$viewData["id"]]) }}" enctype="multipart/form-data">
              @csrf
              <input type="file" class="form-control mb-2" placeholder="{{ __('texts.imageRegister') }}" name="image" />
              <input type="number" class="form-control mb-2" placeholder="{{ __('texts.priceRegister') }}" name="price" value="{{ old('price') }}" />
              <input type="number" class="form-control mb-2" placeholder="{{ __('texts.stockRegister') }}" name="stock" value="{{ old('stock') }}" />
              <input type="text" class="form-control mb-2" placeholder="{{ __('texts.descriptionRegister') }}" name="description" value="{{ old('description') }}" />
              <input type="submit" class="btn bg-primary text-white" value="{{ __('texts.edit') }}" />
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
