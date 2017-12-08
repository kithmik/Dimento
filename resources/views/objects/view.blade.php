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

                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-12" id="viewer-col-parent" style="min-height: 60%;">
                                <div class="card hoverable">
                                    <div class="card-image">
                                        <div id="object-view-div">

                                        </div>
                                    </div>

                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col-md-12 pull-left d-inline-block">
                                                <i class="fa fa-object-group" aria-hidden="true"></i>

                                                <h3 class="inline">
                                                    {{ $object->title }}
                                                </h3>

                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <i class="fa fa-user" aria-hidden="true"></i>
                                                {{ $object->user->first_name." ".$object->user->last_name }}
                                            </div>
                                            <div class="col-md-6 pull-right text-right" title="{{ $object->getTimeAttr() }}">
                                                <i class="fa fa-clock-o" aria-hidden="true"></i>
                                                {{ $object->getAgeAttr() }}
                                            </div>
                                        </div>

                                    </div>

                                    <div class="card-body">
                                        <p>
                                            {{ $object->description }}
                                        </p>
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

            scene.background = new THREE.Color( 0x778899 );

            var directionalLight = new THREE.DirectionalLight( 0xffeedd );
            directionalLight.position.set( 0, 0, 2 );
            scene.add( directionalLight );

            var material = new THREE.MeshLambertMaterial();  // default color is 0xffffff

            //3ds files dont store normal maps
            var loader = new THREE.TextureLoader();
            var normal = loader.load( '{{ $object->texture_location }}' );

            var loader = new THREE.TDSLoader( );
//            loader.setPath( '/models/3ds/portalgun/textures/' );
            loader.setPath( '/storage/models/main/{{ $object->id }}/textures/' );
            loader.load( '{{ $object->object_location }}', function ( object ) {

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
            /*var div_ele = document.getElementById('viewer-col-parent');
            console.log(div_ele.width + " "+div_ele.offsetWidth);*/

            var div_w = $('#object-view-div').innerWidth();
            var div_h = $('#viewer-col-parent').innerHeight();

            console.log(div_w + " "+div_h);

            renderer.setSize(div_w, div_h);
//            renderer.setSize(500, 500);
            container.appendChild( renderer.domElement );

            window.addEventListener( 'resize', resize, true );

        }

        function resize() {

//            camera.aspect = 100;
            camera.aspect = window.innerWidth / window.innerHeight;

//            camera.fov = ( 360 / Math.PI ) * Math.atan( tanFOV * ( window.innerHeight / windowHeight ) );


            camera.updateProjectionMatrix();

//            camera.lookAt( scene.position );
//            var div_ele = document.getElementById('viewer-col-parent');

            var div_w = $('#object-view-div').innerWidth();
            var div_h = $('#viewer-col-parent').innerHeight();
            renderer.setSize(div_w, div_h);

//            renderer.render( scene, camera );
//            renderer.setSize(500, 500, false);

            window.addEventListener( 'resize', resize, true );

//            renderer.setSize( window.innerWidth, window.innerHeight );
            // renderer.setSize( window.innerWidth/2, window.innerHeight/2 );

        }

        function animate() {

            controls.update();
            renderer.render( scene, camera );

            requestAnimationFrame( animate );

        }
    </script>

@endsection