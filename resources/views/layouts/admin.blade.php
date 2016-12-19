<!DOCTYPE html>
<html>
<head>
@section('meta')
<!--Import Google Icon Font-->
<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<!--Import materialize.css-->
<link type="text/css" rel="stylesheet" href="{{url('assets/css/app.min.css')}}"  media="screen,projection"/>
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.0/themes/smoothness/jquery-ui.css">
<!--Let browser know website is optimized for mobile-->
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
@show
</head>
<body>
<nav>
    <div class="nav-wrapper purple darken-4">
        <a href="#" data-activates="mobile-menu" class="button-collapse"><i class="material-icons"  >menu</i></a>
        @include('partials.admin_menu')
    </div>
</nav>
<div class="container">
    <div class="row content">
        @include('partials.flash')
        <div class="col btn-led s12 m12 content__post">
            @yield('content')
        </div>
    </div>
</div>
<footer></footer>
@include('partials.scripts')
@section('script')
@show
</body>
</html>