<style>
    .search:focus {
        width: 75% !important;
    }
    body{
        padding-top: 65px;
    }
</style>


<div class="container">
    <!--Navbar-->
    <nav class="navbar navbar-expand-lg navbar-light blue-grey lighten-5 fixed-top scrolling-navbar">
        <div class="container">
            <a class="navbar-brand" href="/"><img src="/img/logo.png" height="30" class="d-inline-block align-top" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto smooth-scroll">
                    <li class="nav-item">
                        <a class="nav-link" href="#home">
                            <i class="fa fa-home" aria-hidden="true"></i>
                            Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#features">
                            <i class="fa fa-magic" aria-hidden="true"></i>
                            Features
                        </a>
                    </li>
                    <li class="nav-item btn-group">
                        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-animation="false">
                            <i class="fa fa-wpexplorer" aria-hidden="true"></i>
                            Explore
                        </a>
                        <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                            <div class="row">

                            </div>
                            {{--<a class="dropdown-item" href="#">Action</a>--}}
                            {{--<a class="dropdown-item" href="#">Another action</a>--}}
                            {{--<a class="dropdown-item" href="#">Something else here</a>--}}
                            <table class="table table-bordered table-lg">
                                <tbody>
                                <tr>
                                    <td class="text-center"><img src="https://png.icons8.com/dog/dotty/35/000000"> Animals</td>
                                    <td class="text-center"><img src="https://png.icons8.com/museum/ios7/35/000000"> Architecture</td>
                                    <td class="text-center"><img src="https://png.icons8.com/theatre-mask/ios7/35/000000"> Art</td>
                                    <td class="text-center"><img src="https://png.icons8.com/minecraft-main-character-filled/ios7/35/000000"> Characters</td>
                                    <td class="text-center"><img src="https://png.icons8.com/vegetarian-food/dotty/35/000000"> Food</td>
                                </tr>
                                <tr>
                                    <td class="text-center"><img src="https://png.icons8.com/sofa/ios7/35/000000"> Furniture</td>
                                    <td class="text-center"><img src="https://png.icons8.com/dice/win10/35/000000"> Gaming</td>
                                    <td class="text-center"><img src="https://png.icons8.com/musical-notes/win10/35/000000"> Music</td>
                                    <td class="text-center"><img src="https://png.icons8.com/forest/ios7/35/000000"> Nature</td>
                                    <td class="text-center"><img src="https://png.icons8.com/people/dotty/35/000000"> People</td>
                                </tr>
                                <tr>
                                    <td class="text-center"><img src="https://png.icons8.com/suitcase/ios7/35/000000"> Travel</td>
                                    <td class="text-center"><img src="https://png.icons8.com/qr-code/android/35/000000"> Technology</td>
                                    <td class="text-center"><img src="https://png.icons8.com/sport/ios7/35/000000"> Sports</td>
                                    <td class="text-center"><img src="https://png.icons8.com/truck/ios7/35/000000"> Vehicles</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </li>
                    <li class="nav-item btn-group">
                        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-users" aria-hidden="true"></i>
                            Connect
                        </a>
                        <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="#">Forum</a>
                            <a class="dropdown-item" href="#">Chatbox</a>
                            <a class="dropdown-item" href="#">Blog</a>
                        </div>
                    </li>
                </ul>
                <form class="form-inline">
                    <i class="fa fa-search prefix"></i>
                    <input class="form-control mr-sm-2" autocomplete="off" name="search" id="search" type="text" placeholder="Search" aria-label="Search">
                </form>

                <a href="{{ route('object.create') }}" type="button" class="btn btn-outline-elegant waves-effect btn-sm"> <i class="fa fa-upload prefix" aria-hidden="true"></i> Upload</a>

                @auth
                <a href="/login" type="button" class="btn btn-outline-elegant waves-effect btn-sm"> <i class="fa fa-sign-in prefix" aria-hidden="true"></i> Login</a>
                <a href="/register" type="button" class="btn btn-outline-elegant waves-effect btn-sm"> <i class="fa fa-user-plus prefix" aria-hidden="true"></i> Register</a>
                @else

                @endauth
            </div>
        </div>
    </nav>
    <!--/.Navbar-->
    <br>

    <script>
        $(function(){
            //SMOOTH SCROLL
            $(".smooth-scroll").on('click', 'a', function(event) {
                event.preventDefault();
                var elAttr		= $(this).attr('href');
                var offset		= ($(this).attr('data-offset') ? $(this).attr('data-offset') : 0);
                var fixedTop	= $('.navbar.fixed-top');
                if (fixedTop && fixedTop.length){
                    offset = fixedTop.outerHeight();
                }
                $('body,html').animate({
                    scrollTop: $(elAttr).offset().top - offset
                }, 700);
            });

        });
    </script>
</div>
