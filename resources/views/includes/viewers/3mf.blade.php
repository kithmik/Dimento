<script src="/libs/threejs/js/three.js"></script>
<script src="/libs/threejs/js/loaders/3MFLoader.js"></script>

<script src="/libs/threejs/js/Detector.js"></script>
<script src="/libs/threejs/js/controls/OrbitControls.js"></script>

<script src="/libs/threejs/js/libs/jszip.min.js"></script>

@include('includes.viewers.container')


<script>
    if ( ! Detector.webgl ) Detector.addGetWebGLMessage();
    var camera, scene, renderer;
    init();
    function init() {

        var container = document.getElementById('object-view-div');

        renderer = new THREE.WebGLRenderer( { antialias: true } );
        renderer.setPixelRatio( window.devicePixelRatio );

        var div_w = $('#object-view-div').innerWidth();
        var div_h = $('#viewer-col-parent').innerHeight();

        renderer.setSize(div_w, div_h);

//        renderer.setSize( window.innerWidth, window.innerHeight );
//        document.body.appendChild( renderer.domElement );
        container.appendChild( renderer.domElement );

        scene = new THREE.Scene();
        scene.background = new THREE.Color( 0x333333 );
        scene.add( new THREE.AmbientLight( 0xffffff, 0.2 ) );
        camera = new THREE.PerspectiveCamera( 35, window.innerWidth / window.innerHeight, 1, 500 );
        // Z is up for objects intended to be 3D printed.
        camera.up.set( 0, 0, 1 );
        camera.position.set( - 80, - 90, 150 );
        scene.add( camera );
        var controls = new THREE.OrbitControls( camera, renderer.domElement );
        controls.addEventListener( 'change', render );
        controls.minDistance = 50;
        controls.maxDistance = 300;
        controls.enablePan = false;
        controls.target.set( 80, 65, 20 );
        controls.update();
        var pointLight = new THREE.PointLight( 0xffffff, 0.8 );
        camera.add( pointLight );
        var loader = new THREE.ThreeMFLoader();
        loader.load( '{{ $object->object_location }}', function ( object ) {
            scene.add( object );
            render();
        } );
        window.addEventListener( 'resize', onWindowResize, false );
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
</script>

