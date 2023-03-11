@extends('layouts.app')
@section('title', "Point 'n Shoot")
@section('content')
<div class="divContenidoPaginaSobreNosotros">
  <h1 id="titleAboutUs">{{ __('texts.namePage') }}</h1>
  <p id="paragraphPageAboutUs">
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
</div>
@endsection