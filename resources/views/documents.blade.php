@extends('layouts.app')

@section('content')
<div class="container">
@foreach ($documents as $document)
	<img src="/storage/images/{{$document}}" width='50%'/>
@endforeach
</div>
@endsection
