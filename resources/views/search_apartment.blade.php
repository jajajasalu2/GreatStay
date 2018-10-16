@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Make Sale</h1>
    <p>Post all available information about your item(s) here. Click submit once done.</p>
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
        {{Form::select('location',[1=>'Mumbai',2=>'Delhi',3=>'New York'],['class'=>'form-control','placeholder'=>'Any additional information you can give'])}}
    </div>
    {{Form::submit('Show available rooms',['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
</div>
@endsection