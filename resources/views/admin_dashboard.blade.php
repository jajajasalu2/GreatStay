@extends('layouts.app')

@section('content')
<div class="container">
@foreach ($apartments as $apartment)
	<div class="row">
		<div class="col-md-8">
			<a href="/documents/{{$apartment->id}}"><button class="btn btn-default">Documentation</button></a>
			<a href="/verify_apartment/{{$apartment->id}}"><button class="btn btn-submit">Verify</button></a>
			<a href="/apartment/{{$apartment->id}}">Go to Page</a>
		</div>
		<div class="col-md-4">
			@if(!empty($apartment->images()[0]))
			<img src="/storage/images/{{$apartment->images()[0]}}" width='50%'>
			@endif
		</div>
	</div>
	<hr/>
@endforeach
</div>
@endsection
