<!DOCTYPE html>
<html>
<head>
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="{{url('assets/css/app.min.css')}}"  media="screen,projection"/>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.0/themes/smoothness/jquery-ui.css">
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
<nav>
    <div class="nav-wrapper purple darken-4">
        <a href="#" data-activates="mobile-menu" class="button-collapse"><i class="material-icons"  >menu</i></a>
         @include('partials.menu')
    </div>
</nav>
<div class="container">
    <div class="row content">
        <div class="col btn-led s12 m3 content__sidebar"></div>
        <div class="col btn-led s12 m9 content__post">
            @yield('content')
        </div>
    </div>
</div>
<footer>
    @include('partials.scripts')
</footer>
</body>
</html>