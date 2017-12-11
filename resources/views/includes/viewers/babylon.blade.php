<script src="/libs/threejs/js/three.js"></script>
<script src="/libs/threejs/js/loaders/BabylonLoader.js"></script>

<script src="/libs/threejs/js/controls/TrackballControls.js"></script>

@include('includes.viewers.container')
<script>
    var camera, controls, scene, renderer;
    init();
    function init() {
        camera = new THREE.PerspectiveCamera( 45, window.innerWidth / window.innerHeight, 1, 2000 );
        camera.position.z = 100;
        controls = new THREE.TrackballControls( camera );
        // scene
        scene = new THREE.Scene();
        // texture
        var manager = new THREE.LoadingManager();
        manager.onProgress = function ( item, loaded, total ) {
            console.log( item, loaded, total );
        };
        var texture = new THREE.Texture();
        var material = new THREE.MeshBasicMaterial( { color: 'red' } );
        var onProgress = function ( xhr ) {
            if ( xhr.lengthComputable ) {
                var percentComplete = xhr.loaded / xhr.total * 100;
                console.log( Math.round(percentComplete, 2) + '% downloaded' );
            }
        };
        var onError = function ( xhr ) {
        };
        // model
        var loader = new THREE.BabylonLoader( manager );
        loader.load( '{{ $object->object_location }}', function ( babylonScene ) {
            babylonScene.traverse( function ( object ) {
                if ( object instanceof THREE.Mesh ) {
                    object.material = new THREE.MeshPhongMaterial( {
                        color: Math.random() * 0xffffff
                    } );
                }
            } );
            scene = babylonScene;
            animate();
        }, onProgress, onError );
        //
        renderer = new THREE.WebGLRenderer();
        renderer.setPixelRatio( window.devicePixelRatio );

        var div_w = $('#object-view-div').innerWidth();
        var div_h = $('#viewer-col-parent').innerHeight();

        renderer.setSize(div_w, div_h);

//        renderer.setSize( window.innerWidth, window.innerHeight );

        var container = document.getElementById('object-view-div');
        container.appendChild( renderer.domElement );
        //
        window.addEventListener( 'resize', onWindowResize, false );
    }
    function onWindowResize() {
        camera.aspect = window.innerWidth / window.innerHeight;
        camera.updateProjectionMatrix();
        renderer.setSize( window.innerWidth, window.innerHeight );
        controls.handleResize();
    }
    //
    function animate() {
        requestAnimationFrame( animate );
        render();
    }
    function render() {
        controls.update();
        renderer.render( scene, camera );
    }
</script>

