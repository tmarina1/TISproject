@extends('layouts.app')
@section('title', "Point 'n Shoot")
@section('content')
  <h1 id="titleAboutUs">{{ __('texts.namePage') }}</h1>
  <p id="paragraphPageAboutUs" class="mt-5">
    {{ __('texts.textAboutUs1') }}
  <br>
  <br>
    {{ __('texts.textAboutUs2') }}
  <br>
  <br>
    {{ __('texts.textAboutUs3') }}
  <br>
  <br>
    {{ __('texts.textAboutUs4') }}
  </p>
@endsection