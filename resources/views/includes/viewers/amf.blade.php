<script src="/libs/threejs/js/three.js"></script>
<script src="/libs/threejs/js/loaders/AMFLoader.js"></script>

<script src="/libs/threejs/js/Detector.js"></script>
<script src="/libs/threejs/js/controls/OrbitControls.js"></script>

@include('includes.viewers.container')



<script>



    if ( ! Detector.webgl ) Detector.addGetWebGLMessage();
    var camera, scene, renderer;
    init();
    function init() {
        scene = new THREE.Scene();
        scene.background = new THREE.Color( 0x999999 );
        scene.add( new THREE.AmbientLight( 0x999999 ) );
        camera = new THREE.PerspectiveCamera( 35, window.innerWidth / window.innerHeight, 1, 500 );
        // Z is up for objects intended to be 3D printed.
        camera.up.set( 0, 0, 1 );
        camera.position.set( 0, -9, 6 );
        camera.add( new THREE.PointLight( 0xffffff, 0.8 ) );
        scene.add( camera );
        var grid = new THREE.GridHelper( 50, 50, 0xffffff, 0x555555 );
        grid.rotateOnAxis( new THREE.Vector3( 1, 0, 0 ), 90 * ( Math.PI/180 ) );
        scene.add( grid );
        renderer = new THREE.WebGLRenderer( { antialias: true } );
        renderer.setPixelRatio( window.devicePixelRatio );

        var container = document.getElementById('object-view-div');

        var div_w = $('#object-view-div').innerWidth();
        var div_h = $('#viewer-col-parent').innerHeight();

        renderer.setSize(div_w, div_h);
        container.appendChild( renderer.domElement );


        var loader = new THREE.AMFLoader();
        loader.load( '{{ $object->object_location }}', function ( amfobject ) {
            scene.add( amfobject );
            render();
        } );
        var controls = new THREE.OrbitControls( camera, renderer.domElement );
        controls.addEventListener( 'change', render );
        controls.target.set( 0, 1.2, 2 );
        controls.update();
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
