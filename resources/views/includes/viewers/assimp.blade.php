<script src="/libs/threejs/js/three.js"></script>
<script src="/libs/threejs/js/loaders/AssimpLoader.js"></script>

<script src="/libs/threejs/js/Detector.js"></script>
<script src="/libs/threejs/js/libs/stats.min.js"></script>

<script src="/libs/threejs/js/controls/OrbitControls.js"></script>

@include('includes.viewers.container')

<script>



    if ( ! Detector.webgl ) Detector.addGetWebGLMessage();
    var container, stats;
    var camera, scene, renderer;
    var animation;
    init();
    function init() {
        camera = new THREE.PerspectiveCamera( 25, window.innerWidth / window.innerHeight, 1, 10000 );
        camera.position.set( 600, 1150, 5 );
        camera.up.set( 0, 0, 1 );
        camera.lookAt( new THREE.Vector3( -100, 0, 0 ) );
        scene = new THREE.Scene();

        scene.background = new THREE.Color( 0x333333 );

        var ambient = new THREE.HemisphereLight( 0x8888fff, 0xff8888, 0.5 );
        ambient.position.set( 0, 1, 0 );
        scene.add( ambient );
        var light = new THREE.DirectionalLight( 0xffffff, 1 );
        light.position.set( 0, 4, 4 ).normalize();
        scene.add( light );
        renderer = new THREE.WebGLRenderer( { antialias: true } );
        renderer.setPixelRatio( window.devicePixelRatio );


        container = document.getElementById('object-view-div');

        var div_w = $('#object-view-div').innerWidth();
        var div_h = $('#viewer-col-parent').innerHeight();

        renderer.setSize(div_w, div_h);
        container.appendChild( renderer.domElement );

        var controls = new THREE.OrbitControls( camera, renderer.domElement );
        stats = new Stats();
        container.appendChild( stats.dom );
        var loader = new THREE.AssimpLoader();
        loader.load( '{{ $object->object_location }}', function ( result ) {
            var object = result.object;
            object.position.y = - 100;
            object.rotation.x = Math.PI / 2;
            scene.add( object );
            animation = result.animation;
        } );
        window.addEventListener( 'resize', onWindowResize, false );
        animate();
    }


    function onWindowResize() {
        camera.aspect = window.innerWidth / window.innerHeight;
        camera.updateProjectionMatrix();

        var div_w = $('#object-view-div').innerWidth();
        var div_h = $('#viewer-col-parent').innerHeight();

        renderer.setSize(div_w, div_h);

//        renderer.setSize( window.innerWidth, window.innerHeight );
        render();
    }
    function render() {
        renderer.render( scene, camera );
    }


    function animate() {
        requestAnimationFrame( animate, renderer.domElement );
        renderer.render( scene, camera );
        if ( animation ) animation.setTime( performance.now() / 1000 );
        stats.update();
    }

</script>
