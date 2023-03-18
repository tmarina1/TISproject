@extends('layouts.admin') 
@section('title', $viewData["title"]) 
@section('content') 
<div class="card"> 
  <div class="card-header"> {{ __('texts.adminHome') }} </div> 
  <div class="card-body"> {{ __('texts.adminDescription') }} </div> 
</div> 
@endsection