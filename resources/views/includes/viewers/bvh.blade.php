<script src="/libs/threejs/js/three.js"></script>

<script src="/libs/threejs/js/controls/OrbitControls.js"></script>
<script src="/libs/threejs/js/loaders/BVHLoader.js"></script>



@include('includes.viewers.container')

<script>
    var clock = new THREE.Clock();
    var camera, controls, scene, renderer;
    var mixer, skeletonHelper;
    init();
    animate();
    var loader = new THREE.BVHLoader();
    loader.load( "{{ $object->object_location }}", function( result ) {
        skeletonHelper = new THREE.SkeletonHelper( result.skeleton.bones[ 0 ] );
        skeletonHelper.skeleton = result.skeleton; // allow animation mixer to bind to SkeletonHelper directly
        var boneContainer = new THREE.Group();
        boneContainer.add( result.skeleton.bones[ 0 ] );
        scene.add( skeletonHelper );
        scene.add( boneContainer );
        // play animation
        mixer = new THREE.AnimationMixer( skeletonHelper );
        mixer.clipAction( result.clip ).setEffectiveWeight( 1.0 ).play();
    } );
    function init() {
        camera = new THREE.PerspectiveCamera( 60, window.innerWidth / window.innerHeight, 1, 1000 );
        camera.position.set( 0, 200, 400 );
        controls = new THREE.OrbitControls( camera );
        controls.minDistance = 300;
        controls.maxDistance = 700;
        scene = new THREE.Scene();
        scene.background = new THREE.Color( 0xeeeeee );
        scene.add( new THREE.GridHelper( 400, 10 ) );
        // renderer
        renderer = new THREE.WebGLRenderer( { antialias: true } );
        renderer.setPixelRatio( window.devicePixelRatio );
        var div_w = $('#object-view-div').innerWidth();
        var div_h = $('#viewer-col-parent').innerHeight();

        renderer.setSize(div_w, div_h);

        var container = document.getElementById('object-view-div');
        container.appendChild( renderer.domElement );
//        renderer.setSize( window.innerWidth, window.innerHeight );
//        document.body.appendChild( renderer.domElement );
        window.addEventListener( 'resize', onWindowResize, false );
    }
    function onWindowResize() {
        camera.aspect = window.innerWidth / window.innerHeight;
        camera.updateProjectionMatrix();
        renderer.setSize( window.innerWidth, window.innerHeight );
    }
    function animate() {
        requestAnimationFrame( animate );
        var delta = clock.getDelta();
        if ( mixer ) mixer.update( delta );
        renderer.render( scene, camera );
    }
</script>

