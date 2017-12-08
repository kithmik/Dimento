<!DOCTYPE html>
<html lang="en">

@include('includes.header')
@include('includes.navbar')
<body>

{{--<script src="/libs/scenejs/lib/require.js"></script>


<script src="/libs/scenejs/core/scenejs.js"></script>--}}
{{--<script src="/libs/scenejs/api/latest/scenejs.js"></script>--}}

<script src="/libs/threejs/js/three.js"></script>
<script src="/libs/threejs/js/controls/TrackballControls.js"></script>
<script src="/libs/threejs/js/loaders/TDSLoader.js"></script>

<div id="home" class="jumbotron bg" style="margin-top:-15px; height: 600px; ">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <!--Card-->
                <div class="card" style="margin-top:100px; height: 300px;">
                    <div class="row">
                        <div class="col-md-3">
                            <img src="/img/logo.png" class="d-inline-block align-top" style="height: 150px; margin-top: 75px; margin-left: 20px">
                        </div>
                        <div class="col-md-9">
                            <!--Card content-->
                            <div class="card-body" style="padding-top: 95px; padding-left: 100px">
                                <!--Text-->
                                <p class="card-text">Dimento is a platform to publish, share and discover 3D models.</p>
                                <a href="{{ route('object.index') }}" type="button" class="btn btn-outline-elegant waves-effect btn-sm">Start Here</a>
                            </div>
                        </div>
                    </div>

                </div>
                <!--/.Card-->
            </div>
            <div class="col-md-5">
                <!--Card-->
                <div class="" style="margin-top: 30px; height: 500px; ">
                    <!--Card content-->
                    <div class="card-body" style="margin-top: 100px; padding-left: 50px; background: transparent;">
                        <div class="container">
                            <div id="intro-3d"></div>
                            {{--<canvas style="width: 100%; height: 100%; margin: 0; padding: 0;" id="intro-3d"></canvas>--}}
                        </div>
                    </div>
                </div>
                <!--/.Card-->
            </div>
        </div>
    </div>
</div>

<!--Content-->
<div class="container" id="features" style="margin-top: -60px">
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

    var container, controls;
    var camera, scene, renderer;

    init();
    animate();

    function init() {

//        container = document.createElement( 'div' );
        container = document.getElementById('intro-3d');
//        document.body.appendChild( container );

        camera = new THREE.PerspectiveCamera( 60, window.innerWidth / window.innerHeight, 0.1, 10 );
        camera.position.z = 3;

        controls = new THREE.TrackballControls(  camera , container );

        scene = new THREE.Scene();
        scene.add( new THREE.HemisphereLight() );

        var directionalLight = new THREE.DirectionalLight( 0xffeedd );
        directionalLight.position.set( 0, 0, 2 );
        scene.add( directionalLight );

        //3ds files dont store normal maps
        var loader = new THREE.TextureLoader();
        var normal = loader.load( '/models/3ds/portalgun/textures/normal.jpg' );

        var loader = new THREE.TDSLoader( );
        loader.setPath( '/models/3ds/portalgun/textures/' );
        loader.load( '/models/3ds/portalgun/portalgun.3ds', function ( object ) {

            object.traverse( function ( child ) {

                if ( child instanceof THREE.Mesh ) {

                    child.material.normalMap = normal;
                }

            } );

            scene.add( object );

        });

        renderer = new THREE.WebGLRenderer({ alpha: true });
        renderer.setClearColor( 0x000000, 0 ); // the default

//        renderer = new THREE.WebGLRenderer();

        renderer.setPixelRatio( window.devicePixelRatio );
        // renderer.setSize( window.innerWidth/2, window.innerHeight/2 );
        renderer.setSize( 400,250 );
        container.appendChild( renderer.domElement );

        window.addEventListener( 'resize', resize, false );

    }

    function resize() {

        camera.aspect = 100;
        //camera.aspect = window.innerWidth / window.innerHeight;
        camera.updateProjectionMatrix();

       renderer.setSize( window.innerWidth, window.innerHeight );
        // renderer.setSize( window.innerWidth/2, window.innerHeight/2 );

    }

    function animate() {

        controls.update();
        renderer.render( scene, camera );

        requestAnimationFrame( animate );

    }
</script>

@include('includes.footer')