@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                {!!Form::open(['action'=>'ApartController@store','method'=>'POST','enctype'=>'multipart/form-data'])!!}
                    <div class="form-group">
                         {{Form::label('address','Official Address')}}
                         {{Form::textarea('address','',['class'=>'form_control'])}}
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
                         {{Form::number('cost_per_day','',['class'=>'form_control'])}}
                    </div>
                {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
                {!!Form::close()!!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
