@extends('layouts.app')

@section('content')
@include('search_card')
<div class="container">
@foreach ($apartments as $apartment)
	<div class="pull-right">
	<h4>{{$apartment->bhk}} BHK</h4>
	<p><b>{{$apartment->location()}}</b></p>
	</div>
	@if(!empty($apartment->images()))
	<img src="/storage/images/{{$apartment->images()[0]}}" class="pull-right" width='10%' height='10%'>
	@endif
	<hr/>
@endforeach
</div>
@endsection
