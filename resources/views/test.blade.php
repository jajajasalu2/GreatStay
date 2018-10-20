<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
<script> 
$(document).ready(function(){
    $("#tform").hide();
    $("#add").click(function(){
        $("#tform").slideToggle();
    });

    $("#teamform").hide();
    $("#addteam").click(function(){
        $("#teamform").slideToggle();
    });
   
  
    


   $("#number").keyup(function(){
    var value = $( this ).val();
          var i = 0;
        
            for(i=1; i<=value; i++)
            {
                $("#thatmany").append('<label>Teamname</label><input name="teamname[]" type="text"  /><label>Ranking</label><input name="ranking[]" type="text"  />');
            }
               
    
       });
});
</script>


 
<style> 
#tform,#teamform {
    padding: 5px;
    text-align: center;
    background-color: #9087fe;

}

#addteam,#add{
    text-align:center;
    background-color:#f36a6a;
    font-size: 25px;
    padding: 10px;
}

#tfrom ,#teamform{
    padding: 50px;
    display: none;
}
#submitbutton{
    background-color:#56f441;
    padding:10px;
}
</style>
    

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                @if (Route::has('register'))
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                @endif
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
                <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-header">Admin Dashboard</div>
                    
                                    <div class="card-body">
                                        @if (session('status'))
                                            <div class="alert alert-success" role="alert">
                                                {{ session('status') }}
                                            </div>
                                        @endif
        
        
        
        <div id="add">Add tournament</div>
        <div id="tform">
                <form action="/tournament" method="post" id="tform">
                    {{ csrf_field() }}
                    <label>Name</label>
                    <input type="text" name="tournamentname" id="tournament"><br>
                    <label>Startdate</label>
                    <input type="date" name="startdate" id="start"> <br>
                    <label>Enddate</label>
                    <input type="date" name="enddate" id="end"><br>
                <div id="addteam">Add Teams</div>
               <div id="teamform">
                    <div id="thatmany">
                    <label>enter number of teams</label>
                    <input type="number" name="numberofteams" id="number" >
                  </div></div>
                 <input type="submit" value="submit" id="submitbutton">
                     </form>
       </div>
    
    
       

        </main>
    </div>
</body>
</html>