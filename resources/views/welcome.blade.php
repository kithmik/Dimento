<!DOCTYPE html>
<html lang="en">

@include('includes.header')
@include('includes.navbar')
<body>

<br><br>
<!--Carousel Wrapper-->
<div id="carousel" class="carousel slide carousel-fade white-text" data-ride="carousel" data-interval="5000">
    <!--Indicators-->
    <ol class="carousel-indicators">
        <li data-target="#carousel" data-slide-to="0" class="active"></li>
        <li data-target="#carousel" data-slide-to="1"></li>
        <li data-target="#carousel" data-slide-to="2"></li>
    </ol>
    <!--/.Indicators-->

    <!--Slides-->
    <div class="carousel-inner" role="listbox">

        <!-- First slide -->
        <div class="carousel-item active view hm-black-light"
             style="background-image: url('https://mdbootstrap.com/img/Photos/Horizontal/Nature/12-col/img%20(11).jpg'); background-repeat: no-repeat; background-size: cover;">
            <!-- Caption -->
            <div class="full-bg-img flex-center white-text">
                <ul class="animated fadeIn col-md-12">
                    <li>
                        <h1 class="h1-responsive">20 Photos to inspire you to visit Tatra Mountains</h1>
                    </li>
                    <li>
                        <p>Best places you should see, traditional dishes that you have to try</p>
                    </li>
                    <li>
                        <a target="_blank" href="https://mdbootstrap.com/getting-started/" class="btn btn-info btn-lg"
                           rel="nofollow">See more!</a>
                    </li>
                </ul>
            </div>
            <!-- /.Caption -->

        </div>
        <!--/.First slide-->

        <!-- Second slide -->
        <div class="carousel-item view hm-black-light"
             style="background-image: url('https://mdbootstrap.com/img/Photos/Slides/img%20(67).jpg'); background-repeat: no-repeat; background-size: cover;">

            <!-- Caption -->
            <div class="full-bg-img flex-center white-text">
                <ul class="animated fadeIn col-md-12">
                    <li>
                        <h1 class="h1-responsive">10 Reasons you should spend winter holiday in mountains </h1>
                    </li>
                    <li>
                        <p>Best atractions and winter sports!</p>
                    </li>
                    <li>
                        <a target="_blank" href="https://mdbootstrap.com/bootstrap-tutorial/"
                           class="btn btn-info btn-lg" rel="nofollow">Read more</a>
                    </li>
                </ul>
            </div>
            <!-- /.Caption -->

        </div>
        <!--/.Second slide -->

        <!-- Third slide -->
        <div class="carousel-item view hm-black-light"
             style="background-image: url('https://mdbootstrap.com/img/Photos/Slides/img%20(97).jpg'); background-repeat: no-repeat; background-size: cover;">

            <!-- Caption -->
            <div class="full-bg-img flex-center white-text">
                <ul class="animated fadeIn col-md-12">
                    <li>
                        <h1 class="h1-responsive">Weekend in the nature - the best way to relax</h1>
                    </li>
                    <li>
                        <p>8 Reasons why you need to spend more time in nature</p>
                    </li>
                    <li>
                        <a target="_blank" href="https://mdbootstrap.com/forums/forum/support/"
                           class="btn btn-default btn-lg" rel="nofollow">Read more</a>
                    </li>
                </ul>
            </div>
            <!-- /.Caption -->

        </div>
        <!--/.Third slide-->
    </div>
    <!--/.Slides-->

    <!--Controls-->
    <a class="carousel-control-prev" href="#carousel-example-3" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carousel-example-3" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
    <!--/.Controls-->
</div>
<!--/.Carousel Wrapper-->

<br>

