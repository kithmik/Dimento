<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Dimento') }}</title>

    <!-- Styles -->
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="/libs/mdb4/css/bootstrap.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="/libs/mdb4/css/mdb.min.css" rel="stylesheet">
    <!-- compiled core CSS -->
    <link href="/libs/mdb4/css/compiled.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="/libs/mdb4/css/style.css" rel="stylesheet">
    <style>
        .card{
            border-radius: 15px;
        }
        .login{
            width: 300px;
            border-radius: 15px;
        }
        .btn-default:hover, .btn-default:focus, .btn-default:active, .btn-default.active {
            background-color: white !important;
            color: black !important;
            border: 5px;
        }
    </style>
</head>
<body>
<!--Navbar-->
<nav class="navbar navbar-expand-lg navbar-dark black ">
    <div class="container">
        <!-- Navbar brand -->
        <a class="navbar-brand white-text" href="{{ url('/') }}">
            {{ config('app.name', 'Dimento') }}
        </a>

        <!-- Collapse button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

        <!-- Collapsible content -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <!-- Links -->
            <ul class="navbar-nav mr-auto"></ul>
            <!-- Links -->

            <!-- Login -->
            <ul class="navbar-nav mr-sm-2">
                <!-- Authentication Links -->
                @guest
                <li><a href="{{ route('login') }}" class="btn btn-default black white-text btn-sm">Login</a></li>
                <li><a href="{{ route('register') }}" class="btn btn-default black white-text btn-sm">Register</a></li>
                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                  style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </li>
                    @endguest
            </ul>
        </div>
        <!-- Collapsible content -->
    </div>

</nav>
<!--/.Navbar-->
<br>
@yield('content')
<!-- SCRIPTS -->
<!-- JQuery -->
<script type="text/javascript" src="libs/mdb4/js/jquery-3.1.1.js"></script>

<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="libs/mdb4/js/bootstrap.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="libs/mdb4/js/mdb.js"></script>
</body>
<!-- compiled core JavaScript -->
<script type="text/javascript" src="libs/mdb4/js/compiled.min.js"></script>

<!-- Bootstrap tooltips -->
<script type="text/javascript" src="libs/mdb4/js/popper.min.js"></script>
<script>
    // Material Select Initialization
    $(document).ready(function() {
        $('.mdb-select').material_select();
    });
    // Data Picker Initialization
    var d = new Date();

    $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 120,
        max: new Date(d.getFullYear() - 12, d.getMonth() - 12, d.getDay() + 14),
        format: 'yyyy-mm-dd'
    });

</script>
</body>
</html>
