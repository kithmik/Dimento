<script src="/libs/threejs/js/three.js"></script>
<script src="/libs/threejs/js/loaders/AWDLoader.js"></script>

<script src="/libs/threejs/js/controls/OrbitControls.js"></script>

<script src="/libs/threejs/js/Detector.js"></script>
<script src="/libs/threejs/js/libs/stats.min.js"></script>

@include('includes.viewers.container')

<script>
    if ( ! Detector.webgl ) Detector.addGetWebGLMessage();
    var container, stats;
    var camera, scene, renderer, objects, controls;
    var particleLight, pointLight;
    var trunk;
    var loader = new THREE.AWDLoader();
    loader.materialFactory = createMaterial;
    loader.load( '{{ $object->object_location }}', function ( _trunk ) {
        trunk = _trunk;
        init();
        render();
    } );
    function createMaterial( name ){
        // console.log( name );
        // var mat = new THREE.MeshPhongMaterial({
        // 	color: 0xaaaaaa,
        // 	shininess: 20
        // });
        // return mat;
        return null;
    }
    function init() {

        container = document.getElementById('object-view-div');


        camera = new THREE.PerspectiveCamera( 45, window.innerWidth / window.innerHeight, 1, 2000 );
        camera.position.set( 70, 50, -100 );
        controls = new THREE.OrbitControls( camera );
        scene = new THREE.Scene();
        scene.background = new THREE.Color( 0x333333 );
        // Add the AWD SCENE
        scene.add( trunk );
        // Lights
        scene.add( new THREE.AmbientLight( 0x606060 ) );
        var directionalLight = new THREE.DirectionalLight(/*Math.random() * 0xffffff*/0xeeeeee );
        directionalLight.position.set( .2, -1, .2 );
        directionalLight.position.normalize();
        scene.add( directionalLight );
        pointLight = new THREE.PointLight( 0xffffff, .6 );
        scene.add( pointLight );
        renderer = new THREE.WebGLRenderer();
        renderer.setPixelRatio( window.devicePixelRatio );


        var div_w = $('#object-view-div').innerWidth();
        var div_h = $('#viewer-col-parent').innerHeight();

        renderer.setSize(div_w, div_h);

//        renderer.setSize( window.innerWidth, window.innerHeight );


        container.appendChild( renderer.domElement );
        stats = new Stats();
        container.appendChild( stats.dom );
        //
        window.addEventListener( 'resize', onWindowResize, false );
    }
    function onWindowResize() {
        camera.aspect = window.innerWidth / window.innerHeight;
        camera.updateProjectionMatrix();
        renderer.setSize( window.innerWidth, window.innerHeight );
    }
    function render() {
        requestAnimationFrame( render );
        var timer = Date.now() * 0.0005;
        pointLight.position.x = Math.sin( timer * 4 ) * 3000;
        pointLight.position.y = 600;
        pointLight.position.z = Math.cos( timer * 4 ) * 3000;
        renderer.render( scene, camera );
        stats.update();
    }
</script>
