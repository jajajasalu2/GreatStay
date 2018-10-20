@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                {!!Form::open(['action'=>'ApartController@store','method'=>'POST','enctype'=>'multipart/form-data'])!!}
                    <div class="form-group">
                         {{Form::label('addr','Official Address')}}
                         {{Form::textarea('addr','',['class'=>'form_control'])}}
                    </div>
                    <div class="form-group">
                        <label for="location_id">Location</label>
                        <select name="location_id" class="form-control">
                        @foreach ($locations as $location)
                            <option value= {{$location->id}}>{{$location->location}}</option>
                        @endforeach
                        </input>
                    </div>
                    <div class="form-group">
                         {{Form::label('bhk','BHK')}}
                         {{Form::number('bhk','1',['class'=>'form_control'])}}
                    </div>
                    <div class="form-group">
                         {{Form::label('description','Brief description of your space')}}
                         {{Form::textarea('description','',['class'=>'form_control'])}}
                    </div>
                    <div class="form-group">
                         {{Form::label('cost_per_day','How much would you charge per day?')}}
                         {{Form::number('cost_per_day','',['class'=>'form_control','min'=>0])}}
                    </div>
                    <div id="apartment-images" class="form-group">
                        <label>How many images do you have?</label>
                        <input id="numofapartmentimages" type="number" min="0"/>
                    </div>
                    <div id="documents" class="form-group">
                        <label><b>Submit any supporting documentation of your house</b></label>
                        <input id="numofdocuments" type="number" min="0"/>
                    </div>
                {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
                {!!Form::close()!!}
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script> 
$(document).ready(function(){
   $("#numofapartmentimages").on("change paste keyup", function(){
    	var value = $(this).val();
        $(".image-input").remove();
        for(var i=1; i<=value; i++) {
                $("#apartment-images").append('<input class="image-input" name="images[]" type="file"/>');
        }
   });    
   $("#numofdocuments").on("change paste keyup", function(){
    	var value = $(this).val();
        $(".document-input").remove();
        for(var i=1; i<=value; i++) {
                $("#documents").append('<input class="document-input" name="documents[]" type="file"/>');
        }
   });
});
</script>
@endsection