<!--Content-->
<div class="container" id="features">
    <div class="row my-5">
        <!--First columnn-->
        <div class="col-lg-4">
            <!--Card-->
            <div class="card card-dark wow fadeIn" data-wow-delay="0.4s">

                <!--Card image-->
                <img class="img-fluid" src="/img/features/up-down.jpg" alt="Card image cap">

                <!--Card content-->
                <div class="card-body">
                    <!--Title-->
                    <h4 class="card-title">Upload, Download or Purchase 3D models</h4>
                    <!--Text-->
                    <p class="card-text">This is the market place to upload, download or purchase 3D models.</p>
                    <a href="#" class="btn right btn-info">Read more</a>
                </div>

            </div>
            <!--/.Card-->
        </div>
        <!--First columnn-->

        <!--Second columnn-->
        <div class="col-lg-4">
            <!--Card-->
            <div class="card card-dark wow fadeIn" data-wow-delay="0.2s">

                <!--Card image-->
                <img class="img-fluid" src="/img/features/customer.jpg" alt="Card image cap">

                <!--Card content-->
                <div class="card-body">
                    <!--Title-->
                    <h4 class="card-title">Customer or a 3D Model Designer</h4>
                    <!--Text-->
                    <p class="card-text">You can register as a Customer or a 3D Model Designer.</p>
                    <a href="#" class="btn btn-info">Read more</a>
                </div>

            </div>

            <!--/.Card-->

        </div>
        <!--Second columnn-->

        <!--Third columnn-->
        <div class="col-lg-4 mb-4">
            <!--Card-->
            <div class="card card-dark wow fadeIn" data-wow-delay="0.6s">

                <!--Card image-->
                <img class="img-fluid" src="/img/features/rate.jpg" alt="Card image cap">

                <!--Card content-->
                <div class="card-body">
                    <!--Title-->
                    <h4 class="card-title">Rate and Annotate on 3D models</h4>
                    <!--Text-->
                    <p class="card-text">You can rate the 3D models and also comment on them.</p>
                    <a href="#" class="btn btn-info">Read more</a>
                </div>

            </div>
            <!--/.Card-->
        </div>
        <!--Third columnn-->
    </div>
    <div class="row my-5">
        <!--First columnn-->
        <div class="col-lg-4">
            <!--Card-->
            <div class="card card-dark wow fadeIn" data-wow-delay="0.2s">

                <!--Card image-->
                <img class="img-fluid" src="/img/features/notifications.jpeg" alt="Card image cap">

                <!--Card content-->
                <div class="card-body">
                    <!--Title-->
                    <h4 class="card-title">Notifications</h4>
                    <!--Text-->
                    <p class="card-text">You can receive notifications about new tasks and bidding for them.</p>
                    <a href="#" class="btn btn-info">Read more</a>
                </div>

            </div>
            <!--/.Card-->
        </div>
        <!--First columnn-->

        <!--Second columnn-->
        <div class="col-lg-4">
            <!--Card-->
            <div class="card card-dark wow fadeIn" data-wow-delay="0.6s">

                <!--Card image-->
                <img class="img-fluid" src="/img/features/sketch.jpg" alt="Card image cap">

                <!--Card content-->
                <div class="card-body">
                    <!--Title-->
                    <h4 class="card-title">Sketches</h4>
                    <!--Text-->
                    <p class="card-text">You can have an interactive discussions using sketching tool.</p>
                    <a href="#" class="btn btn-info">Read more</a>
                </div>

            </div>

            <!--/.Card-->

        </div>
        <!--Second columnn-->

        <!--Third columnn-->
        <div class="col-lg-4 mb-4">
            <!--Card-->
            <div class="card card-dark wow fadeIn" data-wow-delay="0.4s">

                <!--Card image-->
                <img class="img-fluid" src="/img/features/play.jpg" alt="Card image cap">

                <!--Card content-->
                <div class="card-body">
                    <!--Title-->
                    <h4 class="card-title">Play with 3D models</h4>
                    <!--Text-->
                    <p class="card-text">You can search, view 3D models and rotate them in 360o view.</p>
                    <a href="#" class="btn btn-info">Read more</a>
                </div>

            </div>
            <!--/.Card-->
        </div>
        <!--Third columnn-->
    </div>
</div>
<!--/.Content-->


@include('includes.footer')