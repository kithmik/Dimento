<html>
<head>
    <title>
        Dimento @yield('title')
    </title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="/font-awesome/css/font-awesome.min.css">

    <!-- Bootstrap core CSS -->
    <link href="/libs/mdb4/css/bootstrap.css" rel="stylesheet">

    <!-- Material Design Bootstrap -->
    <link href="/libs/mdb4/css/mdb.css" rel="stylesheet">

    <!-- Material Design Bootstrap Extra-->
    <link href="/libs/mdb4/css/compiled.min.css" rel="stylesheet">

    <!-- JQuery -->
    <script type="text/javascript" src="/libs/mdb4/js/jquery-3.1.1.min.js"></script>

</head>

<body>
    @include('includes.navbar')
    <div class="container">
        @yield('content')
    </div>

    <!-- SCRIPTS -->

    <!-- Bootstrap dropdown -->
    <script type="text/javascript" src="/libs/mdb4/js/popper.min.js"></script>

    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="/libs/mdb4/js/bootstrap.min.js"></script>

    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="/libs/mdb4/js/mdb.min.js"></script>

    <script>
        new WOW().init();
    </script>
</body>
</html>