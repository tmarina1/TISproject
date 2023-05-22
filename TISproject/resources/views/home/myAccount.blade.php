@extends('layouts.app')
@section('title', "Point 'n Shoot")
@section('content')
  <h1 class="text-center">{{ __('texts.myAccount') }}</h1>
  <div class="card mb-3 mt-5">
  <div class="row g-0">
    <div class="col-md-12">
      <div class="card-body text-center">
        <h5 class="card-title mb-4">
        {{ $viewData["user"]->getName() }} {{ $viewData["user"]->getLastName() }}
        </h5>
        <p class="card-text"><strong>{{ __('texts.emailRegister') }}</strong>: {{ $viewData["user"]->getEmail() }}</p>
        <p class="card-text"><strong>{{ __('texts.telephoneRegister') }}</strong>: {{ $viewData["user"]->getTelephone() }}</p>
        <p class="card-text"><strong>{{ __('texts.addressRegister') }}</strong>: {{ $viewData["user"]->getAddress() }}</p>
        <p class="card-text"><strong>{{ __('texts.balance') }}</strong>: {{ $viewData["user"]->getBalance() }}</p>
        <a class="btn bg-primary text-white" href="{{ route('wish.index')}}">{{ __('texts.wishes') }}</a>
      </div>
    </div>
  </div>
</div>
@endsection