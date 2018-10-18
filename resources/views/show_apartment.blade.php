@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    {{$apartment}}
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                {!!Form::open(['action'=>'DealController@store','method'=>'POST','enctype'=>'multipart/form-data'])!!}
                {{Form::text('a_id',$apartment->id,['hidden'])}}
                    <div class="form-group">
                         {{Form::label('check_in','Check in date')}}
                         {{Form::date('check_in',$check_in,['class'=>'form_control'])}}
                    </div>
                    <div class="form-group">
                         {{Form::label('check_out','Check out date')}}
                         {{Form::date('check_out',$check_out,['class'=>'form_control'])}}
                    </div>
                {{Form::submit('Book',['class'=>'btn btn-primary'])}}
                {!!Form::close()!!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
