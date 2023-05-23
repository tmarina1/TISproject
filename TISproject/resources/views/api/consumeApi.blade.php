@extends('layouts.app')
@section('subtitle', 'NukeBombs') 
@section('content')
<h4 class="text-center">{{ __('texts.infoNukeStore') }}: <a href="https://www.nukestore.world/">Nukestore</a></h4>
<div class="containerCards">
@foreach($viewData as $item)
    <section class="bombCard">
        <p><strong>{{ __('texts.bombName') }}</strong> {{ $item['name'] }}</p>
        <p><strong>{{ __('texts.bombType') }}</strong> {{ $item['type'] }}</p>
        <p><strong>{{ __('texts.bombLocationCountry') }}</strong> {{ $item['location_country'] }}</p>
        <p><strong>{{ __('texts.bombManufacturingCountry') }}</strong> {{ $item['manufacturing_country'] }}</p>
        <p><strong>{{ __('texts.bombStock') }}</strong> {{ $item['stock'] }}</p>
        <p><strong>{{ __('texts.bombDestructionPower') }}</strong> {{ $item['destruction_power'] }}</p>
    </section>
@endforeach
</div>
@endsection