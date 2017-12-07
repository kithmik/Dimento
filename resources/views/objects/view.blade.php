@extends('layouts.objects')

@section('title', ' - Objects')

@section('content')


    <script src="/libs/threejs/js/three.js"></script>
    <script src="/libs/threejs/js/controls/TrackballControls.js"></script>
    <script src="/libs/threejs/js/loaders/TDSLoader.js"></script>

    View the 3D models

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">

                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-12" id="viewer-col-parent">
                                <div class="card">
                                    <div class="card-avatar">
                                        <div id="object-view-div">

                                        </div>
                                    </div>

                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col-md-12 pull-left">
                                                <i class="fa fa-object-group" aria-hidden="true"></i>
                                                Title
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <i class="fa fa-user" aria-hidden="true"></i>
                                                User
                                            </div>
                                            <div class="col-md-6 pull-right text-right">
                                                <i class="fa fa-clock-o" aria-hidden="true"></i>
                                                Time
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">

                    </div>

                </div>
            </div>
        </div>
    </div>

    <script>

        var container, controls;
        var camera, scene, renderer;


        init();
        animate();

        function init() {

//        container = document.createElement( 'div' );
            container = document.getElementById('object-view-div');
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

            /*renderer = new THREE.WebGLRenderer({ alpha: true });
            renderer.setClearColor( 0x000000, 0 ); // the default*/

        renderer = new THREE.WebGLRenderer();

            renderer.setPixelRatio( window.devicePixelRatio );
            // renderer.setSize( window.innerWidth/2, window.innerHeight/2 );
//            renderer.setSize( 400,250 );
//            renderer.setSize(500, 300, true);
            var div_ele = document.getElementById('viewer-col-parent');
            renderer.setSize(500, 300);
            container.appendChild( renderer.domElement );

            window.addEventListener( 'resize', resize, true );

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

@endsection