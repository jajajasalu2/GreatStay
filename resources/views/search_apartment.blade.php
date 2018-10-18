@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Book a room!</h1>
	{!! Form::open(['action'=>'ApartController@list','method'=>'POST','enctype'=>'multipart/form-data']) !!}
    <div class = "form-group">
        {{Form::label('check_in','Check in date')}}
        {{Form::date('check_in',\Carbon\Carbon::now(),['class'=>'form-control'])}}
    </div>
    <div class = "form-group">
        {{Form::label('check_out','Check out date')}}
        {{Form::date('check_out',\Carbon\Carbon::now(),['class'=>'form-control'])}}
    </div>
    <div class = "form-group">
        {{Form::label('location','Additional Information(optional)')}}
        {{Form::select('location',[1=>'Mumbai',2=>'Bangkok',3=>'Singapore'],['class'=>'form-control'])}}
    </div>
    {{Form::submit('Show available rooms',['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
</div>
@endsection
