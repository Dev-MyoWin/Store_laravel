<!DOCTYPE html>

<html>
    <head>
        <title>Welcome</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="keywords" content="Bekah Shaffer, home" />
        <meta name="description" content="Bekah Shaffer's personal website" />
        <link rel="stylesheet" type="text/css" href="{{asset('css/home.css')}}">
        <link href='https://fonts.googleapis.com/css?family=Raleway:400' rel='stylesheet' type='text/css'>
        <link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet" type='text/css'>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.9.1.min.js"><\/script>')</script>
        <script src="{{asset('js/home.js')}}"></script>
    </head>
    <body>
        <div id="loader-wrapper">
            <div id="loader"></div>
            <div class="loader-section section-left"></div>
            <div class="loader-section section-right"></div>
        </div>
        <div class="parent">
            <h1 class ="right uc mb-5">WELCOME TO OUR STORE</h1> 
            @if (Route::has('login'))
            <ul class="child hover fade-in">
            @auth
            <li class="all25 btn">
			    <a href="{{ url('/home') }}">Home</a>
			</li>
            @else
            <li class="all25 btn">
				<a href="{{ route('login') }}" target="_blank">Login <i class="fa fa-sign-in"></i></a>
			</li>
            @if (Route::has('register'))
            <li class="all25 btn">
				<a href="{{ route('register') }}"" target="_blank">Register Now</a>
            </li>
            @endif
            @endauth
            <li class="all25 btn"><a href="#">about &nbsp; <i class="fa fa-id-card"></i></a></li>
            </ul>
            @endif
        </div> 
        
    </body>
</html>