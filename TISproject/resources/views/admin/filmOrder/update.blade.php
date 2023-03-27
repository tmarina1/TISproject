@extends('layouts.admin')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('texts.updateDevelopOrder') }}</div>
          <div class="card-body">
            @if($errors->any())
            <ul id="errors" class="alert alert-danger list-unstyled">
              @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
            @endif

            <form method="POST" action="{{ route('admin.filmOrder.saveUpdate', ['id'=>$viewData["id"]]) }}" enctype="multipart/form-data">
              @csrf
              @if($viewData['order']->getPhoto())
                <label class="form-control mb-2"><input type="radio" name="filmOfTheMonth" value="add"> {{ __('texts.addFilmMonth') }}</label>
                <label class="form-control mb-2"><input type="radio" name="filmOfTheMonth" value="remove"> {{ __('texts.removeFilmMonth') }}</label>
              @else
                <input type="file" class="form-control mb-2" placeholder="{{ __('texts.images') }}" name="image[]" multiple/>
                <input type="text" class="form-control mb-2" placeholder="{{ __('texts.observations') }}" name="observation"/>
              @endif
              <input type="submit" class="btn bg-primary text-white" value="{{ __('texts.edit') }}" />
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
