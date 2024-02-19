<!DOCTYPE html>
<html lang="en">
<head>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" >

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel DashBoard</title>
    @vite('resources/css/app.css')
</head>
<body >
    <div class="wrapper">
    @include('layout.nav')
  

    @yield('content')

    <footer></footer>
</div>
</body>
<script type="text/javascript" src="{{ asset('js/custom.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
</html>