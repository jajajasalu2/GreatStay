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
    <style>
        body {
    position: absolute;
    top: 0; bottom: 0; left: 0; right: 0;
    height: 100%;
}
body:before {
    content: "";
    position: absolute;
    background: url("/images/house3.jpg");
    background-size: cover;
    z-index: -1; /* Keep the background behind the content */
    height: 20%; width: 20%; /* Using Glen Maddern's trick /via @mente */

    /* don't forget to use the prefixes you need */
    transform: scale(5);
    transform-origin: top left;
    filter: blur(2px);
}
</style>
</head>
<body background="">
    <div id="app">
	@include('inc.navbar')
        <div class="container">
	@include('inc.messages')
	</div>
        <main class="py-4">
        @yield('content')
        </main>
    </div>
</body>

</html>

