<style>
    .search:focus {
        width: 75% !important;
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
                        <a class="nav-link" href="/">
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
                        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                </tr>
                                <tr>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>@fat</td>
                                    <td>Larry</td>
                                    <td>the Bird</td>
                                </tr>
                                <tr>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
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
                    <a href="/login" type="button" class="btn btn-outline-elegant waves-effect btn-sm">Login</a>
                    <a href="/register" type="button" class="btn btn-outline-elegant waves-effect btn-sm">Register</a>
                </form>
            </div>
        </div>
    </nav>
    <!--/.Navbar-->

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
