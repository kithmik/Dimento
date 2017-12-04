<!DOCTYPE html>
<html lang="en">

@include('includes.header')
@include('includes.navbar')
<body>

<script src="/libs/scenejs/api/latest/scenejs.js"></script>




<br><br>
<!--Carousel Wrapper-->
<div id="carousel-example-2" class="carousel slide carousel-fade" data-ride="carousel">
    <!--Slides-->
    <div class="carousel-inner" role="listbox">
        {{--still content--}}
        <div class="carousel-caption">
            <!--Card-->
            <div class="card">
                <!--Card content-->
                <div class="card-body">
                    <!--Title-->
                    <h4 class="card-title black-text">DIMENTO</h4>
                    <!--Text-->
                    <p class="card-text">Create, Upload, Sell your 3D Model </p>
                    <p class="card-text">or</p>
                    <p class="card-text">Request your customized 3D model</p>
                </div>

            </div>
            <!--/.Card-->

        </div>
        {{--items--}}
        <div class="carousel-item active">
            <div class="view hm-black-light">
                <img class="d-block w-100" src="/img/carousel/1.jpg"  alt="First slide">
            </div>
        </div>
        <div class="carousel-item">
            <!--Mask color-->
            <div class="view hm-black-strong">
                <img class="d-block w-100" src="/img/carousel/2.jpg" alt="Second slide">
            </div>
        </div>
        <div class="carousel-item">
            <!--Mask color-->
            <div class="view hm-black-slight">
                <img class="d-block w-100" src="/img/carousel/3.jpg" alt="Third slide">
            </div>
        </div>
    </div>
    <!--/.Slides-->
    <!--Controls-->
    <a class="carousel-control-prev" href="#carousel-example-2" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carousel-example-2" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
    <!--/.Controls-->
</div>
<!--/.Carousel Wrapper-->

<br>

<div class="col-xs-12">

    <canvas id="intro-3d"></canvas>

</div>

<!--Content-->
<div class="container" id="features">
    <div class="row my-5">
        <!--First columnn-->
        <div class="col-lg-4">
            <!--Card-->
            <div class="card card-dark wow fadeIn" data-wow-delay="0.4s">

                <!--Card image-->
                <i class="fa fa-upload fa-5x" aria-hidden="true"></i>
                {{--<img class="img-fluid" src="/img/features/up-down.jpg" alt="Card image cap">--}}

                <!--Card content-->
                <div class="card-body">
                    <!--Title-->
                    <h4 class="card-title">Upload, Download or Purchase 3D models</h4>
                    <!--Text-->
                    <p class="card-text">This is the market place to upload, download or purchase 3D models.</p>
                    {{--<a href="#" class="btn right btn-info">Read more</a>--}}
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
                <i class="fa fa-user fa-5x" aria-hidden="true"></i>
                {{--<img class="img-fluid" src="/img/features/customer.jpg" alt="Card image cap">--}}

                <!--Card content-->
                <div class="card-body">
                    <!--Title-->
                    <h4 class="card-title">Customer or a 3D Model Designer</h4>
                    <!--Text-->
                    <p class="card-text">You can register as a Customer or a 3D Model Designer.</p>
                    {{--<a href="#" class="btn btn-info">Read more</a>--}}
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
                <i class="fa fa-line-chart fa-5x" aria-hidden="true"></i>
                {{--<img class="img-fluid" src="/img/features/rate.jpg" alt="Card image cap">--}}

                <!--Card content-->
                <div class="card-body">
                    <!--Title-->
                    <h4 class="card-title">Rate and Annotate on 3D models</h4>
                    <!--Text-->
                    <p class="card-text">You can rate the 3D models and also comment on them.</p>
                    {{--<a href="#" class="btn btn-info">Read more</a>--}}
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
                <i class="fa fa-exclamation-triangle fa-5x"  aria-hidden="true"></i>
                {{--<img class="img-fluid" src="/img/features/notifications.jpeg" alt="Card image cap">--}}

                <!--Card content-->
                <div class="card-body">
                    <!--Title-->
                    <h4 class="card-title">Notifications</h4>
                    <!--Text-->
                    <p class="card-text">You can receive notifications about new tasks and bidding for them.</p>
                    {{--<a href="#" class="btn btn-info">Read more</a>--}}
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
                <i class="fa fa-pencil fa-5x" aria-hidden="true"></i>
                {{--<img class="img-fluid" src="/img/features/sketch.jpg" alt="Card image cap">--}}

                <!--Card content-->
                <div class="card-body">
                    <!--Title-->
                    <h4 class="card-title">Sketches</h4>
                    <!--Text-->
                    <p class="card-text">You can have an interactive discussions using sketching tool.</p>
                    {{--<a href="#" class="btn btn-info">Read more</a>--}}
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
                <i class="fa fa-object-group fa-5x"  aria-hidden="true"></i>
                {{--<img class="img-fluid" src="/img/features/play.jpg" alt="Card image cap">--}}

                <!--Card content-->
                <div class="card-body">
                    <!--Title-->
                    <h4 class="card-title">Play with 3D models</h4>
                    <!--Text-->
                    <p class="card-text">You can search, view 3D models and rotate them in 360o view.</p>
                    {{--<a href="#" class="btn btn-info">Read more</a>--}}
                </div>

            </div>
            <!--/.Card-->
        </div>
        <!--Third columnn-->
    </div>
</div>
<!--/.Content-->



<script>

    //------------------------------------------------------------------------------------------------------------------
    // A SceneJS minimal boilerplate to get you started
    //
    // Some resources you might need:
    //
    // Getting started: http://xeolabs.com/articles/scenejs-quick-start/
    // Examples:        http://scenejs.org/examples/index.html
    // Tutorials:       http://xeolabs.com
    //
    // Right, off you go - make something wicked!
    //------------------------------------------------------------------------------------------------------------------


    // Point SceneJS to the bundled plugins
    SceneJS.setConfigs({
        pluginPath:"/libs/scenejs/api/latest/plugins"
    });


    // Define scene
    var scene = SceneJS.createScene({
        // Link to our canvas element
        canvasId:"intro-3d",
        nodes:[
            {
                type: "cameras/orbit",
                yaw: -40,
                pitch: -20,
                zoom: 200,
                zoomSensitivity: 20.0,


                nodes: [

                    // Move the raptor a bit to centre it
                    {
                        type: "translate", y: -30, z: -20,
                        nodes: [
                            {
                                type: "texture",
                                src: "/libs/scenejs/models/obj/raptor.jpg",

                                nodes: [

                                    // Import Wavefront .OBJ mesh
                                    {
                                        type: "import/obj",
                                        src: "/libs/scenejs/models/obj/raptor.obj"
                                    }
                                ]
                            }
                        ]
                    }
                ]
            }
        ]
    });


    // On each frame, spin the teapot a little bit
    scene.getNode("myRotate",
        function (myRotate) {

            var angle = 0;

            scene.on("tick",
                function () {
                    myRotate.setAngle(angle += 0.5);
                });
        });

</script>


@include('includes.footer')