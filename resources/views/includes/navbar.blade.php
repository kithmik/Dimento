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
                            <div class="row">

                            </div>

                            <table class="table table-bordered table-lg">
                                <tbody>
                                <tr>
                                    <td class="text-center"><img src="https://png.icons8.com/dog/dotty/35/000000">
                                        Animals
                                    </td>
                                    <td class="text-center"><img src="https://png.icons8.com/museum/ios7/35/000000">
                                        Architecture
                                    </td>
                                    <td class="text-center"><img
                                                src="https://png.icons8.com/theatre-mask/ios7/35/000000"> Art
                                    </td>
                                    <td class="text-center"><img
                                                src="https://png.icons8.com/minecraft-main-character-filled/ios7/35/000000">
                                        Characters
                                    </td>
                                    <td class="text-center"><img
                                                src="https://png.icons8.com/vegetarian-food/dotty/35/000000"> Food
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center"><img src="https://png.icons8.com/sofa/ios7/35/000000">
                                        Furniture
                                    </td>
                                    <td class="text-center"><img src="https://png.icons8.com/dice/win10/35/000000">
                                        Gaming
                                    </td>
                                    <td class="text-center"><img
                                                src="https://png.icons8.com/musical-notes/win10/35/000000"> Music
                                    </td>
                                    <td class="text-center"><img src="https://png.icons8.com/forest/ios7/35/000000">
                                        Nature
                                    </td>
                                    <td class="text-center"><img src="https://png.icons8.com/people/dotty/35/000000">
                                        People
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center"><img src="https://png.icons8.com/suitcase/ios7/35/000000">
                                        Travel
                                    </td>
                                    <td class="text-center"><img src="https://png.icons8.com/qr-code/android/35/000000">
                                        Technology
                                    </td>
                                    <td class="text-center"><img src="https://png.icons8.com/sport/ios7/35/000000">
                                        Sports
                                    </td>
                                    <td class="text-center"><img src="https://png.icons8.com/truck/ios7/35/000000">
                                        Vehicles
                                    </td>
                                </tr>
                                </tbody>
                            </table>
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
                            <a class="dropdown-item" href="#">Chatbox</a>
                            <a class="dropdown-item" href="#">Blog</a>
                        </div>
                    </li>
                </ul>


                <ul style="list-style: none" class="form-inline">
                    <form class="form-inline">
                        <i class="fa fa-search prefix"></i>
                        <input class="form-control mr-sm-2" autocomplete="off" name="search" id="search" type="text"
                               placeholder="Search" aria-label="Search">
                    </form>

                    @auth
                        @if(auth()->user()->type == 1)
                            {{--auth if a designer only--}}
                            <a href="{{ route('object.create') }}" type="button"
                               class="btn btn-outline-elegant waves-effect btn-sm"> <i class="fa fa-upload prefix"
                                                                                       aria-hidden="true"></i>
                                Upload</a>

                        @elseif(auth()->user()->type == 2)
                            {{--auth if customer only--}}
                            <a href="{{ route('post.create') }}" type="button"
                               class="btn btn-outline-elegant waves-effect btn-sm"> <i class="fa fa-upload prefix"
                                                                                       aria-hidden="true"></i> Post a
                                Job</a>
                        @elseif(auth()->user()->type == 3)
                        {{--auth if business only--}}
                        <a href="{{ route('advertisement.create') }}" type="button"
                           class="btn btn-outline-elegant waves-effect btn-sm"> <i class="fa fa-upload prefix"
                                                                                   aria-hidden="true"></i> Post an
                            Advertisement</a>
                        @endif
                    @endauth

                    @auth
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
