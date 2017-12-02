{{--<nav class="navbar navbar-default navbar-fixed-top">--}}
    {{--<div class="container-fluid">--}}
        {{--<!-- Brand and toggle get grouped for better mobile display -->--}}
        {{--<div class="navbar-header">--}}
            {{--<button type="button" class="navbar-toggle collapsed" data-toggle="collapse"--}}
                    {{--data-target="#bs-example-navbar-collapse-1" aria-expanded="false">--}}
                {{--<span class="sr-only">Toggle navigation</span>--}}
                {{--<span class="icon-bar"></span>--}}
                {{--<span class="icon-bar"></span>--}}
                {{--<span class="icon-bar"></span>--}}
            {{--</button>--}}
            {{--<a class="navbar-brand" href="/">Dimento</a>--}}
        {{--</div>--}}

        {{--<!-- Collect the nav links, forms, and other content for toggling -->--}}
        {{--<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">--}}
            {{--<ul class="nav navbar-nav">--}}
                {{--<li class="nav-item"><a href="/model">Explore Models</a></li>--}}
                {{--<li class="nav-item"><a href="/forum">Forum</a></li>--}}
            {{--</ul>--}}
            {{--@if (Route::has('login'))--}}
                {{--<ul class="nav navbar-nav navbar-right">--}}
                    {{--@if (Auth::check())--}}
                        {{--<li class="nav-item">--}}
                            {{--<a href="{{ url('/home') }}" class="btn "><i class="fa fa-home" aria-hidden="true"></i> Home</a>--}}
                        {{--</li>--}}
                    {{--@else--}}
                        {{--<li class="nav-item">--}}
                            {{--<a href="{{ url('/login') }}">Login</a>--}}
                        {{--</li>--}}
                        {{--<li class="nav-item">--}}
                            {{--<a href="{{ url('/register') }}">Register</a>--}}
                        {{--</li>--}}
                    {{--@endif--}}
                {{--</ul>--}}
            {{--@endif--}}
        {{--</div><!-- /.navbar-collapse -->--}}
    {{--</div><!-- /.container-fluid -->--}}
{{--</nav>--}}


<nav class="navbar navbar-expand-lg navbar-dark indigo">
    <a class="navbar-brand" href="#">Dimento</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="nav navbar-nav">
                <li class="nav-item active"><a href="/model">Explore Models</a></li>
                <li class="nav-item"><a href="/forum">Forum</a></li>
            </ul>
            @if (Route::has('login'))
                <ul class="nav navbar-nav navbar-right">
                    @if (Auth::check())
                        <li class="nav-item nav-link">
                            <a href="{{ url('/home') }}" class="btn "><i class="fa fa-home" aria-hidden="true"></i> Home</a>
                        </li>
                    @else
                        <li class="nav-item nav-link">
                            <a href="{{ url('/login') }}">Login</a>
                        </li>
                        <li class="nav-item nav-link">
                            <a href="{{ url('/register') }}">Register</a>
                        </li>
                    @endif
                </ul>
            @endif
    </div>
</nav>
<br><br>