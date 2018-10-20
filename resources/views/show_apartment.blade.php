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
            <br/>
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
            <br/>
            <div class="card">
                <div class="card-body">
                {!!Form::open(['action'=>'ReviewController@store','method'=>'POST','enctype'=>'multipart/form-data'])!!}
                {{Form::text('a_id',$apartment->id,['hidden'])}}
                    <div class="form-group">
                         {{Form::label('rating','Rate out of 5')}}
                         {{Form::text('rating','',['class'=>'form_control'])}}
                    </div>
                    <div class="form-group">
                         {{Form::label('review','Review')}}
                         {{Form::textarea('review','',['class'=>'form_control'])}}
                    </div>
                {{Form::submit('Post',['class'=>'btn btn-primary'])}}
                {!!Form::close()!!}
                </div>
            </div>
            <br/>
            @if(count($reviews) > 0)
            <div class="card">
                <div class="card-body">
                @foreach($reviews as $review)
                    <p><b>{{$review->reviewer()->first()->name}}</b></p>
                    <p>{{$review->review}}</p>
                    <hr/>
                @endforeach
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
