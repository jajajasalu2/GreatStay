@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
            <div class="card">
                <div class="card-body">
                <div id = "carousel-outer-container" class="container">
       
                </div>
		<h6><b>{{$apartment->bhk}} BHK</b></h6>
		<p>Host: {{$apartment->owner()->first()->name}}</p>
		<p>{{$apartment->description}}<p>
		<p>Cost per day:<b> {{$apartment->cost_per_day}} </b></p>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script> 
$(document).ready(function() { 
	var i = 0;
	$("#carousel-outer-container").append("<div id='myCarousel' class='carousel slide' data-ride='carousel'></div>");
    $("#myCarousel").append("<ol class='carousel-indicators'></ol>");
	$('#myCarousel').append("<a class='left carousel-control' href='#myCarousel' data-slide='prev'>      <span class='glyphicon glyphicon-chevron-left'></span>      <span class='sr-only'>Previous</span>    </a>    <a class='right carousel-control' href='#myCarousel' data-slide='next'>      <span class='glyphicon glyphicon-chevron-right'></span>      <span class='sr-only'>Next</span>    </a>");
	$("#myCarousel").append("<div class=carousel-inner></div>");
	@foreach ($images as $image)
    if (i != 0) {
        $(".carousel-indicators").append("<li data-target='#myCarousel' data-slide-to='"+ i +"' class='active'></li>")
    }	
    else {
        $(".carousel-indicators").append("<li data-target='#myCarousel' data-slide-to='"+ i +"'></li>")
    }
    i++;
	@endforeach
	@foreach ($images as $image)
        if (i != 0) {
            $(".carousel-inner").append("<div class='item'><img src='/storage/images/{{$image->name}}' width='50%'></div>");
        }
        else {
            $(".carousel-inner").append("<div class='item active'><img src='/storage/images/{{$image->name}}' width='50%'></div>");
        }
	@endforeach
});
</script>
@endsection
