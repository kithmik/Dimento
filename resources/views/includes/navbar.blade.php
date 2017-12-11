<style>
    .search:focus {
        width: 75% !important;
    }

    body {
        padding-top: 65px;
    }

</style>


<div class="container">
    <!--Navbar-->
    <nav class="navbar navbar-expand-lg navbar-light blue-grey lighten-5 fixed-top scrolling-navbar">
        <div class="container">
            <a class="navbar-brand" href="/"><img src="/img/logo.png" height="50" style="padding-top: 10px"
                                                  class="d-inline-block align-top" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto smooth-scroll">
                    <li class="nav-item">
                        <a class="nav-link ex-a" href="/home">
                            <i class="fa fa-home" aria-hidden="true"></i>
                            Home
                        </a>
                    </li>
                    <li class="nav-item btn-group">
                        <a class="nav-link dropdown-toggle smooth-scroll-li" id="navbarDropdownMenuLink"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-animation="false">
                            <i class="fa fa-wpexplorer" aria-hidden="true"></i>
                            Explore
                        </a>
                        <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                            <div class="list-group">
                                <a href="/explore/object/{{ urlencode('animals') }}" class="list-group-item ex-a">
                                    <img src="https://png.icons8.com/dog/dotty/35/000000">Animals
                                </a>
                                <a href="/explore/object/{{ urlencode('architecture') }}" class="list-group-item ex-a ">
                                    <img src="https://png.icons8.com/museum/ios7/35/000000">Architecture
                                </a>
                                <a href="/explore/object/{{ urlencode('art') }}" class="list-group-item  ex-a">
                                    <img src="https://png.icons8.com/theatre-mask/ios7/35/000000">Art
                                </a>
                                <a href="/explore/object/{{ urlencode('characters') }}" class="list-group-item ex-a ">
                                    <img src="https://png.icons8.com/people/dotty/35/000000">Characters
                                </a>
                                <a href="/explore/object/{{ urlencode('food') }}" class="list-group-item  ex-a">
                                    <img src="https://png.icons8.com/vegetarian-food/dotty/35/000000">Food
                                </a>
                                <a href="/explore/object/{{ urlencode('furniture') }}" class="list-group-item ex-a ">
                                    <img src="https://png.icons8.com/sofa/ios7/35/000000">Furniture
                                </a>
                                <a href="/explore/object/{{ urlencode('other') }}" class="list-group-item ">Other</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item btn-group">
                        <a class="nav-link dropdown-toggle smooth-scroll-li" id="navbarDropdownMenuLink"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-users" aria-hidden="true"></i>
                            Connect
                        </a>
                        <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item ex-a" href="/forum">Forum</a>
                            <a class="dropdown-item ex-a" href="/user">Community</a>
                            {{--<a class="dropdown-item" href="#">Blog</a>--}}
                        </div>
                    </li>
                </ul>


                <ul style="list-style: none" class="form-inline">
                    <form class="form-inline" id="search-form">
                        <i class="fa fa-search prefix"></i>
                        <input class="form-control mr-sm-2" autocomplete="off" name="search" id="search" type="text"
                               placeholder="Search" aria-label="Search">
                    </form>

                    @auth
                        <li class="nav-item">
                            <a class="nav-link ex-a" href="/message">
                                <i class="fa fa-comments fa-2x " aria-hidden="true" style="color: black"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link ex-a" href="/notifications">
                                <i class="fa fa-globe fa-2x " aria-hidden="true" style="color: black"></i>
                            </a>
                        </li>
                        @if(auth()->user()->type == 1)
                            {{--auth if a designer only--}}
                            <li class="nav-item btn-group">
                                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
                                   aria-haspopup="true" aria-expanded="false">Post<span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                                    <a href="{{ route('object.create') }}" type="button"
                                       class="dropdown-item ex-a">Upload Object</a>
                                    <a href="{{ route('post.create') }}" type="button"
                                       class="dropdown-item ex-a"> Ask a Question</a>
                                </div>
                            </li>


                        @elseif(auth()->user()->type == 2)
                            {{--auth if customer only--}}
                            <li class="nav-item btn-group">
                                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
                                   aria-haspopup="true" aria-expanded="false">Post<span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                                    <a href="{{ route('task.create') }}" type="button"
                                       class="dropdown-item ex-a">Post a Job</a>
                                    <a href="{{ route('post.create') }}" type="button"
                                       class="dropdown-item ex-a">Ask a Question</a>
                                </div>
                            </li>

                        @elseif(auth()->user()->type == 3)
                            {{--auth if business only--}}
                            <li class="nav-item btn-group">
                                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
                                   aria-haspopup="true" aria-expanded="false">Post<span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                                    <a href="{{ route('advertisement.create') }}" type="button"
                                       class="dropdown-item ex-a"> Post An Advertisement</a>
                                    <a href="{{ route('task.create') }}" type="button"
                                       class="dropdown-item ex-a"> Post A Job</a>
                                    <a href="{{ route('post.create') }}" type="button"
                                       class="dropdown-item ex-a">Ask a Question</a>
                                </div>
                            </li>
                        @elseif(auth()->user()->type == 4)
                            {{--auth if customer only--}}
                            <a href="/admin" type="button"
                               class="btn btn-outline-elegant waves-effect btn-sm"> <i class="fa fa-dashboard prefix"
                                                                                       aria-hidden="true"></i> Dashboard</a>

                        @endif

                        <li class="nav-item btn-group" style="">
                            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->first_name}} <span class="caret"></span>
                            </a>
                            <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                                <a href="/user/{{ Auth::user()->id}}" class="dropdown-item ex-a">Profile</a>
                                <a href="{{ route('logout') }}" class="dropdown-item"
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




                    @else
                        <a href="/login" type="button" class="btn btn-outline-elegant waves-effect btn-sm"> <i
                                    class="fa fa-sign-in prefix" aria-hidden="true"></i> Login</a>
                        <a href="/register" type="button" class="btn btn-outline-elegant waves-effect btn-sm"> <i
                                    class="fa fa-user-plus prefix" aria-hidden="true"></i> Register</a>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
    <!--/.Navbar-->
    <br>

    <script>
        $(function () {

            $('#search-form').submit(function (e) {
                e.preventDefault();
                var keyword = $('#search').val();
                window.location.href = '/search/'+keyword;
            });


            //SMOOTH SCROLL
            $(".smooth-scroll").on('click', 'a.smooth-scroll-li', function (event) {
                event.preventDefault();
                var elAttr = $(this).attr('href');
                var offset = ($(this).attr('data-offset') ? $(this).attr('data-offset') : 0);
                var fixedTop = $('.navbar.fixed-top');
                if (fixedTop && fixedTop.length) {
                    offset = fixedTop.outerHeight();
                }
                $('body,html').animate({
                    scrollTop: $(elAttr).offset().top - offset
                }, 700);
            });

            $('.ex-a').click(function (e) {
                e.preventDefault();

                window.location.href = $(this).attr('href');
            });

        });
    </script>
</div>
