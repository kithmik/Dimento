<html>
<head>
    <title>
        Dimento @yield('title')
    </title>
</head>

<body>
    @include('includes.navbar')
    <div>
        @yield('content')
    </div>
</body>
</html>