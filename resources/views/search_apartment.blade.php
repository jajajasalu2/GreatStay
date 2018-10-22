@extends('layouts.app')

@section('content')
@include('search_card')
<br/>
<div class="container">
	<div class="card">
		<div class="card-body">
@foreach ($apartments as $apartment)
	<div class="row">
	<div class="col-md-4">
	@if(!empty($apartment->images()))
	<a href="/apartment/{{$apartment->id}}">
	<img class="pull-left" src="/storage/images/{{$apartment->images()[0]}}" width='50%'>
	</a>
	@endif
	</div>
	<div class="col-md-8">
	<h4>{{$apartment->bhk}} BHK</h4>
	<p><b>{{$apartment->location()}}</b></p>
	<p><b>Cost: {{$apartment->cost_per_day}}</b></p>
	<a href="/apartment/{{$apartment->id}}">Room Page</a>
	</div>
	</div>
	<hr/>
@endforeach
</div>
</div>
</div>
@endsection
