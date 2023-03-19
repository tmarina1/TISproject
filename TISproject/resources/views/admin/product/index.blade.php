@extends('layouts.admin') 
@section('content') 

  <div class="card mt-5"> 
    <div class="card-header">{{ __('texts.manageProducts') }}</div> 
      <div class="card-body"> 
        <table class="table table-bordered table-striped"> 
          <thead> 
            <tr> 
              <th scope="col">{{ __('texts.id') }}</th> 
              <th scope="col">{{ __('texts.reference') }}</th> 
              <th scope="col">{{ __('texts.brand') }}</th> 
              <th scope="col">{{ __('texts.productOfTheMonth') }}</th>
              <th scope="col">{{ __('texts.edit') }}</th> 
              <th scope="col">{{ __('texts.delete') }}</th> 
            </tr> 
          </thead> 
          <tbody> 
            @foreach ($viewData["products"] as $product)
            <tr> 
              <td>{{ $product->getId() }}</td> 
              <td>{{ $product->getReference() }}</td> 
              <td>{{ $product->getBrand() }}</td> 
              <td>{{ $product->getProductOfTheMonth() }}</td> 
              <td><button onclick="window.location.href='{{ route('admin.product.indexUpDate', ['id'=>$product->getId()]) }}'" class="btn bg-primary text-white">{{ __('texts.edit') }}</button></td> 
              <td>
                <button onclick="window.location.href='{{ route('admin.product.delete', ['id'=>$product->getId()]) }}'" class="btn btn-danger text-white">{{ __('texts.delete') }}</button>
              </td> 
            </tr> 
            @endforeach
          </tbody> 
        </table> 
      </div> 
    </div> 

  <div class="card mt-5">
  <div class="card-header">{{ __('texts.createProduct') }}</div>
    <div class="card-body">
      @if($errors->any())
      <ul id="errors" class="alert alert-danger list-unstyled">
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
      @endif
      <form method="POST" action="{{ route('admin.product.save') }}" enctype="multipart/form-data">
        @csrf
        <input type="text" class="form-control mb-2" placeholder="{{ __('texts.referenceRegister') }}" name="reference" value="{{ old('reference') }}" required/>
        <input type="file" class="form-control mb-2" placeholder="{{ __('texts.imageRegister') }}" name="image" required />
        <input type="text" class="form-control mb-2" placeholder="{{ __('texts.brandRegister') }}" name="brand" value="{{ old('brand') }}" required/>
        <input type="number" class="form-control mb-2" placeholder="{{ __('texts.priceRegister') }}" name="price" value="{{ old('price') }}" required/>
        <input type="number" class="form-control mb-2" placeholder="{{ __('texts.stockRegister') }}" name="stock" value="{{ old('stock') }}" required/>
        <input type="text" class="form-control mb-2" placeholder="{{ __('texts.descriptionRegister') }}" name="description" value="{{ old('description') }}" required/>
        <input type="text" class="form-control mb-2" placeholder="{{ __('texts.weightRegister') }}" name="weight" value="{{ old('weight') }}" required/>
        <label class="form-control mb-2"><input type="checkbox" name="productOfTheMonth"/> {{ __('texts.productOfTheMonth') }}</label>
        <input type="submit" class="btn bg-primary text-white" value="{{ __('texts.createProduct') }}" />
      </form>
    </div>
  </div>
</div>
@endsection