<div class="container">
<div class="row">
<div class="col-md-4">
<div class="card">
<div class="card-body">
    <h1>Book a room!</h1>
	{!! Form::open(['action'=>'ApartController@list','method'=>'POST','enctype'=>'multipart/form-data']) !!}
    <div class = "form-group">
        {{Form::label('check_in','Check in date')}}
        {{Form::date('check_in',session('check_in'),['class'=>'form-control'])}}
    </div>
    <div class = "form-group">
        {{Form::label('check_out','Check out date')}}
        {{Form::date('check_out',session('check_out'),['class'=>'form-control'])}}
    </div>
    <div class = "form-group">
        {{Form::label('location','Location')}}
        {{Form::select('location',[1=>'Mumbai',2=>'Bangkok',3=>'Singapore'],['class'=>'form-control'])}}
    </div>
    {{Form::submit('Show available rooms',['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
</div>
</div>
</div>
</div>
</div>
