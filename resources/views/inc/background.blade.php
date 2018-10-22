@if(session('background_image'))
	background: url("/storage/images/{{session('background_image')}}");
@else
	background: url("/images/house3.jpg");
@endif

